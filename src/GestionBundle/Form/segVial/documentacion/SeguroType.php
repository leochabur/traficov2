<?php

namespace GestionBundle\Form\segVial\documentacion;

use GestionBundle\Entity\segVial\documentacion\Seguro;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use GestionBundle\Entity\segVial\documentacion\CompaniaSeguro;
use GestionBundle\Entity\segVial\Unidad;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Doctrine\ORM\EntityRepository;

class SeguroType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('emision', DateType::class, [
                                                    'widget' => 'single_text',
                                                    'required' => true
                                                ])
            ->add('vigenciaDesde', DateType::class, [
                                                    'widget' => 'single_text',
                                                ])
            ->add('vigenciaHasta', DateType::class, [
                                                    'widget' => 'single_text',
                                                ])
            ->add('poliza')
            ->add('cantCuotas')
            ->add('proveedor')
            ->add('asegurado')
            ->add('cantCuotas')
            ->add('tomador')
            ->add('renuevaVencimiento')
            ->add('proveedor', 
                  EntityType::class,
                  [
                    'class' => CompaniaSeguro::class
                  ])
            ->add('unidades',
                   EntityType::class,
                  [
                     'class' => Unidad::class,
                     'multiple' => true,
                     'query_builder' => function (EntityRepository $er) {
                                                                                return $er->createQueryBuilder('u')
                                                                                          ->where('u.activo = :activo')
                                                                                          ->setParameter('activo', true)
                                                                                          ->orderBy('u.interno');
                                                                         },
                  ])
            ->add('tipoDestinoSeguro')
            ->add('cobertura')
            ->add('guardar', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Seguro::class,
        ]);
    }
}
