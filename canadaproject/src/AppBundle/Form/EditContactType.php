<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EditContactType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('destinataireMailContact', ChoiceType::class, [
                'choices' => [
                    'Admin' => 'Admin',
                    'Vendeur' => 'Vendeur',
                    'Société de livraison' => 'Société de livraison',
                ],
            ])
            ->add('statutMailContact', ChoiceType::class, [
                'choices' => [
                    'Non-lu' => 'Non-lu',
                    'En cours de traitement' => 'En cours de traitement',
                    'Demande traitée' => 'Demande traitée',
                    'Archivé' => 'Archivé'
                ],
            ])
            ->add('messageAdminContact', TextareaType::class);
    }

    /**
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
