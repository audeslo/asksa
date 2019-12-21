<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Dompdf\Options;
use Dompdf\Dompdf;

class TestController extends AbstractController
{
    /**
     * @Route("/Test", name="Tester")
     */
    public function index($objectId)
    {
        // On récupère l'objet à afficher (rien d'inconnu jusque là)
        $objectsRepository = $this->getDoctrine()->getRepository('TestBundle:Object');
        $object = $objectsRepository->findOneById($objectId);
        // On crée une  instance pour définir les options de notre fichier pdf
        $options = new Options();
        // Pour simplifier l'affichage des images, on autorise dompdf à utiliser
        // des  url pour les nom de  fichier
        $options->set('isRemoteEnabled', TRUE);
        // On crée une instance de dompdf avec  les options définies
        $dompdf = new Dompdf($options);
        // On demande à Symfony de générer  le code html  correspondant à
        // notre template, et on stocke ce code dans une variable
        $html = $this->renderView(
            'TestBundle:Object:pdfTemplate.html.twig',
            array('object' => $object)
        );
        // On envoie le code html  à notre instance de dompdf
        $dompdf->loadHtml($html);
        // On demande à dompdf de générer le  pdf
        $dompdf->render();
        // On renvoie  le flux du fichier pdf dans une  Response pour l'utilisateur
        return new Response ($dompdf->stream());
    }
}
