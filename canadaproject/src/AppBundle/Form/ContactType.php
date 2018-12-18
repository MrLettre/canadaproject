<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('statutContact', ChoiceType::class, [
                'choices' => [
                  'Please select your status' => 'null',
                  "I am a Carify's seller" => 'Vendeur',
                  'I am not a Carify seller yet, but I wish to become one ' => 'Prospect',
                  'I am a Carify customer' => 'Client',
                  'Other' => 'Autre'
                ],
            ])
            ->add('motifContact', ChoiceType::class, [
                'choices' => [
                    'Please select a reason' => 'null',
                    'I wish to become a seller' => 'Je souhaite devenir vendeur',
                    'I am a potential customer' =>'Je suis un potentiel client',
                    'After sales service' => 'SAV',
                    'Other' => 'Autre'
                ]
            ])
            ->add('nomSteContact')
            ->add('civiliteContact', ChoiceType::class, array(
                'choices'  => [
                    'Civility' => 'null',
                    'Mrs' => 'Madame',
                    'Mr.' => 'Monsieur'
                ]))
            ->add('nomContact', TextType::class, [])
            ->add('prenomContact', TextType::class, [])
            ->add('emailContact', EmailType::class, [])
            ->add('phoneContact', TelType::class, [])
            ->add('adresseContact')
            ->add('codePostalContact')
            ->add('villeContact')
            ->add('messageContact', TextareaType::class, []);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Contact'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_contact';
    }


}
