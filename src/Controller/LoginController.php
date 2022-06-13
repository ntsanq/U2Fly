<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController
{
    #[Route('/login', name: 'login')]
    public function index(AuthenticationUtils $authenticationUtils): Response
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('login/index.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }

    #[Route('/login_success', name: 'login_success')]
    public function handleSuccess(): Response
    {
        if ($this->isGranted('ROLE_ADMIN')){
           return $this->redirectToRoute('app_admin');
        }
        return $this->redirectToRoute('app_profile');
    }

    #[Route('/logout', name: 'logout')]
    public function logout()
    {
        var_dump('log out success');die;
    }
}
