<?php

namespace App\Entity;

use App\Repository\SemestreRepository;
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
}
