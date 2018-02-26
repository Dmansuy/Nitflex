<?php
namespace AppBundle\Form;

use AppBundle\Entity\Category;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class FilmType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder , array $options )
    {
        $builder
        ->add('title', TextType:: class)
        ->add( 'description', TextareaType:: class)
        ->add( 'year', DateTimeType:: class)
        ->add('affiche', FileType::class)
        ->add( 'category', EntityType:: class, [
            'class' => Category:: class,
            'choice_label' => 'nameCategory'
        ])
        ->add( 'save', SubmitType:: class, ['label' => 'Ajouter un projet'])
        ;

    }
}