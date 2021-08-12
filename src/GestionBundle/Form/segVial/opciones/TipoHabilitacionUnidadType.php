<?php

namespace GestionBundle\Form\segVial\opciones;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use GestionBundle\Entity\Form\GestionBundle\Entity\opciones\TipoVencimientoType;

use GestionBundle\Entity\opciones\Tipo


class TipoHabilitacionUnidadType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('tipo', TipoVencimientoType::class, ['data_class']
                ->add('guardar', SubmitType::class);
    }


    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GestionBundle\Entity\segVial\opciones\TipoHabilitacionUnidad'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'gestionbundle_segvial_opciones_tipohabilitacionunidad';
    }


}
