<?php

namespace App\Controller;

use App\Entity\Venteshowroom;
use App\Entity\VenteStock;
use App\Form\VenteshowroomEditType;
use App\Form\VenteshowroomType;
use App\Repository\VenteshowroomRepository;
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
        $venteshowroom = new Venteshowroom();
        $form = $this->createForm(VenteshowroomType::class, $venteshowroom);
        $form->handleRequest($request);
        $ventes=null;
        $entityManager = $this->getDoctrine()->getManager();

        if ($form->isSubmitted() && $form->isValid()) {

            $isset = $this->get('session')->get('venteshowroom');
            $ventestock = new VenteStock();
            $venteshowroom->setCreatedBy($this->getUser());
            $entityManager->persist($venteshowroom);

            $entityManager->flush();

            $lastid = $entityManager->getRepository('App:Venteshowroom')->findLastId();

            $entityManager->getRepository('App:Venteshowroom')->updateLastReferent($lastid, 'BL-' . getAugmentons($lastid));

            $this->get('session')->set('venteshowroom', $lastid);

            $ventestock->setBidon($form->get('capacitebidon')->getData());
            $ventestock->setCarton($form->get('quantitecarton')->getData());
            $ventestock->setContenant($form->get('grosdetail')->getData());
            $ventestock->setProduit($entityManager->getRepository('App:Produit')
                ->find($form->get('produit')->getData()));
            $ventestock->setQuantite($form->get('quantiteachete')->getData());

            $ventestock->setVenteshowroom($entityManager->getRepository('App:Venteshowroom')
                ->findLastObjet()
            );
            $entityManager->persist($ventestock);
            $entityManager->flush();
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


        $form = $this->createForm(VenteshowroomEditType::class);
        $form->handleRequest($request);
        $entityManager = $this->getDoctrine()->getManager();

        //$isset=$this->get('session')->get('venteshowroom');

        if ($form->isSubmitted()&& $form->isValid()) {

            $ventestock = new VenteStock();
            $ventestock->setBidon($form->get('capacitebidon')->getData());
            $ventestock->setCarton($form->get('quantitecarton')->getData());
            $ventestock->setContenant($form->get('grosdetail')->getData());
            $ventestock->setProduit($entityManager->getRepository('App:Produit')
                ->find($form->get('produit')->getData()));
            $ventestock->setQuantite($form->get('quantiteachete')->getData());
            $ventestock->setVenteshowroom($venteshowroom);
            $ventestock->setCreatedBy($this->getUser());
            $entityManager->persist($ventestock);
            $entityManager->flush();
        }
        $ventes=$entityManager->getRepository('App:VenteStock')->findBy(
            ['venteshowroom' => $venteshowroom]);


        return $this->render('venteshowroom/new.html.twig', [
            'venteshowroom' => $venteshowroom,
            'form' => $form->createView(),
            'ventes' => $ventes
        ]);
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
