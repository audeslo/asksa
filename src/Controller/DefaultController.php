<?php

namespace App\Controller;

use App\Entity\Client;
use App\Form\ClientType;
use CodeItNow\BarcodeBundle\Utils\QrCode;



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



            return null;

        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

}
