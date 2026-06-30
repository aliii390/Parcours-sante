<?php

namespace App\Entity;

use App\Repository\NotifMedicamentRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NotifMedicamentRepository::class)]
class NotifMedicament
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTime $heure_prevue = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $date_prise = null;

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

    public function getDatePrise(): ?\DateTime
    {
        return $this->date_prise;
    }

    public function setDatePrise(\DateTime $date_prise): static
    {
        $this->date_prise = $date_prise;

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
