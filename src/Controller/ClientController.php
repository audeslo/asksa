<?php

namespace App\Controller;

use App\Entity\Client;
use App\Form\ClientpmType;
use App\Form\ClientType;
use App\Repository\ClientRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/client")
 */
class ClientController extends AbstractController
{
    /**
     * @Route("/", name="client_index", methods={"GET"})
     */
    public function index(ClientRepository $clientRepository): Response
    {
        return $this->render('client/index.html.twig', [
            'clients' => $clientRepository->findAll(),
        ]);
    }

    /**
     * @Route("/nouvelle-personne-physyque", name="client_newph", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $client = new Client();
        $form = $this->createForm(ClientType::class, $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $client->setType(1);
            $client->setCreatedBy($this->getUser());
            $entityManager->persist($client);
            $entityManager->flush();
            $lastid=$entityManager->getRepository('App:Client')->findLastId();

            $entityManager->getRepository('App:Client')->updateLastReferent($lastid,'CL-'.getAugmente($lastid));
            $request->getSession()->getFlashBag()->add('success', 'Enregistrement bien effectué.');
            return $this->redirectToRoute('client_index');
        }

        return $this->render('client/new.html.twig', [
            'client' => $client,
            'form' => $form->createView(),
            'type' => 'pp'
        ]);
    }

    /**
     * @Route("/nouvelle-personne-morale", name="client_newpm", methods={"GET","POST"})
     */
    public function newpm(Request $request): Response
    {
        $client = new Client();
        $form = $this->createForm(ClientpmType::class, $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $client->setCreatedBy($this->getUser());
            $client->setType(0);
            $entityManager->persist($client);
            $entityManager->flush();


            $lastid=$entityManager->getRepository('App:Client')->findLastId();

            $entityManager->getRepository('App:Client')->updateLastReferent($lastid,'CL-'.getAugmente($lastid));

            $request->getSession()->getFlashBag()->add('success', 'Enregistrement bien effectué.');
            return $this->redirectToRoute('client_index');
        }

        return $this->render('client/new.html.twig', [
            'client' => $client,
            'form' => $form->createView(),
            'type'  => 'pm'
        ]);
    }

    /**
     * @Route("/{slug}", name="client_show", methods={"GET"})
     */
    public function show(Client $client): Response
    {
        return $this->render('client/show.html.twig', [
            'client' => $client,
        ]);
    }
    /**
     * @Route("/{slug}", name="client_showpm", methods={"GET"})
     */
    public function showpm(Client $client): Response
    {
        return $this->render('client/show.html.twig', [
            'client' => $client,
        ]);
    }

    /**
     * @Route("/{slug}/edit", name="client_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Client $client): Response
    {
        $form = $this->createForm(ClientType::class, $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $client->setEditedBy($this->getUser());
            $this->getDoctrine()->getManager()->flush();

            $request->getSession()->getFlashBag()->add('info', 'Modification bien effectuée.');

            return $this->redirectToRoute('client_index');
        }

        return $this->render('client/edit.html.twig', [
            'client' => $client,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{slug}/modification-de-personne-morale", name="client_editpm", methods={"GET","POST"})
     */
    public function editpm(Request $request, Client $client): Response
    {
        $form = $this->createForm(ClientpmType::class, $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $client->setEditedBy($this->getUser());
            $this->getDoctrine()->getManager()->flush();

            $request->getSession()->getFlashBag()->add('info', 'Modification bien effectuée.');

            return $this->redirectToRoute('client_index');
        }

        return $this->render('client/edit.html.twig', [
            'client' => $client,
            'form' => $form->createView(),
            'type'  => 'pm'
        ]);
    }

    /**
     * @Route("/{slug}", name="client_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Client $client): Response
    {
        if ($this->isCsrfTokenValid('delete'.$client->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($client);
            $entityManager->flush();
            $request->getSession()->getFlashBag()->add('warning', 'Suppression bien effectuée.');
        }

        return $this->redirectToRoute('client_index');
    }
}

function getAugmente(int $autom)
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