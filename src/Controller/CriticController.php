<?php

namespace App\Controller;

use App\Entity\Critic;
use App\Form\CriticType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CriticController extends AbstractController
{
    #[Route('book/critic', name: 'critic')]
    public function index(): Response
    {
        return $this->render('critic/index.html.twig', [
            'controller_name' => 'CriticController',
        ]);
    }
}
