<?php

namespace App\Controller;

use App\Entity\Commander;
use App\Entity\Commandeshow;
use App\Entity\ShowroomSearch;
use App\Form\ShwroomSearchType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/stock_actuel_magasin")
 * Class ViewStockController
 * @package App\Controller
 */
class ViewStockController extends AbstractController
{
    /**
     * @Route("/", name="stock_actuel")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    /* @Route("/stock_actuel_magasin", name="stock_actuel")*/
    public function index()
    {
        $cmds = $this->getDoctrine()->getRepository(Commander::class)->findProduitIdentic();

        return $this->render('viewStock/index.html.twig', [
            'cmds'  => $cmds
        ]);

    }
    /**
     * @Route("/commande-showroom", name="commande.showroom")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showRoom(Request $request)
    {
        $search = new ShowroomSearch();

        $form = $this->createForm(ShwroomSearchType::class, $search);
        $form->handleRequest($request);
        if($request->get('showroom')){
            $id = $request->get('showroom');
        }else{
            $id = null;
        }
        $prods = $this->getDoctrine()->getRepository(Commandeshow::class)->findCommanderByShowroom($id);
        return $this->render('viewStock/showroom.html.twig', [
            'cmds'  => $prods,
            'form'  => $form->createView(),
            'id'    => $id
        ]);
    }
}
