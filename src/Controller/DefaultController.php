<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Commandeshow;
use App\Form\ClientType;
use App\Repository\CommandeshowRepository;
use CodeItNow\BarcodeBundle\Utils\QrCode;



use Doctrine\Common\Persistence\ObjectManager;

use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Dompdf\Dompdf;
use Dompdf\Options;


class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="Accueil")
     */
    public function index()
    {
/*
        $qrCode = new QrCode();
        $qrCode
            ->setText('QR code by codeitnow.in')
            ->setSize(50)
            ->setPadding(10)
            ->setErrorCorrection('high')
            ->setForegroundColor(array('r' => 0, 'g' => 0, 'b' => 0, 'a' => 0))
            ->setBackgroundColor(array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 0))
            ->setLabel('Scan Qr Code')
            ->setLabelFontSize(16)
            ->setImageType(QrCode::IMAGE_TYPE_PNG)
        ;
        dump($qrCode->generate());

        echo '<img src="data:'.$qrCode->getContentType().';base64,'.$qrCode->generate().'" />';



            return null;*/

        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }


    /**
      * @Route("/codebargenerate/{slug}", name="code_bare_generate", methods={"GET"})
      */
    public function pdfAction(Commandeshow $commandeshow)
    {

        $em=$this->getDoctrine()->getManager();
        $references= $em->getRepository('App:Stockshowroom')->findReference($commandeshow);

        dump($references);
        return null;

        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');

        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);



        $vars=2;
        // Set some html and get the service
        $html = $this->renderView('default/codebar.html.twig', array(
            'some'  => $vars
        ));



        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (force download)
        $dompdf->stream('mypdf.pdf', [
            'Attachment' => false
        ]);
    }

}

function codebar($label, $text){
    $qrCode = new QrCode();
    $qrCode
        ->setText($text)
        ->setSize(50)
        ->setPadding(10)
        ->setErrorCorrection('high')
        ->setForegroundColor(array('r' => 0, 'g' => 0, 'b' => 0, 'a' => 0))
        ->setBackgroundColor(array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 0))
        ->setLabel($label)
        ->setLabelFontSize(16)
        ->setImageType(QrCode::IMAGE_TYPE_PNG)
    ;
    //dump($qrCode->generate());

    return $qrCode->generate();

    //echo '<img src="data:'.$qrCode->getContentType().';base64,'.$qrCode->generate().'" />';
}
