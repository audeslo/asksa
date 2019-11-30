<?php

namespace App\Controller;

use App\Entity\Modereglement;
use App\Form\ModereglementType;
use App\Repository\ModereglementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/modereglement")
 */


class ModereglementController extends AbstractController
{
    /**
     * @Route("/", name="modereglement_index", methods={"GET"})
     */
    public function index(ModereglementRepository $modereglementRepository): Response
    {
        return $this->render('modereglement/index.html.twig', [
            'modereglements' => $modereglementRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="modereglement_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $modereglement = new Modereglement();
        $form = $this->createForm(ModereglementType::class, $modereglement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($modereglement);
            $entityManager->flush();

            $request->getSession()->getFlashBag()->add('success', 'Enregistrement bien effectué.');
            return $this->redirectToRoute('modereglement_index');
        }

        return $this->render('modereglement/new.html.twig', [
            'modereglement' => $modereglement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{slug}", name="modereglement_show", methods={"GET"})
     */
    public function show(Modereglement $modereglement): Response
    {
        return $this->render('modereglement/show.html.twig', [
            'modereglement' => $modereglement,
        ]);
    }

    /**
     * @Route("/{slug}/edit", name="modereglement_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Modereglement $modereglement): Response
    {
        $form = $this->createForm(ModereglementType::class, $modereglement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $request->getSession()->getFlashBag()->add('info', 'Modification bien effectuée.');

            return $this->redirectToRoute('modereglement_index');
        }

        return $this->render('modereglement/edit.html.twig', [
            'modereglement' => $modereglement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{slug}", name="modereglement_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Modereglement $modereglement): Response
    {
        if ($this->isCsrfTokenValid('delete'.$modereglement->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($modereglement);
            $entityManager->flush();
            $request->getSession()->getFlashBag()->add('warning', 'Suppression bien effectuée.');
        }

        return $this->redirectToRoute('modereglement_index');
    }
}
