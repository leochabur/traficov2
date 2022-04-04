<?php

namespace GestionBundle\Form\segVial\documentacion\finanzas;

use GestionBundle\Entity\segVial\documentacion\finanzas\CuotaVencimiento;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use GestionBundle\Entity\segVial\documentacion\Vencimiento;

class CuotaVencimientoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $vto = $options['vto'];
        $builder
            ->add('fechaVencimiento', DateType::class, [
                                                    'widget' => 'single_text',
                                                ])
            ->add('fechaPago', DateType::class, [
                                                    'widget' => 'single_text',
                                                ])
            ->add('monto')
            ->add('vencimiento',
                   EntityType::class,
                  [
                     'class' => Vencimiento::class,
                     'choices' => [$vto]
                  ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CuotaVencimiento::class,
        ])
        ->setRequired('vto');
    }
}
