<?php

namespace AppBundle\Form;

use AppBundle\Entity\VehiculePhysique;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VehiculePhysiqueType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('dateMiseEnLigne')
            ->add('dateDeVente')
            ->add('kilometrage')
            ->add('dateDeMiseEnCirculation')
            ->add('prixHT')
            ->add('prixTTC')
            ->add('prixHA')
            ->add('descriptif')
            ->add('vehiculeDef')
            ->add('validationStatut')
            ->add('region')
            ->add('carts')
            ->add('concession')
            ->add('vehiclePhyStatut')
            ->add('imageFile', FileType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\VehiculePhysique'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_vehiculephysique';
    }


}
