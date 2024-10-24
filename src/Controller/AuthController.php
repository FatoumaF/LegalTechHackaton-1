<?php
// src/Controller/AuthController.php

// src/Controller/AuthController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;

class AuthController extends AbstractController
{
    #[Route('/signin', name: 'signin')]
    public function signin(AuthenticationUtils $authenticationUtils): Response
    {
        // Récupère le dernier email en cas d'erreur de connexion
        $lastEmail = $authenticationUtils->getLastUsername();
        // Récupère l'erreur de connexion si elle existe
        $error = $authenticationUtils->getLastAuthenticationError();

        // Si l'utilisateur est connecté, redirigez-le vers le dashboard
        if ($this->getUser()) {
            return $this->redirectToRoute('app_dashboard');
        }

        return $this->render('auth/signin.html.twig', [
            'last_email' => $lastEmail,
            'error' => $error,
        ]);
    }
}
