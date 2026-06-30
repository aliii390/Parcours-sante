<?php

namespace App\Entity;

use App\Repository\NotifRendezVousRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NotifRendezVousRepository::class)]
class NotifRendezVous
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTime $heure_prevue = null;

    #[ORM\Column]
    private ?\DateTime $jour = null;

    #[ORM\Column]
    private ?bool $valider = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHeurePrevue(): ?\DateTime
    {
        return $this->heure_prevue;
    }

    public function setHeurePrevue(\DateTime $heure_prevue): static
    {
        $this->heure_prevue = $heure_prevue;

        return $this;
    }

    public function getJour(): ?\DateTime
    {
        return $this->jour;
    }

    public function setJour(\DateTime $jour): static
    {
        $this->jour = $jour;

        return $this;
    }

    public function isValider(): ?bool
    {
        return $this->valider;
    }

    public function setValider(bool $valider): static
    {
        $this->valider = $valider;

        return $this;
    }
}
