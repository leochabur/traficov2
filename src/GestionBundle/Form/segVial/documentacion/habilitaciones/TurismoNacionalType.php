<?php

namespace GestionBundle\Form\segVial\documentacion\habilitaciones;

use GestionBundle\Entity\segVial\documentacion\habilitaciones\TurismoNacional;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use GestionBundle\Entity\segVial\documentacion\OrganismoEstatal;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use GestionBundle\Form\segVial\documentacion\Vencimiento;
use GestionBundle\Form\segVial\documentacion\VencimientoType;


class TurismoNacionalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('vto', VencimientoType::class, ['data_class' => TurismoNacional::class])
            ->add('proveedor',EntityType::class,
                  [
                    'class' => OrganismoEstatal::class
                  ])
            ->add('codigoHabilitacion')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TurismoNacional::class,
        ]);
    }
}
