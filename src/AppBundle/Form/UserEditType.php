<?php
namespace AppBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class UserEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder , array $options )
    {
        $builder
            ->add('firstName', TextType:: class)
            ->add( 'lastName', TextType:: class)
            ->add( 'email', TextType:: class)
            ->add( 'password', TextType:: class)
            ->add( 'birthday', DateTimeType:: class)
            ->add('isAdmin', CheckboxType::class, [
                'label'    => 'Admin',
                'required' => false,
            ])
            ->add( 'save', SubmitType:: class, ['label' => 'Enregistrer'])
        ;

    }
}