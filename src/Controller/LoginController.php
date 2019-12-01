<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController
{
    private $tokenManager;
    public function __construct(CsrfTokenManagerInterface $tokenManager = null)
    {
        $this->tokenManager = $tokenManager;
    }

    /**
     * @Route("/login", name="app_login", methods={"GET","POST"})
     */
    public function loginAction(AuthenticationUtils $authenticationUtils): Response
    {
        $csrfToken = $this->tokenManager
            ? $this->tokenManager->getToken('authenticate')->getValue()
            : null;

        return $this->render('user/login.html.twig', [
            'error' => $authenticationUtils->getLastAuthenticationError(),
            'last_username' =>$authenticationUtils->getLastUsername(),
            'csrf_token' => $csrfToken,
        ]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout(): void
    {

    }
}
