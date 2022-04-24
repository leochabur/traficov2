<?php

namespace GestionBundle\Form\segVial\opciones;

use GestionBundle\Entity\segVial\documentacion\PlantaVerificacion;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class PlantaVerificacionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('razonSocial')
            ->add('active')
            ->add('juisdiccion', ChoiceType::class, [
                                                        'choices'  => [
                                                                            'Provincial' => 'PRO',
                                                                            'Nacional' => 'NAC'
                                                                       ],
                                                    ])
            ->add('guardar', SubmitType::class);
        
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PlantaVerificacion::class,
        ]);
    }
}
