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
                  'Veuillez sélectionner votre statut' => 'null',
                  'Je suis vendeur Carify' => 'Vendeur',
                  'Je ne suis pas encore vendeur Carify mais je souhaiterais le devenir' => 'Prospect',
                  'Je suis client Carify' => 'Client',
                  'Autre' => 'Autre'
                ],
                'data' => 'nul'
            ])
            ->add('motifContact', ChoiceType::class, [
                'choices' => [
                    'Veuillez sélectionner un motif' => 'null',
                    'Je souhaite devenir vendeur' => 'Je souhaite devenir vendeur',
                    'Je suis un potentiel client et souhaite des informations complémentaires sur un produit/démarche de souscription/autre...' =>'Je suis un potentiel client',
                    'Demande de SAV' => 'SAV',
                    'Autre' => 'autre'
                ]
            ])
            ->add('nomSteContact')
            ->add('civiliteContact', ChoiceType::class, array(
                'choices'  => [
                    'Civilité' => 'null',
                    'Madame' => 'Madame',
                    'Monsieur' => 'Monsieur'
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
