<?php

namespace App\Controller;

use App\Repository\JourRepository;
use App\Repository\ClasseRepository;
use App\Repository\SeanceRepository;
use App\Repository\HoraireRepository;
use App\Repository\MatiereRepository;
use App\Repository\SemaineRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EmploiController extends AbstractController
{
    #[Route('/emploi', name: 'app_emploi')]
    public function index(ClasseRepository $classeRepository, JourRepository $jourRepository, SeanceRepository $seanceRepository, HoraireRepository $horaireRepository, SemaineRepository $semaineRepository): Response
    {
        return $this->render('emploi/index.html.twig', [
            'jours' => $jourRepository->findAll(),
            'horaires' => $horaireRepository->findAll(),
            'seances' => $seanceRepository->findAll(),
            'semaines' => $semaineRepository->findAll(),
            'classes' => $classeRepository->findAll(),
        ]);
    }

    #[Route('/emploi/ens/{id}', name: 'app_emploi_etudiant',methods: ['GET'])]
    public function indexetudient($id,ClasseRepository $classeRepository, JourRepository $jourRepository, SeanceRepository $seanceRepository, HoraireRepository $horaireRepository, SemaineRepository $semaineRepository): Response
    {

        $classe = $classeRepository->find($id);
        
        return $this->render('emploi/index_etudiant.html.twig', [
            'jours' => $jourRepository->findAll(),
            'horaires' => $horaireRepository->findAll(),
            'seances' => $seanceRepository->findAll(),
            'semaines' => $semaineRepository->findAll(),
            'classe' => $classe,
           
        ]);
    }



    #[Route('/emploi/{id}', name: 'app_emploi_enseignant',methods: ['GET'])]
    public function indexenseignant($id,MatiereRepository $matiereRepository,MatiereRepository $matiererepository,ClasseRepository $classeRepository, JourRepository $jourRepository, SeanceRepository $seanceRepository, HoraireRepository $horaireRepository, SemaineRepository $semaineRepository): Response
    {
        $mats = new ArrayCollection();
        $matiere = $matiereRepository->findAll();
        foreach($matiere as $mat ){
            if(!$mat->getUser() == null and $mat->getUser()->getId() == $id){
                $mats->add($mat);
            }

        }
        return $this->render('emploi/index_enseignant.html.twig', [
            'matiers' => $matiererepository->findAll(),
            'jours' => $jourRepository->findAll(),
            'horaires' => $horaireRepository->findAll(),
            'seances' => $seanceRepository->findAll(),
            'semaines' => $semaineRepository->findAll(),
            'mats' => $mats,
            
        ]);
    }
}
