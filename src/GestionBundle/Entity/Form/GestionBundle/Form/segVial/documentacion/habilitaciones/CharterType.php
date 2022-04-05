<?php

namespace GestionBundle\Entity\Form\GestionBundle\Form\segVial\documentacion\habilitaciones;

use GestionBundle\Entity\segVial\documentacion\habilitaciones\Charter;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CharterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('emision')
            ->add('vigenciaDesde')
            ->add('vigenciaHasta')
            ->add('activo')
            ->add('cantCuotas')
            ->add('codigoHabilitacion')
            ->add('renuevaVencimiento')
            ->add('proveedor')
            ->add('tipoVencimiento')
            ->add('unidades')
            ->add('origen')
            ->add('destino')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Charter::class,
        ]);
    }
}
