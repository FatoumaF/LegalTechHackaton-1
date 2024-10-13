<?php
// src/Controller/AuthController.php

// src/Controller/AuthController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response; // Assurez-vous que cette ligne est présente

class AuthController extends AbstractController
{
    #[Route('/signin', name: 'signin')]
    public function signin(): Response
    {
        // Logique pour la page de connexion
        return $this->render('auth/signin.html.twig');
    }
}
