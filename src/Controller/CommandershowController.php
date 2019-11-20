<?php

namespace App\Controller;

use App\Entity\Commandershow;
use App\Entity\Commandeshow;
use App\Form\CommandershowType;
use App\Repository\CommandershowRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/commandershow")
 */
class CommandershowController extends AbstractController
{
    /**
     * @Route("/Liste-des-produits-commandes/{slug}", name="commandershow_index", methods={"GET"})
     * @param CommandershowRepository $commandershowRepository
     * @param Commandeshow $commandeshow
     * @return Response
     */
    public function index(CommandershowRepository $commandershowRepository, Commandeshow $commandeshow): Response
    {
        $this->get('session')->set('commandeshow',$commandeshow);

        return $this->render('commandershow/index.html.twig', [
            'commandershows' => $commandershowRepository->findBy(['commandeshow' => $commandeshow->getId()]),
            'commandeshow'  =>  $commandeshow,
        ]);
    }

    /**
     * @Route("/new", name="commandershow_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $commandeshow=$this->get('session')->get('commandeshow');

        $commandershow = new Commandershow();
        $form = $this->createForm(CommandershowType::class, $commandershow);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $commandeshow= $entityManager->getRepository('App:Commandeshow')->find($commandeshow->getId());
            $commandershow->setCommande($commandeshow);
            $commandershow->setQuantitestock($form['quantitecommandeshow']->getData());

            // Récupération de la reférence produit
            $produit=$entityManager->getRepository('App:Produit')->find($form['produit']->getData());
            $refproduit=$produit->getReference();

            //refernce commande
            $refcommande=$commandeshow->getReference();

          //  $commandershow->setSousreference($refcommande.'/'.$refproduit.'-'.$form['capacitecarton']->getData().'C-'.$form['capacitebidon']->getData().'S');

            $entityManager->persist($commandershow);
            $entityManager->flush();

            return $this->redirectToRoute('commandershow_index',['slug' => $commandeshow->getSlug()]);
        }

        return $this->render('commandershow/new.html.twig', [
            'commandershow' => $commandershow,
            'form' => $form->createView(),
            'commandeshow'  => $commandeshow
        ]);
    }

    /**
     * @Route("/{id}", name="commandershow_show", methods={"GET"})
     */
    public function show(Commandershow $commandershow): Response
    {
        return $this->render('commandershow/show.html.twig', [
            'commandershow' => $commandershow,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="commandershow_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Commandershow $commandershow): Response
    {
        $form = $this->createForm(CommandershowType::class, $commandershow);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('commandershow_index');
        }

        return $this->render('commandershow/edit.html.twig', [
            'commandershow' => $commandershow,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="commandershow_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Commandershow $commandershow): Response
    {
        if ($this->isCsrfTokenValid('delete'.$commandershow->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($commandershow);
            $entityManager->flush();
        }

        return $this->redirectToRoute('commandershow_index');
    }


}


