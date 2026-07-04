<?php

namespace App\Controller;

use App\Repository\RendezVousRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_dashboard')]
    public function index(RendezVousRepository $rdvRepo): Response
    {

        $user = $this->getUser();
        $rdv = $rdvRepo->findBy(['user' => $user]);

        return $this->render('dashboard/index.html.twig', [
            'rendezVous' => $rdv,
        ]);
    }
}
