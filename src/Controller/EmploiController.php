<?php

namespace App\Controller;

use App\Repository\JourRepository;
use App\Repository\SeanceRepository;
use App\Repository\HoraireRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EmploiController extends AbstractController
{
    #[Route('/emploi', name: 'app_emploi')]
    public function index(JourRepository $jourRepository, SeanceRepository $seanceRepository, HoraireRepository $horaireRepository): Response
    {
        return $this->render('emploi/index.html.twig', [
            'jours' => $jourRepository->findAll(),
            'horaires' => $horaireRepository->findAll(),
            'seances' => $seanceRepository->findAll(),
        ]);
    }
}
