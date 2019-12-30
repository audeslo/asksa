<?php

namespace App\Controller;

use App\Entity\Capacite;
use App\Form\CapaciteType;
use App\Repository\CapaciteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/capacite")
 */
class CapaciteController extends AbstractController
{
    /**
     * @Route("/", name="capacite_index", methods={"GET"})
     */
    public function index(CapaciteRepository $capaciteRepository): Response
    {
        return $this->render('capacite/index.html.twig', [
            'capacites' => $capaciteRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="capacite_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $capacite = new Capacite();
        $form = $this->createForm(CapaciteType::class, $capacite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $capacite->setCreatedBy($this->getUser());
            $capacite->setCode($form->get('capacitecarton')
                                            ->getData().'B de '.$form
                                            ->get('capacitebidon')->getData().'L');
            $entityManager->persist($capacite);
            $entityManager->flush();
            $request->getSession()->getFlashBag()->add('success', 'Enregistrement bien effectué.');
            return $this->redirectToRoute('capacite_index');
        }

        return $this->render('capacite/new.html.twig', [
            'capacite' => $capacite,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{slug}", name="capacite_show", methods={"GET"})
     */
    public function show(Capacite $capacite): Response
    {
        return $this->render('capacite/show.html.twig', [
            'capacite' => $capacite,
        ]);
    }

    /**
     * @Route("/{slug}/edit", name="capacite_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Capacite $capacite): Response
    {
        $form = $this->createForm(CapaciteType::class, $capacite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $capacite->setEditedBy($this->getUser());
            $capacite->setCode($form->get('capacitecarton')
                    ->getData().'B de '.$form
                    ->get('capacitebidon')->getData().'L');
            $this->getDoctrine()->getManager()->flush();

            $request->getSession()->getFlashBag()->add('info', 'Modification bien effectuée.');
            return $this->redirectToRoute('capacite_index');
        }

        return $this->render('capacite/edit.html.twig', [
            'capacite' => $capacite,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{slug}", name="capacite_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Capacite $capacite): Response
    {
        if ($this->isCsrfTokenValid('delete'.$capacite->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($capacite);
            $entityManager->flush();

            $request->getSession()->getFlashBag()->add('warning', 'Suppression bien effectuée.');
        }

        return $this->redirectToRoute('capacite_index');
    }
}
