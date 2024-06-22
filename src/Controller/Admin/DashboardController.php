<?php

namespace App\Controller\Admin;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/admin.html.twig');
    }

    #[Route('/admin/books', name:'admin_books')]
    public function crudBooks(AdminUrlGenerator $adminUrlGenerator): Response
    {
    $url = $adminUrlGenerator
    ->setController(BooksCrudController::class)
    ->generateUrl();

    return $this->redirect($url);
    }

    #[Route('/admin/user', name:'admin_user')]
    public function crudUser(AdminUrlGenerator $adminUrlGenerator): Response
    {
    $url = $adminUrlGenerator
    ->setController(UserCrudController::class)
    ->generateUrl();

    return $this->redirect($url);
    }

    #[Route('/admin/critic', name:'admin_critic')]
    public function crudCritic(AdminUrlGenerator $adminUrlGenerator): Response
    {
    $url = $adminUrlGenerator
    ->setController(CriticCrudController::class)
    ->generateUrl();

    return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Symfony Archimboldi');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
