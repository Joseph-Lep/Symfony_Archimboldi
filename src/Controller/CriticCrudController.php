<?php

namespace App\Controller;

use App\Entity\Critic;
use App\Form\CriticType;
use App\Repository\CriticRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/critic/crud')]
class CriticCrudController extends AbstractController
{
    #[Route('/', name: 'app_critic_crud_index', methods: ['GET'])]
    public function index(CriticRepository $criticRepository): Response
    {
        return $this->render('critic_crud/index.html.twig', [
            'critics' => $criticRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_critic_crud_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $critic = new Critic();
        $form = $this->createForm(CriticType::class, $critic);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($critic);
            $entityManager->flush();

            return $this->redirectToRoute('app_critic_crud_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('critic_crud/new.html.twig', [
            'critic' => $critic,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_critic_crud_show', methods: ['GET'])]
    public function show(Critic $critic): Response
    {
        return $this->render('critic_crud/show.html.twig', [
            'critic' => $critic,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_critic_crud_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Critic $critic, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CriticType::class, $critic);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_critic_crud_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('critic_crud/edit.html.twig', [
            'critic' => $critic,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_critic_crud_delete', methods: ['POST'])]
    public function delete(Request $request, Critic $critic, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$critic->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($critic);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_critic_crud_index', [], Response::HTTP_SEE_OTHER);
    }
}
