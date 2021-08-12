<?php

namespace GestionBundle\Form\opciones;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class DocumentoAdjuntoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                    ->add('tipoDocumento')
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
                    ->add('guardar', SubmitType::class);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'GestionBundle\Entity\opciones\DocumentoAdjunto'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'gestionbundle_opciones_documento_dajunto';
    }
}
