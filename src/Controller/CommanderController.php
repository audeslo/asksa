<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Entity\Commander;
use App\Entity\Fournisseur;
use App\Form\CommanderType;
use App\Form\FournisseurType;
use App\Repository\CommandeRepository;
use App\Repository\CommanderRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/commander")
 */
class CommanderController extends AbstractController
{
    /**
     * @Route("/Liste-des-produits-commandes/{slug}", name="commander_index", methods={"GET"})
     * @param CommanderRepository $commanderRepository
     * @param Commande $commande
     * @return Response
     */
    public function index(CommanderRepository $commanderRepository, Commande $commande): Response
    {
        $this->get('session')->set('commande',$commande);

        return $this->render('commander/index.html.twig', [
            'commanders' => $commanderRepository->findBy(['commande' => $commande->getId()]),
            'commande'  =>  $commande,
        ]);
    }

    /**
     * @Route("/new", name="commander_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $commande=$this->get('session')->get('commande');

        $commander = new Commander();
        $form = $this->createForm(CommanderType::class, $commander);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $commande= $entityManager->getRepository('App:Commande')->find($commande->getId());
            $commander->setCommande($commande);
            $commander->setQuantiteenstock($form['quantitecommandee']->getData());

            // Récupération de la reférence produit
            $produit=$entityManager->getRepository('App:Produit')->find($form['produit']->getData());
            $refproduit=$produit->getReference();

            //refernce commande
            $refcommande=$commande->getReference();

            $commander->setSousreference($refcommande.'/'.$refproduit.'-'.$form['capacitecarton']->getData().'B-'.$form['capacitebidon']->getData().'L');

            $entityManager->persist($commander);
            $entityManager->flush();

            return $this->redirectToRoute('commander_index',['slug' => $commande->getSlug()]);
        }

        return $this->render('commander/new.html.twig', [
            'commander' => $commander,
            'form' => $form->createView(),
            'commande'  => $commande
        ]);
    }

    /**
     * @Route("/{id}", name="commander_show", methods={"GET"})
     */
    public function show(Commander $commander): Response
    {
        return $this->render('commander/show.html.twig', [
            'commander' => $commander,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="commander_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Commander $commander): Response
    {
        $form = $this->createForm(CommanderType::class, $commander);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('commander_index');
        }

        return $this->render('commander/edit.html.twig', [
            'commander' => $commander,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="commander_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Commander $commander): Response
    {
        if ($this->isCsrfTokenValid('delete'.$commander->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($commander);
            $entityManager->flush();
        }

        return $this->redirectToRoute('commander_index');
    }
///*
//
//    /**
//     * @Route("/Liste-des-produits-commandes/{slug}/Valider", name="commander_valider", methods={"GET"})
//     * @param CommanderRepository $commanderRepository
//     * @param Commande $commande
//     * @return Response
//     */
//    public function valider(CommanderRepository $commanderRepository, Commande $commande): Response
//    {
//        $em= $this->getDoctrine()->getManager();
//
//        $em->getRepository('App:Commande')->updateCommande($commande->getId());
//        $commanders=$commanderRepository->findBy(['commande' => $commande->getId()]);
//
//        foreach ($commanders as $key => $commander){
//            $qtestock= (int) $em->getRepository('App:Produit')
//                ->findBy([''])
//                ($commander->getProduit()->getId())->getStockdisponible();
//
//            $qtestock+=$commander->getQuantitecommandee();
//            $em->getRepository('App:Produit')->updateStockProduit()
//            return null;
//
//        }
//
//
//
//
//        return $this->render('commander/index.html.twig', [
//            'commanders' => $commanderRepository->findBy(['commande' => $commande->getId()]),
//            'commande'  =>  $commande,
//        ]);
//    }*/

}


