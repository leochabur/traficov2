<?php

namespace GestionBundle\Form\segVial;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;

class UnidadType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       // $user = $options['user'];

        $builder->add('interno')
                ->add('tipoUnidad')
                ->add('propietario')  
                ->add('operadorResponsable')              
                ->add('dominio')
                ->add('estructuraHabitual')
                ->add('estructuraActual')
                ->add('guardar', SubmitType::class);
                
        /*if (($user->getPerfil()) && ($user->getPerfil()->getPerfil() == 'PERFIL_SEGVIAL'))
        {*/
            $builder->add('details', HiddenType::class, ['data' => 'abcdef', 'mapped' => false])
                    ->add('calidadUnidad')
                    ->add('chasisModelo', TextType::class)                    
                    ->add('chasisMarca')
                    ->add('chasisNumero', TextType::class)

                    ->add('carroceriaMarca', TextType::class)
                    ->add('carroceriaModelo', TextType::class)
                    ->add('capacidadReal', IntegerType::class)
                    ->add('capacidadCNRT', IntegerType::class)

                    ->add('tipoMotor', EntityType::class, ['class' => 'GestionBundle:segVial\opciones\TipoMotor'])
                    ->add('motorMarca', TextType::class)
                    ->add('motorNumero', TextType::class)
                    ->add('consumo')

                    ->add('audioVideo')
                    ->add('banio')
                    ->add('bar')  

                    ->add('capacidadTanque', IntegerType::class)
                    ->add('cantidadTanques', IntegerType::class)

                    ->add('tiposVencimientos')

                    ->add('fechaInscripcion',  DateType::class, ['widget' => 'single_text'])
                    ->add('anioModelo', IntegerType::class)               
                    ->add('radicacion', EntityType::class,  ['class' => 'GestionBundle:ventas\Provincia'])
                    ->add('imagen', HiddenType::class)
                    ->add('imageFile', FileType::class, [
                                                            'label' => 'Imagen',
                                                            'mapped' => false,
                                                            'required' => false,  
                                                            'data_class' => null,                                                      
                                                            'constraints' => [
                                                                new File([

                                                                    'maxSize' => '1024k',
                                                                    'mimeTypes' => [
                                                                        'application/pdf',
                                                                        'application/x-pdf',
                                                                    ],
                                                                    'mimeTypesMessage' => 'Please upload a valid PDF document',
                                                                ])
                                                            ],
                                                        ]
                    )



                    




                    

                    ->add('color')
                    ->add('ploteo')
                    ->add('carteleraElectronica')
                    ->add('pcABordo');
     //   }

    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GestionBundle\Entity\segVial\Unidad'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'gestionbundle_segvial_unidad';
    }


}
