<?php

namespace App\Entity;

use App\Repository\JourRepository;
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
}
