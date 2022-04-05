<?php

namespace GestionBundle\Form\segVial\documentacion\habilitaciones;

use GestionBundle\Entity\segVial\documentacion\habilitaciones\Charter;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use GestionBundle\Entity\segVial\documentacion\OrganismoEstatal;
use GestionBundle\Form\segVial\documentacion\VencimientoType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class CharterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('vto', VencimientoType::class, ['data_class' => Charter::class])
            ->add('codigoHabilitacion')
            ->add('proveedor', 
                  EntityType::class,
                  [
                    'class' => OrganismoEstatal::class
                  ])
            ->add('origen')
            ->add('destino')
            ->add('cantCuotas')
            ->addEventListener(FormEvents::PRE_SET_DATA, 
                  function (FormEvent $event) {
                                                $charter = $event->getData();
                                                $form = $event->getForm();

                                                if (!$charter->getId()) 
                                                {
                                                    $form->add('renuevaVencimiento', 
                                                                  EntityType::class,
                                                                  [
                                                                    'class' => Charter::class,
                                                                    'required' => false,
                                                                  ]);
                                                }
                                                else
                                                {
                                                    return;
                                                }
                                            })
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Charter::class,
        ]);
    }
}
