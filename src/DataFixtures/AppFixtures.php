<?php

namespace App\DataFixtures;

use App\Entity\Horaire;
use App\Entity\Jour;
use App\Entity\Semaine;
use App\Entity\Semestre;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $sem=new Semestre();
        $sem->setNumSemestre(1);
        $manager->persist($sem);
        for ($i = 1, $days=["Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi"]; $i <13; $i++) {
            $semaine = new Semaine();
            $semaine->setNumSemaine($i);
            $semaine->setSemestre($sem);
            $manager->persist($semaine);
            for ($j=0; $j<sizeof($days); $j++)
            {
                $jour=new Jour();
                $jour->setNomJour($days[$j]);
                $jour->setSemaine($semaine);
                $manager->persist($jour);
            }
        }
    
        $sem=new Semestre();
        $sem->setNumSemestre(2);
        $manager->persist($sem);
        for ($i = 14, $days=["Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi"]; $i <29; $i++) {
            $semaine = new Semaine();
            $semaine->setNumSemaine($i);
            $semaine->setSemestre($sem);
            $manager->persist($semaine);
            for ($j=0; $j<sizeof($days); $j++)
            {
                $jour=new Jour();
                $jour->setNomJour($days[$j]);
                $jour->setSemaine($semaine);
                $manager->persist($jour);
            }
        }
        

        $h1=new Horaire();
        $h1->setHeureDebut("8:30");
        $h1->setHeureFin("10:00");
        $manager->persist($h1);

        $h2=new Horaire();
        $h2->setHeureDebut("10:05");
        $h2->setHeureFin("11:35");
        $manager->persist($h2);

        $h3=new Horaire();
        $h3->setHeureDebut("11:40");
        $h3->setHeureFin("13:10");
        $manager->persist($h3);

        $h4=new Horaire();
        $h4->setHeureDebut("13:15");
        $h4->setHeureFin("14:45");
        $manager->persist($h4);
        
        $h5=new Horaire();
        $h5->setHeureDebut("14:50");
        $h5->setHeureFin("16:20");
        $manager->persist($h5);

        $h6=new Horaire();
        $h6->setHeureDebut("16:25");
        $h6->setHeureFin("17:55");
        $manager->persist($h6);

        $manager->flush();
    }
}