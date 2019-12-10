<?php

namespace App\Controller;

use App\Entity\Tarifcategorieclt;
use App\Form\TarifcategoriecltType;
use App\Repository\TarifcategoriecltRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/tarifcategorieclt")
 */
class TarifcategoriecltController extends AbstractController
{
    /**
     * @Route("/", name="tarifcategorieclt_index", methods={"GET"})
     */
    public function index(TarifcategoriecltRepository $tarifcategoriecltRepository): Response
    {
        return $this->render('tarifcategorieclt/index.html.twig', [
            'tarifcategorieclts' => $tarifcategoriecltRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="tarifcategorieclt_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tarifcategorieclt = new Tarifcategorieclt();
        $form = $this->createForm(TarifcategoriecltType::class, $tarifcategorieclt);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $tarifcategorieclt->setCreatedBy($this->getUser());
            $entityManager->persist($tarifcategorieclt);
            $entityManager->flush();

            $request->getSession()->getFlashBag()->add('success', 'Enregistrement bien effectué.');
            return $this->redirectToRoute('tarifcategorieclt_index');
        }

        return $this->render('tarifcategorieclt/new.html.twig', [
            'tarifcategorieclt' => $tarifcategorieclt,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tarifcategorieclt_show", methods={"GET"})
     */
    public function show(Tarifcategorieclt $tarifcategorieclt): Response
    {
        return $this->render('tarifcategorieclt/show.html.twig', [
            'tarifcategorieclt' => $tarifcategorieclt,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="tarifcategorieclt_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Tarifcategorieclt $tarifcategorieclt): Response
    {
        $form = $this->createForm(TarifcategoriecltType::class, $tarifcategorieclt);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $tarifcategorieclt->setEditedBy($this->getUser());
            $this->getDoctrine()->getManager()->flush();

            $request->getSession()->getFlashBag()->add('info', 'Modification bien effectuée.');

            return $this->redirectToRoute('tarifcategorieclt_index');
        }

        return $this->render('tarifcategorieclt/edit.html.twig', [
            'tarifcategorieclt' => $tarifcategorieclt,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tarifcategorieclt_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Tarifcategorieclt $tarifcategorieclt): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tarifcategorieclt->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tarifcategorieclt);
            $entityManager->flush();
            $request->getSession()->getFlashBag()->add('warning', 'Suppression bien effectuée.');
        }

        return $this->redirectToRoute('tarifcategorieclt_index');
    }
}
