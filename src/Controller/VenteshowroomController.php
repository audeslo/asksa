<?php

namespace App\Controller;

use App\Entity\Venteshowroom;
use App\Entity\VenteStock;
use App\Form\VenteshowroomEditType;
use App\Form\VenteshowroomType;
use App\Repository\CategorieRepository;
use App\Repository\VenteshowroomRepository;
use Dompdf\Dompdf;
use Dompdf\Options;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/venteshowroom")
 */
class VenteshowroomController extends AbstractController
{
    /**
     * @Route("/", name="venteshowroom_index", methods={"GET"})
     * @param VenteshowroomRepository $venteshowroomRepository
     * @return Response
     */
    public function index(VenteshowroomRepository $venteshowroomRepository): Response
    {
        return $this->render('venteshowroom/index.html.twig', [
            'venteshowrooms' => $venteshowroomRepository->findAll(),
        ]);
    }


    /**
     * @Route("/new", name="venteshowroom_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        // recuperer les produits disponible en stock du showroom de l'utilisateur connecté
        $listProduits=$entityManager->getRepository('App:Stockshowroom')
                                ->findAvailableStock($this->getUser()->getId());
        $produits=[];
        foreach ($listProduits as $key => $produit){
            $produits[$produit['designation']]=$produit['id'];
        }

        // recuperer les capacité disponible en stock du showroom de l'utilisateur connecté
        $listCapacites=$entityManager->getRepository('App:Stockshowroom')
                                ->findAvailableCapacite($this->getUser()->getId());
        $capacites=[];
        foreach ($listCapacites as $key => $capacite){
            $capacites[$capacite['code']]=$capacite['id'];
        }

        // recuperer les bidons et  cartons disponible

        $venteshowroom = new Venteshowroom();

        $form = $this->createForm(VenteshowroomType::class, $venteshowroom,array(
            'capacite'     => $capacites,
            'produits'  => $produits
        ));
        $form->handleRequest($request);
        $ventes=null;


        if ($form->isSubmitted() && $form->isValid()) {

            $isset = $this->get('session')->get('venteshowroom');
            $ventestock = new VenteStock();
            $venteshowroom->setCreatedBy($this->getUser());
            $entityManager->persist($venteshowroom);

            $entityManager->flush();

            $lastid = $entityManager->getRepository('App:Venteshowroom')->findLastId();
            $lastvente=$entityManager->getRepository('App:Venteshowroom')->find($lastid);

            $entityManager->getRepository('App:Venteshowroom')->updateLastReferent($lastid, 'BL-' . getAugmentons($lastid));

            $this->get('session')->set('venteshowroom', $lastid);
            $capacite=$entityManager->getRepository('App:Capacite')
                                    ->find($form->get('capacitebidon')->getData());
            $produit=$entityManager->getRepository('App:Produit')
                                    ->find($form->get('produit')->getData());

            $ventestock->setCapacite($capacite);
            $ventestock->setContenant($form->get('grosdetail')->getData());
            $ventestock->setProduit($produit);
            $ventestock->setQuantite($form->get('quantiteachete')->getData());

            $ventestock->setVenteshowroom($entityManager
                ->getRepository('App:Venteshowroom')->findLastObjet());
            $ventestock->setCreatedBy($this->getUser());
            $entityManager->persist($ventestock);
            $entityManager->flush();

           return $this->redirectToRoute('venteshowroom_add',array('slug' =>$lastvente->getSlug() ));
        }

        return $this->render('venteshowroom/new.html.twig', [
            'venteshowroom' => $venteshowroom,
            'form' => $form->createView(),
            'ventes' => $ventes
        ]);

    }

    /**
     * @Route("/{slug}", name="venteshowroom_add", methods={"GET","POST"})
     */
    public function add(Venteshowroom $venteshowroom, Request $request): Response
    {

        $entityManager = $this->getDoctrine()->getManager();
        $ventestock = new VenteStock();

        // recuperer les produits disponible en stock du showroom de l'utilisateur connecté
        $listProduits=$entityManager->getRepository('App:Stockshowroom')
            ->findAvailableStock($this->getUser()->getId());
        $produits=[];
        foreach ($listProduits as $key => $produit){
            $produits[$produit['designation']]=$produit['id'];
        }

        // recuperer les capacité disponible en stock du showroom de l'utilisateur connecté
        $listCapacites=$entityManager->getRepository('App:Stockshowroom')
            ->findAvailableCapacite($this->getUser()->getId());
        $capacites=[];
        foreach ($listCapacites as $key => $capacite){
            $capacites[$capacite['code']]=$capacite['id'];
        }

        // recuperer les bidons et  cartons disponible


        $form = $this->createForm(VenteshowroomEditType::class, $venteshowroom,array(
            'capacite'     => $capacites,
            'produits'  => $produits
        ));
        $form->handleRequest($request);

        //$isset=$this->get('session')->get('venteshowroom');

        if ($form->isSubmitted()&& $form->isValid()) {


            $capacite=$entityManager->getRepository('App:Capacite')
                ->find($form->get('capacitebidon')->getData());
            $produit=$entityManager->getRepository('App:Produit')
                ->find($form->get('produit')->getData());

            // recuperons le prix catégoriel
            $prix=$entityManager->getRepository('App:Tarifcategorieclt')
                                ->findPrice($venteshowroom->getClient()->getId(),
                                    $produit->getId(), $capacite,$form->get('quantiteachete')->getData());
            // recuperons le prix unitaire au cas de prix null
            if($prix == null){
                $prix=$produit->getPrixU();
            }


            $ventestock->setCapacite($capacite);
            $ventestock->setContenant($form->get('grosdetail')->getData());
            $ventestock->setProduit($produit);
            $ventestock->setQuantite($form->get('quantiteachete')->getData());
            $ventestock->setVenteshowroom($venteshowroom);
            $ventestock->setCreatedBy($this->getUser());
            $ventestock->setPrixvente($prix);
            $entityManager->persist($ventestock);
            $entityManager->flush();
        }

        $ventes=$entityManager->getRepository('App:VenteStock')->findBy(
            ['venteshowroom' => $venteshowroom]);

        return $this->render('venteshowroom/newvente.html.twig', [
            'venteshowroom' => $venteshowroom,
            'form' => $form->createView(),
            'ventes' => $ventes
        ]);
    }


    /**
     * @Route("/{slug}/encaissement", name="venteshowroom_encaissement", methods={"GET","POST"})
     */
    public function encaissement(Venteshowroom $venteshowroom, Request $request): Response
    {
        $em=$this->getDoctrine()->getManager();
        $ventes=$em->getRepository('App:VenteStock')->findBy(
            ['venteshowroom' => $venteshowroom]);

        // vérifions la dispo,nibilité des produits
            foreach ($ventes as $key => $vente){
                if($vente->getContenant()){
                    //
                }else{

                }
            }

        /*return $this->render('venteshowroom/newvente.html.twig', [
            'venteshowroom' => $venteshowroom,
            'form' => $form->createView(),
            'ventes' => $ventes
        ]);*/
    }


    /**
     * @Route("/{slug}", name="venteshowroom_show", methods={"GET"})
     */
    public function show(Venteshowroom $venteshowroom): Response
    {
        return $this->render('fournisseur/show.html.twig', [
            'venteshowroom' => $venteshowroom,
        ]);
    }

    /**
     * @Route("/{slug}/edit", name="venteshowroom_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Venteshowroom $venteshowroom): Response
    {
        $form = $this->createForm(VenteshowroomEditType::class, $venteshowroom);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $venteshowroom->setEditedBy($this->getUser());
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fournisseur_index');
        }

        return $this->render('venteshowroom/new.html.twig', [
            'venteshowroom' => $venteshowroom,
            'form' => $form->createView(),
            'ventes'    => $ventes=null
        ]);
    }

    /**
     * @Route("/{slug}", name="venteshowroom_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Venteshowroom $venteshowroom): Response
    {
        if ($this->isCsrfTokenValid('delete'.$venteshowroom->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($venteshowroom);
            $entityManager->flush();
        }

        return $this->redirectToRoute('fournisseur_index');
    }

    /**
     * @Route("/liste", name="venteshowroom_liste", methods={"GET"})
     */
    public function liste(VenteshowroomRepository $venteshowroomRepository): Response
    {
        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');

        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);
        $venteshowrooms = $venteshowroomRepository->findAll();
        /*return $this->render('categorie/liste.html.twig', [
            'categories' => $categories,
        ]);*/


        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('venteshowroom/liste.html.twig', [
            'venteshowrooms' => $venteshowrooms,
        ]);
        // Load HTML to Dompdf
        $dompdf->loadHtml($html);
        // (Optional) Setup the paper size and orientation 'p
        $dompdf->setPaper('A4', 'portrait');
        // Render the HTML as PDF
        $dompdf->render();
        // Output the generated PDF to Browser (force downloa
        $dompdf->stream("Facture.pdf", [
            "Attachment" => false
        ]);

    }

}

function getAugmentons(int $autom)
{

    if($autom<10)
    {
        return '0000'.$autom;
    }elseif ($autom<100)
    {
        return '000'.$autom;
    }elseif ($autom<1000)
    {
        return '00'.$autom;
    }elseif ($autom<10000)
    {
        return '0'.$autom;
    }else{
        return $autom;
    }
}
