<?php

namespace App\Entity;

use App\Repository\SalleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SalleRepository::class)]
class Salle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomSalle = null;

    #[ORM\Column]
    private ?bool $labo = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomSalle(): ?string
    {
        return $this->nomSalle;
    }

    public function setNomSalle(string $nomSalle): self
    {
        $this->nomSalle = $nomSalle;

        return $this;
    }

    public function isLabo(): ?bool
    {
        return $this->labo;
    }

    public function setLabo(bool $labo): self
    {
        $this->labo = $labo;

        return $this;
    }
}
