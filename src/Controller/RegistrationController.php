<?php

// src/Controller/RegistrationController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class RegistrationController extends AbstractController
{
    #[Route('/register', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $passwordHasher, EntityManagerInterface $entityManager): Response
    {
        // Créez un nouvel utilisateur
        $user = new User();

        // Récupération des données depuis le formulaire
        $email = $request->request->get('email');
        $username = $request->request->get('username');
        $plainPassword = $request->request->get('password');

        if (!$email || !$username || !$plainPassword) {
            $this->addFlash('error', 'Tous les champs sont requis.');
            return $this->render('auth/register.html.twig', [
                'error' => 'Tous les champs sont requis.', // Passer l'erreur à la vue
            ]);
        }

        // Définir les valeurs sur l'utilisateur
        $user->setEmail($email);
        $user->setUsername($username);

        // Encodez le mot de passe avant de le définir sur l'utilisateur
        $hashedPassword = $passwordHasher->hashPassword($user, $plainPassword);
        $user->setPassword($hashedPassword);

        // Sauvegardez l'utilisateur dans la base de données
        $entityManager->persist($user);
        $entityManager->flush();

        // Redirigez vers la route de connexion après l'inscription
        return $this->redirectToRoute('signin');
    }
}
