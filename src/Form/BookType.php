<?php

namespace App\Form;

use App\Entity\Books;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class BookType extends AbstractType
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
            ->add('ISBN', null, [
                'help' => 'Un code souvent à proximité du code barre. A 13 ou 11 chiffres. Commencant très souvent par 978',
            ])
            ->add('serial')
            ->add('cover')
            ->add('backcover', TextareaType::class, [
                'attr' => ['class' => 'tinymce'],
            ])
            ->add('nbr_of_pages');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'sanitize_html' => true,
            'data_class' => Books::class,
        ]);
    }
}
