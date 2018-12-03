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
                    'Km Max' => 'null',
                    '1' => 1,
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
                    'Km min' => 'null',
                    '1' => 1,
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
                    'Year max' => 'null',
                    '2018' => 20181231,
                    '2017' => 20171231,
                    '2016' => 20161231,
                    '2015' => 20151231,
                    '2014' => 20141231,
                    '2013' => 20131231,
                    '2012' => 20121231,
                    '2011' => 20131231,
                    '2010' => 20101231,
                    '2009' => 20091231,
                    '2008' => 20081231,
                    '2007' => 20071231,
                    '2006' => 20061231,
                    '2005' => 20051231,
                    '2004' => 20041231,
                    '2003' => 20031231,
                    '2002' => 20021231,
                    '2001' => 20011231,
                    '2000' => 20001231,
                    ]
            ])
            ->add('dateDeMiseEnCirculationMin', ChoiceType::class,[
                'choices' => [
                    'Year min' => 'null',
                    '2000' => 20000101,
                    '2001' => 20010101,
                    '2002' => 20020101,
                    '2003' => 20030101,
                    '2004' => 20040101,
                    '2005' => 20050101,
                    '2006' => 20060101,
                    '2007' => 20070101,
                    '2008' => 20080101,
                    '2009' => 20090101,
                    '2010' => 20100101,
                    '2011' => 20130101,
                    '2012' => 20120101,
                    '2013' => 20130101,
                    '2014' => 20140101,
                    '2015' => 20150101,
                    '2016' => 20160101,
                    '2017' => 20170101,
                    '2018' => 20180101,
                ]
            ])
            ->add('prixMax', ChoiceType::class,[
                'choices' => [
                    'Price max' => 'null',
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
                    'Price min' => 'null',
                    '1' => 1,
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
                    'gasoline' => 'Essence',
                    'Diesel' => 'Diesel',
                    'Electric' => 'Electrique',
                    'Hybrid' => 'Hybride',
                ]
            ])
            ->add('Bdv', ChoiceType::class,[
                'choices' => [
                    'Gearbox' => 'null',
                    'Automatic' => 'Automatique',
                    'Manual' => 'Manuelle',
                    'Sequential' => 'Séquentielle',
                    'Other' => 'Autre',
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
