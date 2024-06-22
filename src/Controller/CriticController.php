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
}
