<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ContratsType;
use App\Entity\Contrats;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

class ContratController extends AbstractController
{
    #[Route('/contrats', name: 'app_contrats')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $contrats = $entityManager->getRepository(Contrats::class)->findAll();

        return $this->render('contrat/index.html.twig', [
            'contrats' => $contrats,
        ]);
    }

    #[Route('/contrats/new', name: 'app_contrat_new')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $contrat = new Contrats();
        $contrat->setStatut('creation'); // État initial du contrat
    
        $form = $this->createForm(ContratsType::class, $contrat);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            // Gestion du fichier téléchargé
            $pdfFile = $form->get('pdfFile')->getData(); // Utiliser le nom correct du champ
            if ($pdfFile) {
                $contrat->setPdfFile($pdfFile); // Assurez-vous que cette méthode existe dans l'entité Contrats
            }
    
            $entityManager->persist($contrat);
            $entityManager->flush();
    
            return $this->redirectToRoute('app_contrats');
        }
    
        return $this->render('contrat/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    


    #[Route('/contrats/{id}', name: 'app_contrat_show', methods: ['GET'])]
    public function show(Contrats $contrat): Response
    {
        return $this->render('contrat/show.html.twig', [
            'contrat' => $contrat,
        ]);
    }
    #[Route('/contrats/{id}/edit', name: 'app_contrat_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Contrats $contrat, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ContratsType::class, $contrat);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            // Gestion du fichier PDF
            $pdfFile = $form->get('pdfFile')->getData();
            if ($pdfFile) {
                $uploadsDirectory = $this->getParameter('kernel.project_dir') . '/public/uploads/pdf';
                $pdfFileName = uniqid() . '.' . $pdfFile->guessExtension();
    
                // Déplacement du fichier
                $pdfFile->move($uploadsDirectory, $pdfFileName);
    
                // Mise à jour de l'entité avec le nom du fichier
                $contrat->setPdfFile($pdfFile);
            }
    
            // Gestion du fichier de contrat (similaire à la gestion du PDF)
            $contratFile = $form->get('contratFile')->getData();
            if ($contratFile) {
                $uploadsDirectory = $this->getParameter('kernel.project_dir') . '/public/uploads/contracts';
                $contratFileName = uniqid() . '.' . $contratFile->guessExtension();
    
                // Déplacement du fichier
                $contratFile->move($uploadsDirectory, $contratFileName);
    
                // Mise à jour de l'entité avec le nom du fichier
                $contrat->setContratFile($contratFile);
            }
    
            // Sauvegarde des modifications
            $entityManager->flush();
    
            return $this->redirectToRoute('app_contrats');
        }
    
        return $this->render('contrat/edit.html.twig', [
            'form' => $form->createView(),
            'contrat' => $contrat,
        ]);
    }
    
    
    #[Route('/contrats/{id}', name: 'app_contrat_delete', methods: ['DELETE'])]
    public function delete(Request $request, Contrats $contrat, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $contrat->getId(), $request->request->get('_token'))) {
            $entityManager->remove($contrat);
            $entityManager->flush();
        }

        return $this->render('contrat/delete.html/twig',[
            
        ]
    );

        return $this->redirectToRoute('app_contrats');
    }
}
