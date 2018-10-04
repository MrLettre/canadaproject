<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use AppBundle\Repository\RechercheRepository;


class RechercheController extends Controller
{

    /**
     * @Route("/recherche", name="recherche")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $vehiculePhysiques = $em->getRepository('AppBundle:VehiculePhysique')->findActive();
        return $this->render('pagesCarifyPublic/recherche/index.html.twig', array(
            'vehiculePhysiques' => $vehiculePhysiques,
        ));
    }
}