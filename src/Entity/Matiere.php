<?php

namespace App\Entity;

use App\Repository\MatiereRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MatiereRepository::class)]
class Matiere
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomMatiere = null;

    #[ORM\Column]
    private ?bool $tp = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomMatiere(): ?string
    {
        return $this->nomMatiere;
    }

    public function setNomMatiere(string $nomMatiere): self
    {
        $this->nomMatiere = $nomMatiere;

        return $this;
    }

    public function isTp(): ?bool
    {
        return $this->tp;
    }

    public function setTp(bool $tp): self
    {
        $this->tp = $tp;

        return $this;
    }
}
