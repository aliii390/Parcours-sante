<?php

namespace App\Entity;

use App\Repository\MedicamentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MedicamentRepository::class)]
class Medicament
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $dosage = null;


    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $date_debut = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $date_fin = null;

    #[ORM\ManyToOne(inversedBy: 'medicaments')]
    private ?User $user = null;

    /**
     * @var Collection<int, PriseMedicament>
     */
    #[ORM\OneToMany(targetEntity: PriseMedicament::class, mappedBy: 'medicament')]
    private Collection $priseMedicaments;

    public function __construct()
    {
        $this->priseMedicaments = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDosage(): ?string
    {
        return $this->dosage;
    }

    public function setDosage(string $dosage): static
    {
        $this->dosage = $dosage;

        return $this;
    }

    public function isActif(): bool
{
    $aujourdhui = new \DateTime('today');

    if ($this->date_debut !== null && $this->date_debut > $aujourdhui) {
        return false; // pas encore commencé
    }

    if ($this->date_fin !== null && $this->date_fin < $aujourdhui) {
        return false; // terminé
    }

    return true;
}

    

    public function getDateDebut(): ?\DateTime
    {
        return $this->date_debut;
    }

    public function setDateDebut(\DateTime $date_debut): static
    {
        $this->date_debut = $date_debut;

        return $this;
    }

    public function getDateFin(): ?\DateTime
    {
        return $this->date_fin;
    }

    public function setDateFin(\DateTime $date_fin): static
    {
        $this->date_fin = $date_fin;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection<int, PriseMedicament>
     */
    public function getPriseMedicaments(): Collection
    {
        return $this->priseMedicaments;
    }

    public function addPriseMedicament(PriseMedicament $priseMedicament): static
    {
        if (!$this->priseMedicaments->contains($priseMedicament)) {
            $this->priseMedicaments->add($priseMedicament);
            $priseMedicament->setMedicament($this);
        }

        return $this;
    }

    public function removePriseMedicament(PriseMedicament $priseMedicament): static
    {
        if ($this->priseMedicaments->removeElement($priseMedicament)) {
            // set the owning side to null (unless already changed)
            if ($priseMedicament->getMedicament() === $this) {
                $priseMedicament->setMedicament(null);
            }
        }

        return $this;
    }


}
