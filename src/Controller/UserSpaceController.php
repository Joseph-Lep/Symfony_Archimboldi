<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class UserSpaceController extends AbstractController
{
    #[Route('/user', name: 'user_space')]
    public function index(): Response
    {
        return $this->render('user_space/userspace.html.twig', [
            'controller_name' => 'UserSpaceController',
        ]);
    }
}
