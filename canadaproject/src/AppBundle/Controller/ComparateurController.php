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
    public function showAction(VehicleDefinition $vehicleDefinition)
    {


        return $this->render('pagesCarifyPublic/comparateur/show.html.twig', array(
            'vehicleDefinition' => $vehicleDefinition,
        ));
    }
}