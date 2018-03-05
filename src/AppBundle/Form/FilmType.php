<?php

namespace AppBundle\Form;

use AppBundle\Entity\Cast;
use AppBundle\Entity\Category;
use AppBundle\Entity\Film;
use AppBundle\Entity\Studio;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class FilmType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class)
            ->add('description', TextareaType::class)
            ->add('Age', TextType::class)
            ->add('time', TextType::class)
            ->add('year', DateTimeType::class)
            ->add('affiche', FileType::class)
            ->add('link', TextType::class);

        $builder->add('category', EntityType::class, ['class' => Category::class, 'choice_label' => 'nameCategory']);
        $builder->add('studio', EntityType::class, ['class' => Studio::class, 'choice_label' => 'name']);
        $builder->add('casts', EntityType::class, array('class' => Cast::class, 'multiple' => true, 'choice_label' => 'nickname'));

        $builder
            ->add('save', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Film::class,

        ));
    }
}