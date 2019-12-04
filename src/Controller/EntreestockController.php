<?php

namespace App\Controller;



use App\Repository\CommanderRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

    /**
     * @Route("/commander")
     */
class EntreestockController extends AbstractController
{
    /**
     * @Route("/", name="entree_index", methods={"GET"})
     */
    public function index(CommanderRepository $CommanderRepository): Response
    {
        return $this->render('EntreeStock/index.html.twig', [
            'commanders' => $CommanderRepository->findAll(),
        ]);
    }
}
