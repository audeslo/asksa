<?php

namespace App\Controller;


use App\Entity\Showroom;
use App\Form\ShowroomType;
use App\Repository\FournisseurRepository;
use App\Repository\ShowroomRepository;
use Dompdf\Dompdf;
use Dompdf\Options;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



/**
 * @Route("/showroom")
 */

class ShowroomController extends AbstractController
{
    /**
     * @Route("/", name="showroom_index", methods={"GET"})
     */
    public function index(ShowroomRepository $showroomRepository): Response
    {
        return $this->render('showroom/index.html.twig', [
            'showrooms' => $showroomRepository->findAll(),
        ]);
    }


    /**
     * @Route("/liste", name="showroom_liste", methods={"GET"})
     */
    public function liste(ShowroomRepository $showroomRepository): Response
    {
        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');

// Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);
        $showrooms = $showroomRepository->findAll();
        /*return $this->render('categorie/liste.html.twig', [
            'categories' => $categories,
        ]);*/


// Retrieve the HTML generated in our twig file
        $html = $this->renderView('showroom/liste.html.twig', [
            'showrooms' => $showrooms,
        ]);
// Load HTML to Dompdf
        $dompdf->loadHtml($html);
// (Optional) Setup the paper size and orientation 'p
        $dompdf->setPaper('A4', 'portrait');
// Render the HTML as PDF
        $dompdf->render();
// Output the generated PDF to Browser (force downloa
        $dompdf->stream("Liste des showrooms.pdf", [
            "Attachment" => false
        ]);

    }

    /**
     * @Route("/new", name="showroom_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $showroom = new Showroom();
        $form = $this->createForm(ShowroomType::class, $showroom);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $showroom->setCreatedBy($this->getUser());
            $entityManager->persist($showroom);
            $entityManager->flush();


            $lastid=$entityManager->getRepository('App:Showroom')->findLastId();

            $entityManager->getRepository('App:Showroom')->updateLastReferent($lastid,'SR-'.getIncrementation($lastid));

            $request->getSession()->getFlashBag()->add('success', 'Enregistrement bien effectué.');
            return $this->redirectToRoute('showroom_index');
        }

        return $this->render('showroom/new.html.twig', [
            'showroom' => $showroom,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{slug}", name="showroom_show", methods={"GET"})
     */
    public function show(Showroom $showroom): Response
    {
        return $this->render('showroom/show.html.twig', [
            'showroom' => $showroom,
        ]);
    }

    /**
     * @Route("/{slug}/edit", name="showroom_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Showroom $showroom): Response
    {
        $form = $this->createForm(ShowroomType::class, $showroom);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $showroom->setEditedBy($this->getUser());
            $this->getDoctrine()->getManager()->flush();

            $request->getSession()->getFlashBag()->add('info', 'Modification bien effectuée.');

            return $this->redirectToRoute('showroom_index');
        }

        return $this->render('showroom/edit.html.twig', [
            'showroom' => $showroom,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{slug}", name="showroom_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Showroom $showroom): Response
    {
        if ($this->isCsrfTokenValid('delete'.$showroom->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($showroom);
            $entityManager->flush();
            $request->getSession()->getFlashBag()->add('warning', 'Suppression bien effectuée.');
        }

        return $this->redirectToRoute('showroom_index');
    }
}

function getIncrementation(int $automat)
{

    if($automat<10)
    {
        return '0000'.$automat;
    }elseif ($automat<100)
    {
        return '000'.$automat;
    }elseif ($automat<1000)
    {
        return '00'.$automat;
    }elseif ($automat<10000)
    {
        return '0'.$automat;
    }else{
        return $automat;
    }
}