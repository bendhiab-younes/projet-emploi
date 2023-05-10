<?php

namespace App\Entity;

use App\Repository\JourRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JourRepository::class)]
class Jour
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $nomJour = null;

    #[ORM\ManyToOne(inversedBy: 'jours')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Semaine $semaine = null;

    #[ORM\OneToMany(mappedBy: 'jour', targetEntity: Seance::class, orphanRemoval: true)]
    private Collection $seances;

    public function __construct()
    {
        $this->seances = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomJour(): ?\DateTimeInterface
    {
        return $this->nomJour;
    }

    public function setNomJour(\DateTimeInterface $nomJour): self
    {
        $this->nomJour = $nomJour;

        return $this;
    }

    public function getSemaine(): ?Semaine
    {
        return $this->semaine;
    }

    public function setSemaine(?Semaine $semaine): self
    {
        $this->semaine = $semaine;

        return $this;
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
            $seance->setJour($this);
        }

        return $this;
    }

    public function removeSeance(Seance $seance): self
    {
        if ($this->seances->removeElement($seance)) {
            // set the owning side to null (unless already changed)
            if ($seance->getJour() === $this) {
                $seance->setJour(null);
            }
        }

        return $this;
    }
}
