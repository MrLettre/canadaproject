<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VersionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('model')
            ->add('nom')
            ->add('bdv')
            ->add('transmission')
            ->add('energie')
            ->add('puissanceTh')
            ->add('puissanceEl')
            ->add('autonimieTh')
            ->add('autonomieHy')
            ->add('autonomieEl')
            ->add('options', EntityType::class, array(
                'class' => 'AppBundle:VehicleOption',
                'choice_label'=> 'nom',
                'multiple' => true,
                'expanded' => true,
                'required' => false,

            ))            ->add('actif')
        ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Version'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_version';
    }


}
