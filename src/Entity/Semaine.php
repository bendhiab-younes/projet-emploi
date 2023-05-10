<?php

namespace App\Entity;

use App\Repository\SemaineRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SemaineRepository::class)]
class Semaine
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $numSemaine = null;

    #[ORM\ManyToOne(inversedBy: 'semaines')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Semestre $semestre = null;

    #[ORM\OneToMany(mappedBy: 'semaine', targetEntity: Jour::class, orphanRemoval: true)]
    private Collection $jours;

    public function __construct()
    {
        $this->jours = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumSemaine(): ?int
    {
        return $this->numSemaine;
    }

    public function setNumSemaine(int $numSemaine): self
    {
        $this->numSemaine = $numSemaine;

        return $this;
    }

    public function getSemestre(): ?Semestre
    {
        return $this->semestre;
    }

    public function setSemestre(?Semestre $semestre): self
    {
        $this->semestre = $semestre;

        return $this;
    }

    /**
     * @return Collection<int, Jour>
     */
    public function getJours(): Collection
    {
        return $this->jours;
    }

    public function addJour(Jour $jour): self
    {
        if (!$this->jours->contains($jour)) {
            $this->jours->add($jour);
            $jour->setSemaine($this);
        }

        return $this;
    }

    public function removeJour(Jour $jour): self
    {
        if ($this->jours->removeElement($jour)) {
            // set the owning side to null (unless already changed)
            if ($jour->getSemaine() === $this) {
                $jour->setSemaine(null);
            }
        }

        return $this;
    }
}
