<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Form\CategorieType;
use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionBagInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Dompdf\Dompdf;
use Dompdf\Options;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @Route("/categorie")
 */

class CategorieController extends AbstractController
{

    /**
     * @Route("/", name="categorie_index", methods={"GET"})
     */
    public function index(CategorieRepository $categorieRepository): Response
    {
        return $this->render('categorie/index.html.twig', [
            'categories' => $categorieRepository->findAll(),
        ]);
    }

    /**
     * @Route("/liste", name="categorie_liste", methods={"GET"})
     */
    public function liste(CategorieRepository $categorieRepository): Response
    {
        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');

// Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);
        $categories = $categorieRepository->findAll();
        /*return $this->render('categorie/liste.html.twig', [
            'categories' => $categories,
        ]);*/


// Retrieve the HTML generated in our twig file
        $html = $this->renderView('categorie/liste.html.twig', [
'categories' => $categories,
]);
// Load HTML to Dompdf
$dompdf->loadHtml($html);
// (Optional) Setup the paper size and orientation 'p
$dompdf->setPaper('A4', 'portrait');
// Render the HTML as PDF
$dompdf->render();
// Output the generated PDF to Browser (force downloa
$dompdf->stream("Liste des catégories.pdf", [
    "Attachment" => false
]);

    }

    /**
     * @Route("/new", name="categorie_new", methods={"GET","POST"})
     */
  /*  public function new(Request $request, UserInterface $user): Response*/
    public function new(Request $request): Response
    {
        $categorie = new Categorie();
        $form = $this->createForm(CategorieType::class, $categorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $categorie->setCreatedBy($this->getUser());
            /*$categorie->setCreatedBy($this->getUser());*/
            $entityManager->persist($categorie);
            $entityManager->flush();

            $request->getSession()->getFlashBag()->add('success', 'Enregistrement bien effectué.');
            return $this->redirectToRoute('categorie_index');
        }

        return $this->render('categorie/new.html.twig', [
            'categorie' => $categorie,
            'form' => $form->createView(),
/*<<<<<<< HEAD*/

/*=======*/
          /*  'id'    => $user->getId()*/
/*>>>>>>> cccffef21ab05015167d3fea9954872b3e053207*/
        ]);
    }

    /**
     * @Route("/{slug}", name="categorie_show", methods={"GET"})
     */
    public function show(Categorie $categorie): Response
    {
        return $this->render('categorie/show.html.twig', [
            'categorie' => $categorie,
        ]);
    }

    /**
     * @Route("/{slug}/edit", name="categorie_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Categorie $categorie): Response
    {
        $form = $this->createForm(CategorieType::class, $categorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $categorie->setEditedBy($this->getUser());
            $this->getDoctrine()->getManager()->flush();

            $request->getSession()->getFlashBag()->add('info', 'Modification bien effectuée.');

            return $this->redirectToRoute('categorie_index');
        }

        return $this->render('categorie/edit.html.twig', [
            'categorie' => $categorie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{slug}", name="categorie_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Categorie $categorie): Response
    {
        if ($this->isCsrfTokenValid('delete'.$categorie->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($categorie);
            $entityManager->flush();
            $request->getSession()->getFlashBag()->add('warning', 'Suppression bien effectuée.');
        }

        return $this->redirectToRoute('categorie_index');
    }

}

