<?php

namespace AppBundle\Form;

use AppBundle\Entity\Category;
use AppBundle\Entity\Film;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;


class FilmType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType:: class)
            ->add('description', TextareaType:: class)
            ->add('year', DateTimeType:: class)
            ->add('affiche', FileType::class)
            ->add('category', EntityType:: class, [
                'class' => Category:: class,
                'choice_label' => 'nameCategory'
            ])
            ->add('save', SubmitType:: class, ['label' => 'Ajouter un projet']);

        $builder->add('studios', EntityType::class, ['class' => Film::class, 'choice_label' => 'label']);
        $builder->add('casts', EntityType::class, ['class' => Film::class, 'choice_label' => 'label']);
    }
}