<?php

namespace App\Entity;

use App\Repository\EnseignantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EnseignantRepository::class)]
class Enseignant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $specialite = null;

    #[ORM\Column(length: 255)]
    private ?string $departement = null;

    #[ORM\ManyToMany(targetEntity: Matiere::class, inversedBy: 'enseignants')]
    private Collection $matiers;

    public function __construct()
    {
        $this->matiers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSpecialite(): ?string
    {
        return $this->specialite;
    }

    public function setSpecialite(string $specialite): self
    {
        $this->specialite = $specialite;

        return $this;
    }

    public function getDepartement(): ?string
    {
        return $this->departement;
    }

    public function setDepartement(string $departement): self
    {
        $this->departement = $departement;

        return $this;
    }

    /**
     * @return Collection<int, Matiere>
     */
    public function getMatiers(): Collection
    {
        return $this->matiers;
    }

    public function addMatier(Matiere $matier): self
    {
        if (!$this->matiers->contains($matier)) {
            $this->matiers->add($matier);
        }

        return $this;
    }

    public function removeMatier(Matiere $matier): self
    {
        $this->matiers->removeElement($matier);

        return $this;
    }
}
