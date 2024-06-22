<?php

namespace App\Controller;

use App\Entity\Books;
use App\Repository\BooksRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BookListController extends AbstractController
{
    #[Route('/book', name: 'book')]
    public function index(BooksRepository $booksRepository): Response
    {
        $book = $booksRepository->findAll();
        return $this->render('book_list/booklist.html.twig', [
        'books' => $book,
        ]);
    }

    #[Route('/book/{id}', name: 'book_list')]
    public function item(Books $books): Response
    {
        return $this->render('book_list/booklist_item.html.twig', ['book' => $books]);
    }
}
