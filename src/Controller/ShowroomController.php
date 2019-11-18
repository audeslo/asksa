<?php

namespace App\Controller;


use App\Entity\Showroom;
use App\Form\ShowroomType;
use App\Repository\ShowroomRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



/**
 * @Route("/showroom")
 */

class ShowroomController extends AbstractController
{
    /**
     * @Route("/", name="showroom_index", methods={"GET"})
     */
    public function index(ShowroomRepository $showroomRepository): Response
    {
        return $this->render('showroom/index.html.twig', [
            'showrooms' => $showroomRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="showroom_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $showroom = new Showroom();
        $form = $this->createForm(ShowroomType::class, $showroom);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($showroom);
            $entityManager->flush();


            $lastid=$entityManager->getRepository('App:Showroom')->findLastId();

            $entityManager->getRepository('App:Showroom')->updateLastReferent($lastid,'SHROOMS-'.getIncrementation($lastid));

            $request->getSession()->getFlashBag()->add('success', 'Enregistrement bien effectué.');
            return $this->redirectToRoute('showroom_index');
        }

        return $this->render('showroom/new.html.twig', [
            'showroom' => $showroom,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="showroom_show", methods={"GET"})
     */
    public function show(Showroom $showroom): Response
    {
        return $this->render('showroom/show.html.twig', [
            'showroom' => $showroom,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="showroom_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Showroom $showroom): Response
    {
        $form = $this->createForm(ShowroomType::class, $showroom);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $request->getSession()->getFlashBag()->add('info', 'Modification bien effectuée.');

            return $this->redirectToRoute('showroom_index');
        }

        return $this->render('showroom/edit.html.twig', [
            'showroom' => $showroom,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="showroom_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Showroom $showroom): Response
    {
        if ($this->isCsrfTokenValid('delete'.$showroom->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($showroom);
            $entityManager->flush();
            $request->getSession()->getFlashBag()->add('warning', 'Suppression bien effectuée.');
        }

        return $this->redirectToRoute('showroom_index');
    }
}

function getIncrementation(int $automat)
{

    if($automat<10)
    {
        return '0000'.$automat;
    }elseif ($automat<100)
    {
        return '000'.$automat;
    }elseif ($automat<1000)
    {
        return '00'.$automat;
    }elseif ($automat<10000)
    {
        return '0'.$automat;
    }else{
        return $automat;
    }
}