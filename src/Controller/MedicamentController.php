<?php

namespace App\Controller;

use App\Entity\Medicament;
use App\Form\MedicamentType;
use App\Repository\MedicamentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\PriseMedicament;
use Symfony\Component\HttpFoundation\JsonResponse;

final class MedicamentController extends AbstractController
{
    #[Route('/medicament', name: 'app_medicament')]
    public function index(MedicamentRepository $medicamentRepo): Response
    {

    $user = $this->getUser();
    
    $medicament = $medicamentRepo->findBy(['user'=> $user]) ;

        return $this->render('medicament/index.html.twig', [
            'medicaments' => $medicament,
        ]);
    }

     #[Route('/ajoutMedicament', name: 'app_ajout_medicament')]
    public function ajouterMedicament(EntityManagerInterface $entityManager, Request $request): Response
    {

    $ajoutMedicament = new Medicament() ;

    $form = $this->createForm(MedicamentType::class, $ajoutMedicament);

    $form->handleRequest($request);

    if($form->isSubmitted() && $form->isValid()){
        $ajoutMedicament->setUser($this->getUser());
        $ajoutMedicament->setNom($form->get('nom')->getData());
        $ajoutMedicament->setDosage($form->get('dosage')->getData());
        $ajoutMedicament->setDateDebut($form->get('date_debut')->getData());
        $ajoutMedicament->setDateFin($form->get('date_fin')->getData());

        $entityManager->persist($ajoutMedicament);
        $entityManager->flush();

        return $this->redirectToRoute('app_medicament');
    }

        return $this->render('medicament/ajout.html.twig', [
            'medicamentType' => $form->createView(),
        ]);
    }



    // route qui permet de valider si on a pris un médicament directement sur le dashboard 
#[Route('/prise/{id}/toggle', name: 'app_prise_toggle', methods: ['POST'])]
public function togglePrise(PriseMedicament $prise, EntityManagerInterface $em): JsonResponse
{
    // Sécurité : vérifier que la prise appartient bien à l'utilisateur connecté
    if ($prise->getMedicament()->getUser() !== $this->getUser()) {
        return new JsonResponse(['error' => 'Accès refusé'], 403);
    }

    // On inverse l'état
    $prise->setEffectuee(!$prise->isEffectuee());
    $em->flush();

    return new JsonResponse([
        'effectuee' => $prise->isEffectuee()
    ]);
}


}
