<?php

namespace GestionBundle\Form\segVial\documentacion;

use GestionBundle\Entity\segVial\documentacion\CompaniaSeguro;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CompaniaSeguroType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cuit')
            ->add('razonSocial')
            ->add('active')
            ->add('cdigoSsn')
            ->add('guardar', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CompaniaSeguro::class,
        ]);
    }
}
