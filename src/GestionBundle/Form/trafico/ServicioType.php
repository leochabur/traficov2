<?php

namespace GestionBundle\Form\trafico;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Doctrine\ORM\EntityRepository;

class ServicioType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $estructura = $options['estructura'];
        
        $builder->add('nombre')
                ->add('latitudOrigen', NumberType::class, ['scale' => 13])
                ->add('longitudOrigen', NumberType::class, ['scale' => 13])
                ->add('latitudDestino', NumberType::class, ['scale' => 13])
                ->add('longitudDestino', NumberType::class, ['scale' => 13])
                ->add('sentido')
                ->add('tipoServicio')
                ->add('requiereUnidadHabilitada')
                ->add('admiteFletero')
                ->add('cierreAutomatico')
                ->add('cliente', 
                        EntityType::class,
                       [
                            'class' => 'GestionBundle\Entity\ventas\Cliente',
                            'choice_label' => 'nombreFantasia',
                            'query_builder' => function (EntityRepository $er) use ($estructura) {
                                                                                    return $er->createQueryBuilder('c')
                                                                                              ->join('c.ubicaciones', 'u')
                                                                                              ->join('u.estructura', 'e')
                                                                                              ->where('e = :estructura')
                                                                                              ->setParameter('estructura', $estructura)
                                                                                              ->orderBy('c.nombreFantasia');
                                                                                },
                        ])
                ->add('origen')
                ->add('destino')
                ->add('estructura', 
                      EntityType::class,                      
                      ['class' => 'AppBundle\Entity\Estructura',
                       'choices' => $options['usuario']->getEstructuras()])
                ->add('frecuencia')
                ->add('tipoHabilitacion')
                ->add('tiposUnidadPermitidos')
                ->add('tiposMotorPermitidos')
                ->add('tiposSuspensionPermitidos')
                ->add('guardar', SubmitType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GestionBundle\Entity\trafico\Servicio'
        ));
        $resolver->setRequired('usuario')
                 ->setRequired('estructura');
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'gestionbundle_trafico_servicio';
    }


}
