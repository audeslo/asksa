<?php

namespace App\Controller;

use App\Entity\Commandeshow;
use App\Form\CommandeshowType;
use App\Repository\CommandeshowRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/commandeshow")
 */
class CommandeshowController extends AbstractController
{
    /**
     * @Route("/", name="commandeshow_index", methods={"GET"})
     */
    public function index(CommandeshowRepository $commandeshowRepository): Response
    {
        return $this->render('commandeshow/index.html.twig', [
            'commandeshows' => $commandeshowRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="commandeshow_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $commandeshow = new Commandeshow();
        $form = $this->createForm(CommandeshowType::class, $commandeshow);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($commandeshow);
            $entityManager->flush();

            $lastid=$entityManager->getRepository('App:Commandeshow')->findLastId();

            $entityManager->getRepository('App:Commandeshow')->updateLastReferent($lastid,'CS-'.getValeu($lastid));
            // ;
            $request->getSession()->getFlashBag()->add('success', 'Enregistrement bien effectué.');
            return $this->redirectToRoute('commandeshow_index');
        }

        return $this->render('commandeshow/new.html.twig', [
            'commandeshow' => $commandeshow,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{slug}", name="commandeshow_show", methods={"GET"})
     */
    public function show(Commandeshow $commandeshow): Response
    {
        return $this->render('commandeshow/show.html.twig', [
            'commandeshow' => $commandeshow,
        ]);
    }

    /**
     * @Route("/{slug}/edit", name="commandeshow_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Commandeshow $commandeshow): Response
    {
        $form = $this->createForm(CommandeshowType::class, $commandeshow);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $this->getDoctrine()->getManager()->flush();

            $request->getSession()->getFlashBag()->add('info', 'Modification bien effectuée.');

            return $this->redirectToRoute('commandeshow_index');
        }

        return $this->render('commandeshow/edit.html.twig', [
            'commandeshow' => $commandeshow,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{slug}", name="commandeshow_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Commandeshow $commandeshow): Response
    {
        if ($this->isCsrfTokenValid('delete'.$commandeshow->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($commandeshow);
            $entityManager->flush();
            $request->getSession()->getFlashBag()->add('warning', 'Suppression bien effectuée.');
        }

        return $this->redirectToRoute('commandeshow_index');
    }
}

function getValeu(int $valeu)
{

    if($valeu<10)
    {
        return '0000'.$valeu;
    }elseif ($valeu<100)
    {
        return '000'.$valeu;
    }elseif ($valeu<1000)
    {
        return '00'.$valeu;
    }elseif ($valeu<10000)
    {
        return '0'.$valeu;
    }else{
        return $valeu;
    }
}