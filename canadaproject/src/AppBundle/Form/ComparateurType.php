<?php

namespace AppBundle\Form;

use AppBundle\Entity\Marque;
use AppBundle\Entity\Model;
use AppBundle\Entity\Version;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

class ComparateurType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('marque', EntityType::class, [
                'class'         => 'AppBundle\Entity\Marque',
                'placeholder'   => 'Choose Brand',
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
        $builder->addEventListener(
            FormEvents::POST_SET_DATA,
            function (FormEvent $event) {
                $data = $event->getData();
                /* @var $version Version */
                $version = $data->getVersion();
                if ($version){
                    $model = $version->getModel();
                    $marque = $model->getMarque();
                    $this->addModelField($event->getForm(), $marque);
                    $this->addVersionField($event->getForm(), $model);
                    $event->getForm()->get('marque')->setData($marque);
                    $event->getForm()->get('model')->setData($model);
                }else{
                    $this->addModelField($event->getForm(), null);
                    $this->addVersionField($event->getForm(), null);

                }
            }
        );
    }

    /**
     * Rajoute un champs model au formulaire
     * @param FormInterface $form
     * @param Marque $marque
     */

    private function addModelField(FormInterface $form, ?Marque $marque){

        $builder = $form->getConfig()->getFormFactory()->createNamedBuilder(
            'model',
            EntityType::class,
            null,
            [
                'class'         => 'AppBundle\Entity\Model',
                'placeholder'   => $marque ? 'Choose model' : 'Choose brand first',
                'mapped'        => false,
                'required'      => false,
                'auto_initialize' =>false,
                'choices'       => $marque ? $marque->getModels() : []
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

    private function addVersionField(FormInterface $form, ?Model $model){

        $form->add('version', EntityType::class,
            [
                'class'         => 'AppBundle\Entity\Version',
                'placeholder'   => $model ? 'Choose version' : 'Choose model first',
                'choices'       => $model ? $model->getVersions() : []
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\VehicleDefinition'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_vehicledefinition';
    }


}
