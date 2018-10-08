<?php

namespace AppBundle\Form;

use AppBundle\Entity\Marque;
use AppBundle\Entity\Model;
use AppBundle\Entity\Version;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RechercheVehPhyType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('marque')
            ->add('model')
            ->add('version')
            ->add('kilometeMax', ChoiceType::class,[
                'choices' => [
                    'Kilomètrage max' => 'null',
                    '0' => 0,
                    '10000' => 10000,
                    '20000' => 20000,
                    '30000' => 30000,
                    '40000' => 40000,
                    '50000' => 50000,
                    '60000' => 60000,
                    '70000' => 70000,
                    '80000' => 80000,
                    '90000' => 90000,
                    '100000' => 100000,
                    '125000' => 125000,
                    '150000' => 150000,
                    '175000' => 175000,
                    '200000' => 200000,
                ]
            ])
            ->add('kilometreMin', ChoiceType::class,[
                'choices' => [
                    'Kilomètrage min' => 'null',
                    '0' => 0,
                    '10000' => 10000,
                    '20000' => 20000,
                    '30000' => 30000,
                    '40000' => 40000,
                    '50000' => 50000,
                    '60000' => 60000,
                    '70000' => 70000,
                    '80000' => 80000,
                    '90000' => 90000,
                    '100000' => 100000,
                    '125000' => 125000,
                    '150000' => 150000,
                    '175000' => 175000,
                    '200000' => 200000,
                ]
            ])
            ->add('dateDeMiseEnCirculationMax', ChoiceType::class,[
                'choices' => [
                    'Année max' => 'null',
                    '2018' => 2018,
                    '2017' => 2017,
                    '2016' => 2016,
                    '2015' => 2015,
                    '2014' => 2014,
                    '2013' => 2013,
                    '2012' => 2012,
                    '2011' => 2013,
                    '2010' => 2010,
                    '2009' => 2009,
                    '2008' => 2008,
                    '2007' => 2007,
                    '2006' => 2006,
                    '2005' => 2005,
                    '2004' => 2004,
                    '2003' => 2003,
                    '2002' => 2002,
                    '2001' => 2001,
                    '2000' => 2000,
                    'Avant 2000' => 'Avant_2000'
                    ]
            ])
            ->add('dateDeMiseEnCirculationMin', ChoiceType::class,[
                'choices' => [
                    'Année min' => 'null',
                    '2018' => 2018,
                    '2017' => 2017,
                    '2016' => 2016,
                    '2015' => 2015,
                    '2014' => 2014,
                    '2013' => 2013,
                    '2012' => 2012,
                    '2011' => 2013,
                    '2010' => 2010,
                    '2009' => 2009,
                    '2008' => 2008,
                    '2007' => 2007,
                    '2006' => 2006,
                    '2005' => 2005,
                    '2004' => 2004,
                    '2003' => 2003,
                    '2002' => 2002,
                    '2001' => 2001,
                    '2000' => 2000,
                    'Avant 2000' => 'Avant_2000'
                ]
            ])
            ->add('prixMax', ChoiceType::class,[
                'choices' => [
                    'Prix max' => 'null',
                    '2000' => 2000,
                    '3000' => 3000,
                    '4000' => 4000,
                    '5000' => 5000,
                    '6000' => 6000,
                    '7000' => 7000,
                    '8000' => 8000,
                    '9000' => 9000,
                    '10000' => 10000,
                    '11000' => 11000,
                    '12000' => 12000,
                    '13000' => 13000,
                    '14000' => 14000,
                    '15000' => 15000,
                    '17500' => 17500,
                    '20000' => 20000,
                    '22500' => 22500,
                    '25000' => 25000,
                    '30000' => 30000,
                    '35000' => 35000,
                    '40000' => 40000,
                    '45000' => 45000,
                    '50000' => 50000,
                    '60000' => 60000,
                    '70000' => 70000,
                    'Plus de 70000' => 'Plus de 70000'
                ]
            ])
            ->add('prixMin', ChoiceType::class,[
                'choices' => [
                    'Prix min' => 'null',
                    '2000' => 2000,
                    '3000' => 3000,
                    '4000' => 4000,
                    '5000' => 5000,
                    '6000' => 6000,
                    '7000' => 7000,
                    '8000' => 8000,
                    '9000' => 9000,
                    '10000' => 10000,
                    '11000' => 11000,
                    '12000' => 12000,
                    '13000' => 13000,
                    '14000' => 14000,
                    '15000' => 15000,
                    '17500' => 17500,
                    '20000' => 20000,
                    '22500' => 22500,
                    '25000' => 25000,
                    '30000' => 30000,
                    '35000' => 35000,
                    '40000' => 40000,
                    '45000' => 45000,
                    '50000' => 50000,
                    '60000' => 60000,
                    '70000' => 70000,
                    'Plus de 70000' => 'Plus de 70000'
                ]
            ])
            ->add('energie', ChoiceType::class,[
                'choices' => [
                    'Energie' => 'null',
                    'Essence' => 'Essence',
                    'Diesel' => 'Diesel',
                    'Electrique' => 'Electrique',
                    'Hybride' => 'Hybride',
                    'GPL' => 'GPL',
                ]
            ])
            ->add('Bdv', ChoiceType::class,[
                'choices' => [
                    'Boîte de vitesse' => 'null',
                    'Automatique' => 'Automatique',
                    'Manuelle' => 'Diesel',
                    'Séquentielle' => 'Séquentielle',
                    'Autre' => 'Autre',
                ]
            ]);



    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Recherche'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_recherche';
    }


}
