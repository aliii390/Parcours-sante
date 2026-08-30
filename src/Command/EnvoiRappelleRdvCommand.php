<?php

namespace App\Command;

use App\Repository\PriseMedicamentRepository;
use App\Repository\RendezVousRepository;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

#[AsCommand(name: 'app:envoyer-rappels', description: 'Envoie les rappels de médicaments par email')]
class EnvoyerRappelsCommand extends Command
{
    //A CONTINUER QUAND J AURAIS FINI DE GERER LA LOGIQUE DES RENDEZ VOUS 
    public function __construct(
        private RendezVousRepository $rdvRepo,
        private MailerInterface $mailer
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        //   $rdv = $rdvRepo->findBy(['user' => $user]);
        // $medoc = $medicamentRepo->findBy(['user'=>$user]);
        // On récupère toutes les prises non effectuées
        $prises = $this->rdvRepo->findBy(['effectuee' => false]);

        $count = 0;
        foreach ($prises as $prise) {
            $medicament = $prise->getMedicament();
            $user = $medicament->getUser();

            if (!$user || !$user->getEmail()) {
                continue;
            }

            $email = (new Email())
                ->from('rappels@parcours-sante.fr')
                ->to($user->getEmail())
                ->subject('Rappel : prenez votre ' . $medicament->getNom())
                ->html(
                    '<h2>Bonjour ' . $user->getPrenom() . '</h2>' .
                    '<p>C\'est l\'heure de prendre votre médicament :</p>' .
                    '<p><strong>' . $medicament->getNom() . ' ' . $medicament->getDosage() . '</strong></p>' .
                    '<p>Heure prévue : ' . $prise->getHeurePrevue()->format('H:i') . '</p>' .
                    '<p>Nombre de comprimés : ' . $prise->getNombresComprimes() . '</p>' .
                    '<p>Prenez soin de vous 💙</p>'
                );

            $this->mailer->send($email);
            $count++;

            sleep(1);
        }

        $output->writeln("$count rappels envoyés !");
        return Command::SUCCESS;
    }
}