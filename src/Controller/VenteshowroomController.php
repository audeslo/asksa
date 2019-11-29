<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class VenteshowroomController extends AbstractController
{
    /**
     * @Route("/venteshowroom", name="venteshowroom")
     */
    public function index()
    {
        return $this->render('venteshowroom/index.html.twig', [
            'controller_name' => 'VenteshowroomController',
        ]);
    }
}
