<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Commandeclient;
use App\Form\CommandeclientType;
use App\Repository\ClientRepository;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/commande-client")
 */

class CommandeClientController extends AbstractController
{
    /**
     * @var ObjectManager
     */
    private $manager;
    /**
     * @var ClientRepository
     */
    private $clientRepository;

    public function __construct(ObjectManager $manager, ClientRepository $clientRepository)
    {
        $this->manager = $manager;
        $this->clientRepository = $clientRepository;
    }

    /**
     * @Route("/", name="commandeclient_index", methods={"GET"})
     */
    public function index()
    {
        $clients = $this->clientRepository->findAll();
        return $this->render('commandeclient/index.html.twig', [
            'clients'    => $clients
        ]);
    }

    /**
     * @Route("/new/{id}", name="commandeclient_new")
     * @param Client $client
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function new(Client $client, Request $request)
    {
        $commande = new Commandeclient();
        $form = $this->createForm(CommandeclientType::class, $commande);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $this->manager->persist($commande);
            $this->manager->flush();
            die();
        }
        return $this->render('commandeclient/new.html.twig', [
            'client'    => $client,
            'form'  => $form->createView()
        ]);
    }
}
