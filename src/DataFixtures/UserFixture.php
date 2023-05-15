<?php

namespace App\DataFixtures;

use App\Entity\Administratif;
use App\Entity\Enseignant;
use App\Entity\Etudiant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $list =["MEC","INFO","ELECT","MANAG"];
        for ($i=0; $i<10; $i++){

            $etud = new Etudiant();
            $etud->setCIN(rand(10000,99999));
            $etud->setNom("nom".$i);
            $etud->setPrenom("prenom".$i);
            $etud->setEmail("email".$i."@gmail.com");
            $etud->setPassword("password".$i);
            $etud->setDepartement($list[2]);
            $manager->persist($etud);
            }
            $spec=["back","front","sec"];
            for ($i=11; $i<20; $i++){

                $ens = new Enseignant();
                $ens->setCIN(rand(10000,99999));
                $ens->setNom("nom".$i);
                $ens->setPrenom("prenom".$i);
                $ens->setEmail("email".$i."@gmail.com");
                $ens->setPassword("password".$i);
                $ens->setDepartement($list[2]);
                $ens->setSpecialite($spec[2]);
                $manager->persist($ens);
                }

                $adm = new Administratif();
                $adm->setCIN(rand(10000,99999));
                $adm->setNom("med");
                $adm->setPrenom("salah");
                $adm->setEmail("admin007@gmail.com");
                $adm->setPassword("password007");
                $manager->persist($adm);
                $manager->flush();
    }
}





