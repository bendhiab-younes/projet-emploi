<?php

namespace App\Entity;

use App\Repository\SemaineRepository;
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
}
