<?php

namespace GestionBundle\Form\segVial\peajes;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class TarifaPeajeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('tarifaNormal')
                ->add('tarifaTelepase')
                ->add('tipoUnidad')
                ->add('estacionPeaje',
                       EntityType::class,
                      [
                        'class' => 'GestionBundle\segVial\peajes\EstacionPeaje',
                        'choices' =>[$options['estPeaje']]
                      ])
                 ->add('guardar', SubmitType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GestionBundle\Entity\segVial\peajes\TarifaPeaje'
        ))
        ->setRequired('estacion')
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'gestionbundle_segvial_peajes_tarifapeaje';
    }


}
