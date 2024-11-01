<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AIController extends AbstractController
{
    #[Route('/a/i', name: 'app_a_i')]
    public function index(): Response
    {
        return $this->render('ai/index.html.twig', [
            'controller_name' => 'AIController',
        ]);
    }
}
