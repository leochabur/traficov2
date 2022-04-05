<?php

namespace GestionBundle\Form\segVial\documentacion\habilitaciones;

use GestionBundle\Entity\segVial\documentacion\habilitaciones\TurismoProvincial;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use GestionBundle\Entity\segVial\documentacion\OrganismoEstatal;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use GestionBundle\Form\segVial\documentacion\Vencimiento;
use GestionBundle\Form\segVial\documentacion\VencimientoType;


class TurismoProvincialType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('vto', VencimientoType::class, ['data_class' => TurismoProvincial::class])
            ->add('proveedor',EntityType::class,
                  [
                    'class' => OrganismoEstatal::class
                  ])
            ->add('codigoHabilitacion')
            ->add('tipoHabilitacion')
            ->addEventListener(FormEvents::PRE_SET_DATA, 
                  function (FormEvent $event) {
                                                $contratado = $event->getData();
                                                $form = $event->getForm();

                                                if (!$contratado->getId()) 
                                                {
                                                    $form->add('renuevaVencimiento', 
                                                                  EntityType::class,
                                                                  [
                                                                    'class' => TurismoProvincial::class,
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
            'data_class' => TurismoProvincial::class,
        ]);
    }
}
