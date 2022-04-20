<?php

namespace GestionBundle\Form\segVial\opciones;

use GestionBundle\Entity\segVial\opciones\UbicacionMotor;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class UbicacionMotorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ubicacion')
            ->add('activo')
            ->add('guardar', SubmitType::class);
        
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => UbicacionMotor::class,
        ]);
    }
}
