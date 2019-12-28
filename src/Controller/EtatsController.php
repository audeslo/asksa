<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use App\Repository\VenteshowroomRepository;
use Dompdf\Dompdf;
use Dompdf\Options;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EtatsController extends AbstractController
{
    /**
     * @Route("/venteparshowroom", name="venteparshowroom_liste", methods={"GET"})
     */
    public function venteparshowroom(VenteshowroomRepository $venteshowroomRepository): Response
    {
        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');

// Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);
        $venteshowroom = $venteshowroomRepository->findAll();
        /*return $this->render('categorie/liste.html.twig', [
            'categories' => $categories,
        ]);*/


// Retrieve the HTML generated in our twig file
        $html = $this->renderView('etats/venteparshowroom.html.twig', [
            'venteshowroom' => $venteshowroom,
        ]);
// Load HTML to Dompdf
        $dompdf->loadHtml($html);
// (Optional) Setup the paper size and orientation 'p
        $dompdf->setPaper('A4', 'portrait');
// Render the HTML ag<T5>Tgs PDF
        $dompdf->render();
// Output the generated PDF to Browser (force downloa
        $dompdf->stream("Liste des catégories.pdf", [
            "Attachment" => false
        ]);

    }

}
