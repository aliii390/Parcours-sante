<?php

namespace App\Entity;

use App\Repository\PriseMedicamentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PriseMedicamentRepository::class)]
class PriseMedicament
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTime $heurePrevue = null;

    #[ORM\Column]
    private ?int $nombresComprimes = null;

   

    #[ORM\ManyToOne(inversedBy: 'priseMedicaments')]
    private ?Medicament $medicament = null;

    #[ORM\Column]
    private ?bool $effectuee = false;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHeurePrevue(): ?\DateTime
    {
        return $this->heurePrevue;
    }

    public function setHeurePrevue(\DateTime $heurePrevue): static
    {
        $this->heurePrevue = $heurePrevue;

        return $this;
    }

    public function getNombresComprimes(): ?int
    {
        return $this->nombresComprimes;
    }

    public function setNombresComprimes(int $nombresComprimes): static
    {
        $this->nombresComprimes = $nombresComprimes;

        return $this;
    }

   

    public function getMedicament(): ?Medicament
    {
        return $this->medicament;
    }

    public function setMedicament(?Medicament $medicament): static
    {
        $this->medicament = $medicament;

        return $this;
    }

    public function isEffectuee(): ?bool
    {
        return $this->effectuee;
    }

    public function setEffectuee(bool $effectuee): static
    {
        $this->effectuee = $effectuee;

        return $this;
    }
}
