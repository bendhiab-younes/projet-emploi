<?php

namespace App\DataFixtures;

use App\Entity\Bloc;
use App\Entity\Salle;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class SalleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $b=new Bloc();
        $b->setNomBloc("C");
        $manager->persist($b);
        for($i=1;$i<6;$i++)
        {
            $Salle=new Salle();
            $Salle->setNomSalle("00$i");
            $Salle->setLabo(false);
            $Salle->setBloc($b);
            $manager->persist($Salle);
        }
        $b2=new Bloc();
        $b2->setNomBloc("LI");
        $manager->persist($b2);
        for($i=6;$i<11;$i++)
        {
            $Salle=new Salle();
            $Salle->setNomSalle("1.$i");
            $Salle->setLabo(true);
            $Salle->setBloc($b2);
            $manager->persist($Salle);
        }

        $manager->flush();
    }
}
