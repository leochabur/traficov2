<?php

namespace GestionBundle\Form\segVial\documentacion;

use GestionBundle\Entity\segVial\documentacion\VerificacionTecnicaProvincial;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use GestionBundle\Entity\segVial\documentacion\PlantaVerificacion;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Doctrine\ORM\EntityRepository;

class VerificacionTecnicaProvincialType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('vto', VencimientoType::class, ['data_class' => VerificacionTecnicaProvincial::class])
            ->add('numeroCertificado')
            ->add('proveedor',EntityType::class,
                  [
                    'class' => PlantaVerificacion::class,
                    'query_builder' => function (EntityRepository $er) {
                                                                            return $er->createQueryBuilder('u')
                                                                                      ->where("u.juisdiccion = 'PRO'")
                                                                                      ->andWhere('u.active = true');
                                                                        },
                  ])
            ->addEventListener(FormEvents::PRE_SET_DATA, 
                              function (FormEvent $event) {
                                                            $vtv = $event->getData();
                                                            $form = $event->getForm();

                                                            if (!$vtv->getId()) 
                                                            {
                                                                $form->add('importe');
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
            'data_class' => VerificacionTecnicaProvincial::class,
        ]);
    }
}
