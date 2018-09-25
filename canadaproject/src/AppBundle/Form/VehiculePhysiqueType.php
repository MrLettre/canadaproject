<?php

namespace AppBundle\Form;

use AppBundle\Entity\Marque;
use AppBundle\Entity\Model;
use AppBundle\Entity\VehicleDefinition;
use AppBundle\Entity\Version;
use Doctrine\DBAL\Types\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VehiculePhysiqueType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('marque', EntityType::class, [
                'class'         => 'AppBundle\Entity\Marque',
                'placeholder'   => 'Choisissez la Marque',
                'mapped'        => false,
                'required'      => false
            ]);

        $builder->get('marque')->addEventListener(
          FormEvents::POST_SUBMIT,
            function (FormEvent $event){
              $form = $event->getForm();
              $this->addModelField($form->getParent(), $form->getData());
            }
        );
    }

    /**
     * Rajoute un champs model au formulaire
     * @param FormInterface $form
     * @param Marque $marque
     */

    private function addModelField(FormInterface $form, Marque $marque){

        $builder = $form->getConfig()->getFormFactory()->createNamedBuilder(
            'Model',
            EntityType::class,
            null,
            [
                'class'         => 'AppBundle\Entity\Model',
                'placeholder'   => 'Choisissez la catégorie',
                'mapped'        => false,
                'required'      => false,
                'auto_initialize' =>false,
                'choices'       => $marque->getModels()
            ]);
        $builder->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) {
                $form = $event->getForm();
                $this->addVersionField($form->getParent(), $form->getData());
            }
        );
        $form->add($builder->getForm());
    }

    /**
     * Rajoute un champs version au formulaire
     * @param FormInterface $form
     * @param Model $model
     */

    private function addVersionField(FormInterface $form, Model $model){

        $builder = $form->getConfig()->getFormFactory()->createNamedBuilder(
            'Version',
            EntityType::class,
            null,
            [
                'class'         => 'AppBundle\Entity\Version',
                'placeholder'   => 'Choisissez la version',
                'mapped'        => false,
                'required'      => false,
                'auto_initialize' =>false,
                'choices'       => $model->getVersions()
            ]);
        $builder->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) {

                dump($event->getForm());
                /*
                $form = $event->getForm();
                $this->addVehicleDefinitionField($form->getParent(), $form->getData());*/
            }
        );
        $form->add($builder->getForm());
    }

    /**
     * Rajoute un champs version au formulaire
     * @param FormInterface $form
     * @param Version $version


    private function addVehicleDefinitionField(FormInterface $form, Version $version){

        $builder = $form->getConfig()->getFormFactory()->createNamedBuilder(
            'vehicule technique',
            EntityType::class,
            null,
            [
                'class'         => 'AppBundle\Entity\VehicleDefinition',
                'placeholder'   => 'Choisissez le véhicule technique',
                'mapped'        => false,
                'required'      => false,
                'auto_initialize' =>false,
                'choices'       => $version->getVehiculeDef()
            ]);
        $builder->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) {

                dump($event->getForm());

            }
        );
        $form->add($builder->getForm());
    }*/

    /**
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
