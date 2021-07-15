<?php

namespace GestionBundle\Form\ventas;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class UbicacionEstructuraClienteType extends AbstractType
{

    private $session;

    public function __construct (Session $session)
    {
        $this->session = $session;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $estructura = $this->session->get('estructura');

        $builder->add('latitud')
                ->add('longitud')
                ->add('ciudad')
                ->add('estructura');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GestionBundle\Entity\ventas\UbicacionEstructuraCliente'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'gestionbundle_ventas_ubicacionestructuracliente';
    }


}
