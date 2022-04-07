<?php

namespace GestionBundle\Form\segVial\documentacion\finanzas;

use GestionBundle\Entity\segVial\documentacion\finanzas\CuotaVencimiento;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use GestionBundle\Entity\segVial\documentacion\Vencimiento;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

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
            
            ->add('vencimiento',
                   EntityType::class,
                  [
                     'class' => Vencimiento::class,
                     'choices' => [$vto]
                  ])
        ;
        if (!$vto->getCalculaPagoAutomaticamente())
        {
            $builder->add('monto');
        }
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CuotaVencimiento::class,
        ])
        ->setRequired('vto');
    }
}
