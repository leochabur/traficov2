<?php

namespace GestionBundle\Form\segVial\opciones;

use GestionBundle\Entity\segVial\documentacion\opciones\TipoDestinoSeguro;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class TipoDestinoSeguroType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('destino')->add('active')->add('guardar', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TipoDestinoSeguro::class,
        ]);
    }
}
