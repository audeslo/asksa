<?php

namespace App\Controller;

use App\Entity\Venteshowroom;
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

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($venteshowroom);
            $entityManager->flush();
            $lastid=$entityManager->getRepository('App:Venteshowroom')->findLastId();

            $entityManager->getRepository('App:Venteshowroom')->updateLastReferent($lastid,'BL-'.getAugmentons($lastid));
            //return $this->redirectToRoute('venteshowroom_index');
        }

        return $this->render('venteshowroom/new.html.twig', [
            'venteshowroom' => $venteshowroom,
            'form' => $form->createView(),
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
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fournisseur_index');
        }

        return $this->render('venteshowroom/new.html.twig', [
            'venteshowroom' => $venteshowroom,
            'form' => $form->createView(),
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
