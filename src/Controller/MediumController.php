<?php

namespace App\Controller;

use App\Entity\Medium;
use App\Repository\MediumRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MediumController extends AbstractController
{
    #[Route('/medium', name: 'medium')]
    public function index(MediumRepository $mediums): Response
    {
        $mediums = $mediums->findAll();
        return $this->render('medium/medium.html.twig', [
            'mediums' => $mediums,
        ]);
    }
        #[Route('/medium/{id}', name: 'medium_books')]
        public function item(MediumRepository $mediumRepository, int $id): Response
        {
            $medium = $mediumRepository->find($id);
    
            if (!$medium) {
                throw $this->createNotFoundException('Aucun Medium associé trouvé' . $id);
            }
    
            return $this->render('medium/medium_item.html.twig', [
                'medium' => $medium,
                'books' => $medium->getBooksId(),
            ]);
        }
}
