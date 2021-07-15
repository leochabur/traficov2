<?php

namespace GestionBundle\Form\segVial\eventos;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use GestionBundle\Entity\segVial\eventos\Infraccion;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class InfraccionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $prox = $options['numero'];
        $builder->add('numeroActa')
                ->add('notificado')
                ->add('descontada')
                ->add('aceptada')
                ->add('montoInicial')
                ->add('vencimiento', DateType::class, ['widget' => 'single_text'])
                ->add('fechaPago', DateType::class, ['widget' => 'single_text'])
                ->add('montoAbonado')
                ->add('cuotas')

                ->add('tipoInfraccion')
                ->add('evento', EventoType::class, ['data_class' => Infraccion::class, 'proximo' => $prox, 'prefix' => $options['prefix']])
                ->add('guardar', SubmitType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GestionBundle\Entity\segVial\eventos\Infraccion'
        ))
                ->setRequired('numero')
                ->setRequired('prefix');
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'gestionbundle_segvial_eventos_infraccion';
    }


}
