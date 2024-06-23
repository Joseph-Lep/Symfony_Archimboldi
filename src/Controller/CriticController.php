<?php

namespace App\Controller;

use App\Entity\Critic;
use App\Form\CriticType;
use App\Repository\CriticRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class CriticController extends AbstractController
{
    #[Route('/critic', name: 'critic')]
    public function index(CriticRepository $criticRepository): Response
    {
        $critic = $criticRepository->findAll();
        return $this->render('critic/critic.html.twig', [
        'critics' => $critic,
        ]);
    }

    #[Route('/critic/{id}/edit', name: 'post_edit')]
    public function edit(Request $request, Critic $critic): Response
    {
        if (!$this->isGranted('edit', $critic)) {
            throw new AccessDeniedException('You do not have permission to edit this post.');
        }
        return $this->render('critic_crud/edit.html.twig', [
            'critics' => $critic,
            ]);
}
}