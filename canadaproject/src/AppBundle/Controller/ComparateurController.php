<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\VehicleDefinition;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
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
        $vehicleComparaison = new Vehicledefinition();
        $form = $this->createForm('AppBundle\Form\ComparateurType', $vehicleComparaison);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $id = $vehicleComparaison->getVersion()->getVehicleDef()->getId();

            return $this->redirectToRoute('comparateur_show', array(
                'id' => $id
            ));
        }

        return $this->render('pagesCarifyPublic/comparateur/index.html.twig', array(
            'vehicleComparaison' => $vehicleComparaison,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a vehicleDefinition entity.
     *
     * @Route("/{id}/show", name="comparateur_show")
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