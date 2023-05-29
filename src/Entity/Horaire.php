<?php

namespace App\Entity;

use App\Repository\HoraireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HoraireRepository::class)]
class Horaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $heureDebut = null;

    #[ORM\Column(length: 255)]
    private ?string $heureFin = null;

    #[ORM\OneToMany(mappedBy: 'horaire', targetEntity: Seance::class)]
    private Collection $seances;

    public function __construct()
    {
        $this->seances = new ArrayCollection();
    }

 
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHeureDebut(): ?string
    {
        return $this->heureDebut;
    }

    public function setHeureDebut(string $heureDebut): self
    {
        $this->heureDebut = $heureDebut;

        return $this;
    }

    public function getHeureFin(): ?string
    {
        return $this->heureFin;
    }

    public function setHeureFin(string $heureFin): self
    {
        $this->heureFin = $heureFin;

        return $this;
    }

    
    
    public function __toString()
    {
        return "$this->heureDebut -> $this->heureFin  ";
    }

    /**
     * @return Collection<int, Seance>
     */
    public function getSeances(): Collection
    {
        return $this->seances;
    }

    public function addSeance(Seance $seance): self
    {
        if (!$this->seances->contains($seance)) {
            $this->seances->add($seance);
            $seance->setHoraire($this);
        }

        return $this;
    }

    public function removeSeance(Seance $seance): self
    {
        if ($this->seances->removeElement($seance)) {
            // set the owning side to null (unless already changed)
            if ($seance->getHoraire() === $this) {
                $seance->setHoraire(null);
            }
        }

        return $this;
    }
}


/*
   #[ORM\OneToMany(mappedBy: 'horaires', targetEntity: Seance::class)]
    private Collection $seances;

    public function __construct()
    {
        $this->seances = new ArrayCollection();
    }


    /**
     * @return Collection<int, Seance>
     */
    /*
    public function getSeances(): Collection
    {
        return $this->seances;
    }

    public function addSeance(Seance $seance): self
    {
        if (!$this->seances->contains($seance)) {
            $this->seances->add($seance);
            $seance->setHoraires($this);
        }

        return $this;
    }

    public function removeSeance(Seance $seance): self
    {
        if ($this->seances->removeElement($seance)) {
            // set the owning side to null (unless already changed)
            if ($seance->getHoraires() === $this) {
                $seance->setHoraires(null);
            }
        }

        return $this;
    }
    */