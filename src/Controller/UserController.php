<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\NewUserType;

class UserController extends AbstractController
{
    #[Route('/register', name: 'register')]
    public function register(
        Request $request,
        EntityManagerInterface $em,
    ): Response {
        $register = new User();
        $form = $this->createForm(NewUserType::class, $register);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($register);
            $em->flush();

            return $this->redirectToRoute('index/index.html.twig');
        }

        return $this->render('user/register.html.twig', [
            'subscribe' => $form
        ]);
    }
}
