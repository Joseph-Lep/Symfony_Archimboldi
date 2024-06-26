<?php

namespace App\Controller\Admin;

use App\Entity\Critic;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CriticCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Critic::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title'),
            TextEditorField::new('content'),
            DateTimeField::new('date_of_creation'),
            DateTimeField::new('date_of_last_update')
        ];
    }
}
