<?php

namespace GestionBundle\Form\ventas;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\EntityType;
use GestionBundle\Form\ventas\UbicacionEstructuraClienteType;


class ClienteType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('razonSocial')
                ->add('nombreFantasia')
                ->add('prefijo')
                ->add('domicilioFiscal')
                ->add('cuit')
                ->add('condicionPago')
                ->add('responsabilidad', 
                      ChoiceType::class, [
                      'required' => false,
                      'choices'  => [
                            'Inscripto' => 'INSC',
                            'No Inscripto' => 'NOINSC',
                            'Monotributo' => 'MON',
                            'Excento' => 'EXC'
                        ],
                    ])
                ->add('tipoFactura', 
                      ChoiceType::class, [
                      'required' => false,
                      'choices'  => [
                            'A' => 'A',
                            'B' => 'B',
                            'C' => 'C',
                            'M' => 'M'
                        ],
                    ])
                ->add('tipoAjuste',                       
                      ChoiceType::class, [
                      'required' => false,
                      'choices'  => [
                            'Polinomica' => 'POL',
                            'Apertura de Costos' => 'APC',
                            'FADEEAC' => 'FADEEAC',
                        ],
                    ])
                ->add('frecuencaAjuste', 
                      ChoiceType::class, [
                      'required' => false,
                      'choices'  => [
                            'Cuatrimestral' => 'CUAT',
                            'Semestral' => 'SEM',
                            'Anual' => 'AN',
                            'Libre' => 'LIB'
                        ],
                    ])
                ->add('condicionPago')
                ->add('condicionPago')
                ->add('condicionPago')
                ->add('nombreContacto')
                ->add('telefonoContacto')
                ->add('celularContacto')
                ->add('mailContacto', EmailType::class)
                ->add('cargoContacto')
                ->add('ubicaciones', 
                              CollectionType::class, 
                              [
                                    'entry_type' => UbicacionEstructuraClienteType::class,
                                    'entry_options' => ['label' => false],
                                    'allow_add' => true,
                                    'allow_delete' => true,
                                    'by_reference' => false
                              ])
                ->add('guardar', SubmitType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GestionBundle\Entity\ventas\Cliente'
        ));
        
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'gestionbundle_ventas_cliente';
    }


}
