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
        for ($i = 0; $i < 10; $i++) {
         $matiere = new Matiere();
         $matiere->setNomMatiere("matiere"."$i");
         $matiere->setTp(rand(0,1));
         $manager->persist($matiere);
        }
        $manager->flush();
    }
}
class ClasseFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 10; $i++) {
         $classe = new Classe();
         $classe->setNomClasse("Classe".$i);
         $manager->persist($classe);
        }
        $manager->flush();
    }
}
