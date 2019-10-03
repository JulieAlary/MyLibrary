<?php

namespace App\Form;

use App\Entity\Author;
use App\Entity\Book;
use App\Entity\Owner;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Title', TextType::class)
            ->add('Author',EntityType::class, [
                'class' => Author::class,
                'choice_label' => 'Lastname',
                'multiple' => true
            ])
            ->add('Owner', EntityType::class, [
                'class' => Owner::class,
                'choice_label' => 'Firstname',
                'multiple' => true
            ])
            ->add('PurchasedDate', DateType::class)
            ->add('Save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }
}
