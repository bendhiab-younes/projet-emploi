<?php

namespace App\DataFixtures;

use App\Entity\Classe;
use App\Entity\Matiere;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MatiereFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0, $matieres = ["ALGO", "BD", "UML", "Python", "Dev-Web", "Fondaments de Resaux", "Java", "SQL", "Rust", "Symfony", "Angular"]; $i < 10; $i++) {
            $matiere = new Matiere();
            $matiere->setNomMatiere($matieres[$i]);
            $matiere->setTp(rand(0, 1));
            $manager->persist($matiere);
        }


        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                $specialites = ["DSI", "RSI", "MDW", "SEM"];
                $classe = new Classe();
                $classe->setNomClasse($specialites[$j] . (" ".$i + 1) . "." . ($j + 1));
                $manager->persist($classe);
            }
        }
        $manager->flush();
    }
}
