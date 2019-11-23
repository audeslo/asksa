<?php

namespace App\Controller;

use App\Entity\Vente;
use App\Entity\Sortie;
use App\Form\SortieType;
use App\Repository\SortieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



/**
 * @Route("/sortie")
 */
class SortieController extends AbstractController
{
    /**
     * @Route("/Liste-des-produits-commandes/{slug}", name="sortie_index", methods={"GET"})
     * @param SortieRepository $sortieRepository
     * @param Vente $vente
     * @return Response
     */
    public function index(SortieRepository $sortieRepository, Vente $vente): Response
    {
        $this->get('session')->set('vente',$vente);

        return $this->render('sortie/index.html.twig', [
            'sorties' => $sortieRepository->findBy(['vente' => $vente->getId()]),
            'vente'  =>  $vente,
        ]);
    }

    /**
     * @Route("/new", name="sortie_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $vente=$this->get('session')->get('vente');

        $sortie = new Sortie();
        $form = $this->createForm(SortieType::class, $sortie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $vente= $entityManager->getRepository('App:Vente')->find($vente->getId());

          /*  $sortie->setVente($vente);
            $sortie->setQuantiteenstock($form['quantiteachete']->getData());*/

            // Récupération de la reférence produit
            $produit=$entityManager->getRepository('App:Produit')->find($form['produit']->getData());
            $refproduit=$produit->getReference();



            $entityManager->persist($sortie);
            $entityManager->flush();

            return $this->redirectToRoute('sortie_index',['slug' => $vente->getSlug()]);
        }

        return $this->render('sortie/new.html.twig', [
            'sortie' => $sortie,
            'form' => $form->createView(),
            'vente'  => $vente
        ]);
    }

    /**
     * @Route("/{id}", name="sortie_show", methods={"GET"})
     */
    public function show(Sortie $sortie): Response
    {
        return $this->render('sortie/show.html.twig', [
            'sortie' => $sortie,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="sortie_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Sortie $sortie): Response
    {
        $form = $this->createForm(SortieType::class, $sortie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('sortie_index');
        }

        return $this->render('sortie/edit.html.twig', [
            'sortie' => $sortie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="sortie_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Sortie $sortie): Response
    {
        if ($this->isCsrfTokenValid('delete'.$sortie->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($sortie);
            $entityManager->flush();
        }

        return $this->redirectToRoute('sortie_index');
    }


}



