<?php

namespace App\Controller;

use App\Entity\Commandershow;
use App\Entity\Commandeshow;
use App\Entity\Stockshowroom;
use App\Form\CommandershowType;
use App\Repository\CommandershowRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/commandershow")
 */
class CommandershowController extends AbstractController
{
    /**
     * @Route("/Liste-des-produits-commandes/{slug}", name="commandershow_index", methods={"GET"})
     * @param CommandershowRepository $commandershowRepository
     * @param Commandeshow $commandeshow
     * @return Response
     */
    public function index(CommandershowRepository $commandershowRepository, Commandeshow $commandeshow): Response
    {
        $this->get('session')->set('commandeshow',$commandeshow);

        return $this->render('commandershow/index.html.twig', [
            'commandershows' => $commandershowRepository->findBy(['commandeshow' => $commandeshow->getId()]),
            'commandeshow'  =>  $commandeshow,
        ]);
    }

    /**
     * @Route("/new", name="commandershow_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $commandeshow=$this->get('session')->get('commandeshow');

        $commandershow = new Commandershow();
        $form = $this->createForm(CommandershowType::class, $commandershow);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $commandeshow= $entityManager->getRepository('App:Commandeshow')->find($commandeshow->getId());
            $commandershow->setCommandeshow($commandeshow);
            $commandershow->setQuantitestock($form['quantitecommandeshow']->getData());

            // Récupération de la reférence produit
           $produit=$entityManager->getRepository('App:Produit')->find($form['produit']->getData());
           $refproduit=$produit->getReference();

            //refernce commande
            $refcommandeshow=$commandeshow->getReference();

            $commandershow->setreference($refcommandeshow.'/'.$refproduit.'-'.$form['capacitecartonshow']->getData().'C-'.$form['capacitebidonshow']->getData().'B');

            $commandershow->setCreatedBy($this->getUser());
            $entityManager->persist($commandershow);
            $entityManager->flush();

            return $this->redirectToRoute('commandershow_index',['slug' => $commandeshow->getSlug()]);
        }

        return $this->render('commandershow/new.html.twig', [
            'commandershow' => $commandershow,
            'form' => $form->createView(),
            'commandeshow'  => $commandeshow
        ]);
    }

    /**
     * @Route("/{id}", name="commandershow_show", methods={"GET"})
     */
    public function show(Commandershow $commandershow): Response
    {
        return $this->render('commandershow/show.html.twig', [
            'commandershow' => $commandershow,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="commandershow_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Commandershow $commandershow): Response
    {
        $form = $this->createForm(CommandershowType::class, $commandershow);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
           $commandershow->setEditedBy($this->getUser());
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('commandershow_index');
        }

        return $this->render('commandershow/edit.html.twig', [
            'commandershow' => $commandershow,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="commandershow_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Commandershow $commandershow): Response
    {
        if ($this->isCsrfTokenValid('delete'.$commandershow->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($commandershow);
            $entityManager->flush();
        }

        return $this->redirectToRoute('commandershow_index');
    }


    /**
     * @Route("/commandershow_approuver/{id}", name="commandershow_approuver", methods={"GET","POST"})
     * @param Request $request
     * @param Commandeshow $commandeshow
     * @return Response
     */
    public function approvisionnement_showroom(Request $request, Commandeshow $commandeshow): Response
    {
        $em= $this->getDoctrine()->getManager();

        // Recuperer tous les produits (commandershow) contenus sur la commande showroom
        $commandershows=$em->getRepository('App:Commandershow')
                            ->findAllProducts($commandeshow->getId());
        foreach ($commandershows as $key => $commandershow) {
            // recuperer la quantité disponible de chaque produit (en entier, cast)
            $quantiteStock= (int)$em->getRepository('App:Commander')
                ->findQuantityInStock($commandershow->getProduit()->getId(),
                    $commandershow->getCapacitecartonshow(),
                    $commandershow->getCapacitebidonshow());

                // comparaison de la quantite commandée et celle disponible
           if ($quantiteStock < (int) $commandershow->getQuantitecommandeshow()) {
              // si un des produit est en quantité insuffisante ou inexistant, le traitement s'arrête
               $request->getSession()->getFlashBag()->add('danger',
                   'Le produit ' . $commandershow->getProduit()->getDesignation() . ' de carton de ' .
                   $commandershow->getCapacitecartonshow() . ' et de ' . $commandershow->getCapacitebidonshow() .
                   ' L par bidon n\'existe pas ou est en quantité insuffisante');

               return $this->redirectToRoute('commandershow_index', ['slug'
               => $commandershow->getCommandeshow()->getSlug()]);
           }
        }

        // tous les produit étant disponible, le traitement passe à la validation

        foreach ($commandershows as $key => $commandershow){
            $quantiteCommandee= (int) $commandershow->getQuantitecommandeshow();

            // recuperer tous les commandes de au magazin dont la quantité en stock est >0


            $commanders=$em->getRepository('App:Commander')
                ->findListCommanderDispo($commandershow->getProduit()->getId(),
                    $commandershow->getCapacitecartonshow(),
                    $commandershow->getCapacitebidonshow());


            // Parcour de chaque commande
            foreach ($commanders as $commander ){

                    $qteStock= (int) $commander->getQuantiteenstock();
                if ($qteStock<$quantiteCommandee){// quantité en stock inferieur,

                    $em->getRepository('App:Commander')
                        ->UpdateCommander($commander->getId(),0);
                    $quantiteCommandee -= $qteStock;
                }else{
                    $qteStock -= $quantiteCommandee;
                    $em->getRepository('App:Commander')
                        ->UpdateCommander($commander->getId(),$qteStock);
                    break;

                }

            }

            // on continue l'enregistrement dans le stock de sow room

            for ($i=0; $i<$quantiteCommandee; $i++){// Enregistrement carton
                  $nbrebidon = (int) $commandershow->getCapacitecartonshow();

                  // Enregistrement de chaque Bidon
                  for ($cpt=0; $cpt<$nbrebidon; $cpt++){
                      $stockshowroom = new Stockshowroom();
                      $stockshowroom->setCommandershow($commandershow);
                      $stockshowroom->setReferencecarton($commandershow
                                    ->getReference().'/'.($i+1));
                      $stockshowroom->setReferencebidon($commandershow
                                    ->getReference().'/'.($i+1).'-'.($cpt+1));
                      $stockshowroom->setOuvert(false);
                      $stockshowroom->setVendu(false);
                      $stockshowroom->setPrixdevente(0);

                      // Persistence
                      $em->persist($stockshowroom);
                      $em->flush();



                  }

            }


        }

        // mise à jour de commandeShow
        $em->getRepository('App:Commandeshow')
            ->updateCommandeshow($commandershow
                ->getCommandeshow()->getId());

        return $this->redirectToRoute('commandershow_index', ['slug'
        => $commandershow->getCommandeshow()->getSlug()]);
    }


}

function etatStockProduit(int $produit, int $carton, int $bidon, int $stock){


}
