<?php

namespace GestionBundle\Form\utils;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use GestionBundle\Entity\ventas\Cliente;
use Symfony\Component\Security\Core\Security;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class SelectClienteType extends AbstractType
{

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $str = $options['estructura'];
        $builder->add('clientes', 
                      EntityType::class,                       
                      [
                        'class' => Cliente::class,
                        'query_builder' => function (EntityRepository $er) use ($str){
                                                                                return $er->createQueryBuilder('c')
                                                                                          ->join('c.ubicaciones', 'u')
                                                                                          ->where('u.estructura = :str')
                                                                                          ->setParameter('str', $str);
                                                                            }
                        ])
                ->add('cargar', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setRequired('estructura');
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'gestionbundle_utils_selectcliente';
    }


}
