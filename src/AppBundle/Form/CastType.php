<?php

namespace AppBundle\Form;

use AppBundle\Entity\Cast;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;


class CastType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', TextType:: class)
            ->add('lastName', TextType:: class)
            ->add('nickname', TextType:: class)
            ->add('save', SubmitType:: class, ['label' => 'Ajouter un projet']);

        $builder->add('films', EntityType::class, ['class' => Cast::class, 'choice_label' => 'label']);
    }
}