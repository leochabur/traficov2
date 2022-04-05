<?php

namespace GestionBundle\Form\segVial\documentacion\habilitaciones;

use GestionBundle\Entity\segVial\documentacion\habilitaciones\Contratado;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use GestionBundle\Entity\segVial\documentacion\OrganismoEstatal;
use GestionBundle\Form\segVial\documentacion\VencimientoType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class ContratadoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('vto', VencimientoType::class, ['data_class' => Contratado::class])
            ->add('codigoHabilitacion')
            ->add('proveedor', 
                  EntityType::class,
                  [
                    'class' => OrganismoEstatal::class
                  ])
            ->add('origen')
            ->add('destino')
            ->add('cliente')
            ->add('cantCuotas')
            ->addEventListener(FormEvents::PRE_SET_DATA, 
                  function (FormEvent $event) {
                                                $contratado = $event->getData();
                                                $form = $event->getForm();

                                                if (!$contratado->getId()) 
                                                {
                                                    $form->add('renuevaVencimiento', 
                                                                  EntityType::class,
                                                                  [
                                                                    'class' => Contratado::class,
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
            'data_class' => Contratado::class,
        ]);
    }
}
