<?php

namespace App\Controller;

use App\Entity\Books;
use App\Form\BookType;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BookListController extends AbstractController
{
    #[Route('/book', name: 'book')]
    public function index(): Response
    {
        return $this->render('book_list/booklist.html.twig', [
            'controller_name' => 'BookListController',
        ]);
    }

    #[Route('/books/new', name: 'book_new')]
    public function new(Request $request, EntityManager $em): Response
    {
        $book = new Books();
        $form = $this->createForm(BookType::class, $book);
        $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
        $em->persist($book);
        $em->flush();

        $this->addFlash('Success', 'Le livre a bien été ajouté');
        return $this->redirectToRoute('book_list/booklist/html/twig');
    }

    return $this->render('book_list/booklist.html.twig', [
        'articleForm' => $form
    ]);

}
}