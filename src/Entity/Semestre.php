<?php

namespace App\Entity;

use App\Repository\SemestreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SemestreRepository::class)]
class Semestre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $numSemestre = null;

    #[ORM\OneToMany(mappedBy: 'semestre', targetEntity: Semaine::class, orphanRemoval: true)]
    private Collection $semaines;

    public function __construct()
    {
        $this->semaines = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumSemestre(): ?int
    {
        return $this->numSemestre;
    }

    public function setNumSemestre(int $numSemestre): self
    {
        $this->numSemestre = $numSemestre;

        return $this;
    }

    /**
     * @return Collection<int, Semaine>
     */
    public function getSemaines(): Collection
    {
        return $this->semaines;
    }

    public function addSemaine(Semaine $semaine): self
    {
        if (!$this->semaines->contains($semaine)) {
            $this->semaines->add($semaine);
            $semaine->setSemestre($this);
        }

        return $this;
    }

    public function removeSemaine(Semaine $semaine): self
    {
        if ($this->semaines->removeElement($semaine)) {
            // set the owning side to null (unless already changed)
            if ($semaine->getSemestre() === $this) {
                $semaine->setSemestre(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return "S$this->numSemestre";
    }
}
