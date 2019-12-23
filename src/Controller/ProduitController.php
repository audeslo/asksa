<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Form\ProduitType;
use App\Repository\CategorieRepository;
use App\Repository\ProduitRepository;
use Dompdf\Dompdf;
use Dompdf\Options;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



/**
 * @Route("/produit")
 */

class ProduitController extends AbstractController
{

    /**
     * @Route("/", name="produit_index", methods={"GET"})
     */
    public function index(ProduitRepository $produitRepository): Response
    {
        return $this->render('produit/index.html.twig', [
            'produits' => $produitRepository->findAll(),
        ]);
    }
    /**
     * @Route("/liste", name="produit_liste", methods={"GET"})
     */
    public function liste(ProduitRepository $produitRepository): Response
    {
        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');

// Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);
        $produits = $produitRepository->findAll();
        /*return $this->render('categorie/liste.html.twig', [
            'categories' => $categories,
        ]);*/


// Retrieve the HTML generated in our twig file
        $html = $this->renderView('produit/liste.html.twig', [
            'produits' => $produits,
        ]);
// Load HTML to Dompdf
        $dompdf->loadHtml($html);
// (Optional) Setup the paper size and orientation 'p
        $dompdf->setPaper('A4', 'portrait');
// Render the HTML as PDF
        $dompdf->render();
// Output the generated PDF to Browser (force downloa
        $dompdf->stream("Liste des produits.pdf", [
            "Attachment" => false
        ]);

    }

    /**
     * @Route("/new", name="produit_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $produit = new Produit();
        $form = $this->createForm(ProduitType::class, $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $produit->setCreatedBy($this->getUser());
            $entityManager->persist($produit);
            $entityManager->flush();

            $lastid=$entityManager->getRepository('App:Produit')->findLastId();

            $entityManager->getRepository('App:Produit')->updateLastReferent($lastid,'PD-'.getRegenere($lastid));


            $request->getSession()->getFlashBag()->add('success', 'Enregistrement bien effectué.');
            return $this->redirectToRoute('produit_index');
        }

        return $this->render('produit/new.html.twig', [
            'produit' => $produit,
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/{slug}", name="produit_show", methods={"GET"})
     */
    public function show(Produit $produit): Response
    {
        return $this->render('produit/show.html.twig', [
            'produit' => $produit,
        ]);
    }

    /**
     * @Route("/{slug}/edit", name="produit_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Produit $produit): Response
    {
        $form = $this->createForm(ProduitType::class, $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $produit->setEditedBy($this->getUser());
            $this->getDoctrine()->getManager()->flush();

            $request->getSession()->getFlashBag()->add('info', 'Modification bien effectuée.');

            return $this->redirectToRoute('produit_index');
        }

        return $this->render('produit/edit.html.twig', [
            'produit' => $produit,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{slug}", name="produit_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Produit $produit): Response
    {
        if ($this->isCsrfTokenValid('delete'.$produit->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($produit);
            $entityManager->flush();
            $request->getSession()->getFlashBag()->add('warning', 'Suppression bien effectuée.');
        }

        return $this->redirectToRoute('produit_index');
    }
}

function getRegenere(int $automa)
{

    if($automa<10)
    {
        return '0000'.$automa;
    }elseif ($automa<100)
    {
        return '000'.$automa;
    }elseif ($automa<1000)
    {
        return '00'.$automa;
    }elseif ($automa<10000)
    {
        return '0'.$automa;
    }else{
        return $automa;
    }
}