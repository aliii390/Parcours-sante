<?php

namespace App\Controller;

use App\Repository\MedicamentRepository;
use App\Repository\RendezVousRepository;
use App\Repository\JournalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_dashboard')]
    public function index(RendezVousRepository $rdvRepo, MedicamentRepository $medicamentRepo, JournalRepository $journalRepo): Response
    {
        $user = $this->getUser();
        $rdv = $rdvRepo->findBy(['user' => $user]);
        $medoc = $medicamentRepo->findBy(['user' => $user]);

        // Dernière entrée du journal (la plus récente)
        $dernierJournal = $journalRepo->findBy(['user' => $user], ['date' => 'DESC'], 1);
        $dernierJournal = $dernierJournal[0] ?? null;

        return $this->render('dashboard/index.html.twig', [
            'rendezVous' => $rdv,
            'medicaments' => $medoc,
            'dernierJournal' => $dernierJournal,
        ]);
    }
}