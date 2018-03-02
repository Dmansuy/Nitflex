<?php
namespace AppBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class ImportType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder , array $options )
    {
        $builder
            ->add('csv', FileType::class)
            ->add( 'save', SubmitType:: class, ['label' => 'Importer'])
        ;

    }
}