<?php
namespace AppBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder , array $options )
    {
        $builder
        ->add('firstName', TextType:: class)
        ->add( 'lastName', TextType:: class)
        ->add( 'email', TextType:: class)
        ->add( 'password', TextType:: class)
        ->add( 'birthday', DateTimeType:: class)
        ->add( 'save', SubmitType:: class, ['label' => 'S\'inscrire'])
        ;

    }
}