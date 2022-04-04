<?php

namespace GestionBundle\Form\segVial\documentacion;

use GestionBundle\Entity\segVial\documentacion\ProveedorExterno;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProveedorExternoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cuit')
            ->add('razonSocial')
            ->add('active')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            //'data_class' => ProveedorExterno::class,
            'inherit_data' => true
        ]);
    }
}
