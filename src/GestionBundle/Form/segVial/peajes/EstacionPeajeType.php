<?php

namespace GestionBundle\Form\segVial\peajes;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class EstacionPeajeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $user = $options['user'];
        $builder->add('nombre')
                ->add('latitud')
                ->add('longitud')
                ->add('estructura', EntityType::class,
                     [
                        'class' => 'AppBundle\Entity\Estructura',
                        'choices' => $user->getEstructuras()
                     ])
                ->add('guardar', SubmitType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
                        'data_class' => 'GestionBundle\Entity\segVial\peajes\EstacionPeaje'
                    ))
                ->setRequired('user');

    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'gestionbundle_segvial_peajes_estacionpeaje';
    }


}
