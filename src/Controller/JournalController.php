<?php

namespace App\Controller;

use App\Entity\Journal;
use App\Form\JournalType;
use App\Repository\JournalRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;

final class JournalController extends AbstractController
{
    #[Route('/journal', name: 'app_journal')]
public function index(JournalRepository $journalRepo, ChartBuilderInterface $chartBuilder): Response
{
    $user = $this->getUser();
    $journal = $journalRepo->findBy(['user' => $user]);

    // On remet dans l'ordre chronologique (du plus ancien au plus récent) pour le graphique
    $entrees = array_reverse($journal);

    $labels = [];
    $valeurs = [];
    foreach ($entrees as $entree) {
        $labels[] = $entree->getDate()->format('d/m');
        $valeurs[] = $entree->getIntensite();
    }

    $chart = $chartBuilder->createChart(Chart::TYPE_LINE);
    $chart->setData([
        'labels' => $labels,
        'datasets' => [[
            'label' => 'Intensité',
            'data' => $valeurs,
            'borderColor' => '#111827',
            'backgroundColor' => '#111827',
            'borderWidth' => 2,
            'pointRadius' => 4,
            'pointBackgroundColor' => '#111827',
            'tension' => 0.3,
            'fill' => false,
        ]],
    ]);
    $chart->setOptions([
        'responsive' => true,
        'maintainAspectRatio' => false,
        'plugins' => ['legend' => ['display' => false]],
        'scales' => [
            'y' => [
                'beginAtZero' => true,
                'max' => 10,
                'ticks' => ['stepSize' => 2, 'color' => '#9CA3AF'],
                'grid' => ['color' => '#F3F4F6'],
            ],
            'x' => [
                'ticks' => ['color' => '#9CA3AF'],
                'grid' => ['display' => false],
            ],
        ],
    ]);

    return $this->render('journal/index.html.twig', [
        'infoJournal' => $journal,
        'chart' => $chart,
    ]);
}



        // route pour ajouter des info dans le journal 
     #[Route('/ajoutJournal', name: 'app_ajout_journal')]
    public function ajoutJournal(EntityManagerInterface $entityManager, Request $request): Response
    {
        $ajoutJournal =  new Journal();

        $form = $this->createForm(JournalType::class, $ajoutJournal);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $ajoutJournal->setUser($this->getUser());
            $ajoutJournal->setDate($form->get('date')->getData());
            $ajoutJournal->setNote($form->get('note')->getData());
            $ajoutJournal->setIntensite($form->get('intensite')->getData());
           
            $entityManager->persist($ajoutJournal);
            $entityManager->flush();

            return $this->redirectToRoute('app_journal');
            
            }

        return $this->render('journal/ajout.html.twig', [
            'journalType' => $form->createView(),
        ]);
    }


 
}
