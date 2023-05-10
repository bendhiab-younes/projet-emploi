<?php

namespace App\Entity;

use App\Repository\BlocRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BlocRepository::class)]
class Bloc
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $NomBloc = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomBloc(): ?string
    {
        return $this->NomBloc;
    }

    public function setNomBloc(string $NomBloc): self
    {
        $this->NomBloc = $NomBloc;

        return $this;
    }
}
