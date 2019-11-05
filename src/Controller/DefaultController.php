<?php

namespace App\Controller;
use App\Form\FournisseurType;
use App\Entity\Client;
use App\Form\ClientType;
use App\Entity\Fournisseur;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index()
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

/** public function index()
    {
        return $this->render('base.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }
    */

/* Enregistrement d'un produits*/
    /**
     * @Route("/client", name="client")
     * @param ObjectManager $manager
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function client(ObjectManager $manager, Request $request)
    {
        $client = new Client();
        $form = $this->createForm(ClientType::class, $client);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $manager->persist($client);
            $manager->flush();
            return $this->redirectToRoute('client');
        }
        return $this->render('client/client.html.twig',[
            'form' => $form->createView()
        ]);
    }

    /* Enregistrement d'un produits*/
    /**
     * @Route("/fournisseur", name="fournisseur")
     * @param ObjectManager $manager
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function fournisseur(ObjectManager $manager, Request $request)
    {
        $fournisseur = new Fournisseur();
        $form = $this->createForm(FournisseurType::class, $fournisseur);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $manager->persist($fournisseur);
            $manager->flush();
            return $this->redirectToRoute('/fournisseur');
        }
        return $this->render('fournisseur/fournisseur.html.twig',[
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/client/{id}/update", name="client.update")
     * @param Client $client
     * @param ObjectManager $manager
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function update(Client $client ,ObjectManager $manager, Request $request)
    {

        $form = $this->createForm(ClientType::class, $client);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $manager->persist($client);
            $manager->flush();
            return $this->redirectToRoute('client');
        }
        return $this->render('client/client.html.twig',[
            'form' => $form->createView()
        ]);
    }


    /**
     * @Route("/client/fiche", name="client.fiche")
     * @param ObjectManager $manager
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function list_client(){
        $clients = $this->getDoctrine()->getRepository(Client::class)->findAll();

        return $this->render('client/client_recherche.html.twig', [
            'clients'   => $clients
        ]);
    }




}
