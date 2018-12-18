<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LivraisonType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('reference')
            ->add('dateHA')
            ->add('dateLivraisonPrevisionnelle')
            ->add('dateLivraisonEffective', DateType::class,[
                'widget' => 'choice',
                'years' => range(date('Y'), date('Y')-1),
                'months' => range(1, 12),
                'days' => range(1, 31),
            ])
            ->add('vente')
            ->add('modeDeLivraison', EntityType::class, [
                'class' => 'AppBundle:ModeDeLivraison',
                'expanded' =>true,
                'multiple' =>false,
            ]);
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Livraison'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_livraison';
    }


}
