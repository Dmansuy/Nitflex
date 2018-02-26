<?php
namespace AppBundle\Form;

use AppBundle\Entity\Category;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class CastType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder , array $options )
    {
        $builder
        ->add('firstName', TextType:: class)
        ->add( 'lastName', TextType:: class)
        ->add( 'nickname', TextType:: class)
        ->add( 'save', SubmitType:: class, ['label' => 'Ajouter un projet'])
        ;

    }
}