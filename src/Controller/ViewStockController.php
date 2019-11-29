<?php

namespace App\Controller;

use App\Entity\Commander;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ViewStockController extends AbstractController
{
    /**
     * @Route("/stock_actuel_magasin", name="stock_actuel")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {
        $cmds = $this->getDoctrine()->getRepository(Commander::class)->findProduitIdentic();

        return $this->render('viewStock/index.html.twig', [
            'cmds'  => $cmds
        ]);

    }
}
