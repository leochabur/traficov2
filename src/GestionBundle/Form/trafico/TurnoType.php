<?php

namespace GestionBundle\Form\trafico;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use GestionBundle\Entity\trafico\Servicio;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class TurnoType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('horaInicial', TimeType::class, [
                        'widget' => 'single_text',
                    ])
                ->add('horaFinal', TimeType::class, [
                        'widget' => 'single_text',
                    ])
                ->add('kmRecorrido')
                ->add('duracion', TimeType::class, [
                        'widget' => 'single_text',
                    ])
                ->add('numeroPaxSolicitado')
                ->add('servicio', 
                      EntityType::class,                       
                      ['class' => Servicio::class,
                       'choices' => [$options['servicio']]])
                ->add('turnoCliente')
                ->add('frecuencias')
                ->add('antiguedad', 
                      ChoiceType::class, [
                      'choices'  => [
                            'No Aplica' => 0,
                            1 => 1,
                            2 => 2,
                            3 => 3,
                            4 => 4,
                            5 => 5,
                            6 => 5,
                            7 => 7,
                            8 => 8,
                            9 => 9,
                            10 => 10,
                            11 => 11,
                            12 => 12,
                            13 => 13,
                            14 => 14,
                            15 => 15
                        ],
                    ])
                ->add('tipoUnidadesSolicitadas')
                ->add('requiereBanio', 
                      ChoiceType::class, [
                      'choices'  => [
                            'Si Requiere' => true,
                            'No Requiere' => false,
                            'Indistinto' => null,
                        ],
                    ])
                ->add('guardar', SubmitType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GestionBundle\Entity\trafico\Turno'
        ))
        ->setRequired('servicio');
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'gestionbundle_trafico_turno';
    }


}
