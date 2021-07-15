<?php

namespace GestionBundle\Form\segVial\eventos;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use GestionBundle\Entity\segVial\eventos\UbicacionEvento;
class EventoType extends AbstractType
{

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $prox = $options['proximo'];
        $builder->add('prefijo', TextType::class, ['data' => $options['prefix'], 'attr'=> [ 'readonly' => true ]])
                ->add('numero', TextType::class, ['data' => $prox, 'attr'=> [ 'readonly' => true ]])
                ->add('fecha', DateType::class, ['widget' => 'single_text'])
                ->add('hora', TimeType::class, ['widget' => 'single_text'])
                ->add('descripcion')
                ->add('tripulacion')
                ->add('cliente')
                ->add('unidad')
                ->add('ubicacion', UbicacionEventoType::class, ['data_class' => UbicacionEvento::class])
                ->add('estructura');
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'inherit_data' => true
        ))
                ->setRequired('proximo')
                ->setRequired('prefix');
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'gestionbundle_segvial_eventos_evento';
    }


}
