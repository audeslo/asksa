<?php

namespace App\Controller;

use App\Entity\Client;
use App\Form\ClientType;
use CodeItNow\BarcodeBundle\Utils\QrCode;



use Doctrine\Common\Persistence\ObjectManager;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;

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
     * @Route("/codebargenerate", name="code_bare_generate")
     */
    public function pdfAction(\Knp\Snappy\Pdf $knpSnappy)
    {
        $this->knpSnappy = $knpSnappy;
        $vars=2;
        $html = $this->renderView('default/codebar.html.twig', array(
            'some'  => $vars
        ));

        return new PdfResponse(
            $this->knpSnappy->getOutputFromHtml($html),
            'file.pdf'
        );
    }


}
