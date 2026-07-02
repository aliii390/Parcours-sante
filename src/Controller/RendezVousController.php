<?php

namespace App\Controller;

use App\Entity\RendezVous;
use App\Form\RendezVousType;
use App\Repository\RendezVousRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class RendezVousController extends AbstractController
{
    #[Route('/rdv', name: 'app_rendez_vous')]
    public function index(RendezVousRepository $rdvRepo): Response
    {
        $user = $this->getUser();
        $nombreRdv = $rdvRepo->count(['user'=> $user]);

      $rdv = $rdvRepo->findBy(['user' => $user]);
        return $this->render('rendez_vous/index.html.twig', [
            'rendezVous' => $rdv,
            'nombreRdv'=> $nombreRdv,
        ]);
    }

    // route pour ajt des rdv 
     #[Route('/ajout', name: 'ajout_rendez_vous')]
    public function ajouter(EntityManagerInterface $entityManager, Request $request ): Response
    {

    $ajoutRdv = new RendezVous();

    $form = $this->createForm(RendezVousType::class, $ajoutRdv);
    $form->handleRequest($request);

    if($form->isSubmitted() && $form->isValid()){
        $ajoutRdv->setUser($this->getUser());
        $ajoutRdv->setTitre($form->get('titre')->getData());
        $ajoutRdv->setDate($form->get('date')->getData());
        $ajoutRdv->setMedecin($form->get('medecin')->getData());
        $ajoutRdv->setNotes($form->get('notes')->getData());
        $ajoutRdv->setLieu($form->get('lieu')->getData());
        
       
           $entityManager->persist($ajoutRdv);
           $entityManager->flush(); 

            return $this->redirectToRoute('app_rendez_vous') ;
    }

        return $this->render('rendez_vous/ajout.html.twig', [
            'rendezVousType' => $form->createView(),

        ]);
    }
}
