<?php

namespace App\Entity;

use App\Repository\SymptomeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SymptomeRepository::class)]
class Symptome
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    /**
     * @var Collection<int, Journal>
     */
    #[ORM\OneToMany(targetEntity: Journal::class, mappedBy: 'symptome')]
    private Collection $journal;

    public function __construct()
    {
        $this->journal = new ArrayCollection();
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

    /**
     * @return Collection<int, Journal>
     */
    public function getJournal(): Collection
    {
        return $this->journal;
    }

    public function addJournal(Journal $journal): static
    {
        if (!$this->journal->contains($journal)) {
            $this->journal->add($journal);
            $journal->setSymptome($this);
        }

        return $this;
    }

    public function removeJournal(Journal $journal): static
    {
        if ($this->journal->removeElement($journal)) {
            // set the owning side to null (unless already changed)
            if ($journal->getSymptome() === $this) {
                $journal->setSymptome(null);
            }
        }

        return $this;
    }
}
