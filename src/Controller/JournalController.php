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
    public function index(JournalRepository $journalRepo): Response
    {
        $user = $this->getUser();

        $journal = $journalRepo->findBy(['user'=> $user]) ;


        return $this->render('journal/index.html.twig', [
            'infoJournal' => $journal,
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
