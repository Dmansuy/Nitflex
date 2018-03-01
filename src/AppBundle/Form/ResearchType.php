<?php
/**
 * Created by PhpStorm.
 * User: florian
 * Date: 28/02/18
 * Time: 16:43
 */

namespace AppBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class ResearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder , array $options )
    {
        $builder
            ->add('search', SearchType:: class)
            ->add( 'save', SubmitType:: class, ['label' => 'Rechercher'])
        ;

    }
}