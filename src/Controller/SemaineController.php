<?php

namespace App\Controller;

use App\Entity\Semaine;
use App\Form\SemaineType;
use App\Repository\SemaineRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/semaine')]
class SemaineController extends AbstractController
{
    #[Route('/', name: 'app_semaine_index', methods: ['GET'])]
    public function index(SemaineRepository $semaineRepository): Response
    {
        return $this->render('semaine/index.html.twig', [
            'semaines' => $semaineRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_semaine_new', methods: ['GET', 'POST'])]
    public function new(Request $request, SemaineRepository $semaineRepository): Response
    {
        $semaine = new Semaine();
        $form = $this->createForm(SemaineType::class, $semaine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $semaineRepository->save($semaine, true);

            return $this->redirectToRoute('app_semaine_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('semaine/new.html.twig', [
            'semaine' => $semaine,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_semaine_show', methods: ['GET'])]
    public function show(Semaine $semaine): Response
    {
        return $this->render('semaine/show.html.twig', [
            'semaine' => $semaine,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_semaine_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Semaine $semaine, SemaineRepository $semaineRepository): Response
    {
        $form = $this->createForm(SemaineType::class, $semaine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $semaineRepository->save($semaine, true);

            return $this->redirectToRoute('app_semaine_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('semaine/edit.html.twig', [
            'semaine' => $semaine,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_semaine_delete', methods: ['POST'])]
    public function delete(Request $request, Semaine $semaine, SemaineRepository $semaineRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$semaine->getId(), $request->request->get('_token'))) {
            $semaineRepository->remove($semaine, true);
        }

        return $this->redirectToRoute('app_semaine_index', [], Response::HTTP_SEE_OTHER);
    }
}
