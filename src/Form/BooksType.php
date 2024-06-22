<?php

namespace App\Form;

use App\Entity\Books;
use App\Entity\Medium;
use Doctrine\DBAL\Query\Limit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class BooksType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('author')
            ->add('publisher')
            ->add('date_of_first_publish', null, [
                'widget' => 'single_text',
            ])
            ->add('ISBN')
            ->add('serial')
            ->add('cover')
            ->add('backcover', TextareaType::class)
            ->add('nbr_of_pages')
            ->add('medium', EntityType::class, [
                'class' => Medium::class,
                'choice_label' => 'name',
            ])
            ->add('Valider', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Books::class,
        ]);
    }
}
