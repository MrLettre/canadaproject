<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\Energie;
use AppBundle\Entity\Marque;
use AppBundle\Entity\TypeVehicule;
use AppBundle\Entity\VehicleDefinition;
use AppBundle\Form\AddToCompareType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;


class ComparateurController extends Controller
{

    /**
     * @Route("/comparateur", name="comparateur")
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $marques = $em->getRepository('AppBundle:Marque')->findAll();
        $energies = $em->getRepository('AppBundle:Energie')->findAll();
        $styles = $em->getRepository('AppBundle:TypeVehicule')->findAll();

        $data = [];
        $form = $this->createFormBuilder($data)
            ->add('Marque', IntegerType::class, array(
                'attr' => array('hidden' => true),
                'label' => false,
                'required' => false
            ))
            ->add('Type', IntegerType::class, array(
                'attr' => array('hidden' => true),
                'label' => false,
                'required' => false
            ))
            ->add('Energy', IntegerType::class, array(
                'attr' => array('hidden' => true),
                'label' => false,
                'required' => false
            ))
            ->add('save', SubmitType::class, array(
                'attr' => array('hidden' => true),
            ))
            ->getForm();

       // var_dump($request->request);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            $data = $form->getData();
            $marque = $data["Marque"];
            $type = $data["Type"];
            $energy = $data["Energy"];

            $em = $this->getDoctrine()->getManager();

            if ($marques != 'NULL'){
                $recherche = $em->getRepository('AppBundle:VehicleDefinition')->findByMarque($marque);
            }elseif ($type != 'NULL'){
                $recherche = $em->getRepository('AppBundle:VehicleDefinition')->findByType($type);
            }elseif ($energy != 'NULL'){
                $recherche = $em->getRepository('AppBundle:VehicleDefinition')->findByEnergy($energy);
            }

            var_dump($recherche);
            die();

            return $this->render('displaySelection', array(
                'recherche' => $recherche,
            ));
        }


        return $this->render('pagesCarifyPublic/comparateur/index.html.twig', array(
            'marques' => $marques,
            'energies' => $energies,
            'styles' => $styles,
            'data' => $data,
            'form' => $form->createView()
        ));
    }

    /**
     * Finds and displays a vehicleDefinition entity.
     *
     * @Route("/comparateur/{id}/show", name="comparateur_show")
     * @Method("GET")
     */
    public function showAction(Request $request, VehicleDefinition $vehicleDefinition)
    {
        $vehicle2 = new Vehicledefinition();
        $form = $this->createForm('AppBundle\Form\ComparateurType', $vehicle2);
        $form->handleRequest($request);
        $version = $vehicleDefinition->getVersion();

        if ($form->isSubmitted() && $form->isValid()) {
            $id2 = $vehicle2->getVersion()->getVehicleDef();
            $version2 = $vehicle2->getVersion();

            return $this->render('pagesCarifyPublic/comparateur/show.html.twig', array(
                'vehicle2' => $vehicle2,
                'id2' => $id2,
                'vehicleDefinition' => $vehicleDefinition,
                'version' => $version,
                'version2'=>$version2,
                'form' => $form->createView(),
            ));
        }

        return $this->render('pagesCarifyPublic/comparateur/show.html.twig', array(
            'vehicleDefinition' => $vehicleDefinition,
            'version' => $version,
            'vehicle2' => $vehicle2,
            'form' => $form->createView(),
        ));
    }
}