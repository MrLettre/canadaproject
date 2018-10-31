<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Article;
use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Marque;


class VendeurControlleur extends Controller
{
    /**
     * @Route("/vendeur", name="adminHomepageSeller")
     * @Method("GET")
     */
    public function vendeurPageAction()
    {
        // replace this example code with whatever you need
        return $this->render('admin/vendeur/index.html.twig');
    }

    //Routes pour les actions de la page Vendeur du site

    /**
     * @Route("/vendeur/parc", name="vendeur_parc")
     * @Method("GET")
     */

    public function vendeurVehPhy()
    {
        $user = $this->getUser();
        $concession = $user->getConcession()->getId();
        $em = $this->getDoctrine()->getManager();
        $vehPhys = $em->getRepository('AppBundle:VehiculePhysique')->findByConcession($concession);

        return $this->render('admin/vendeur/catalogue.html.twig', array(
            'vehPhys' => $vehPhys,
            'user' => $user,
        ));
    }

    /**
     * Lists all vehiculePhysique entities.
     *
     * @Route("/vendeur/validation", name="vehiculevendeur_validation_index")
     * @Method("GET")
     */
    public function indexVendeurValidationAction()
    {
        $user = $this->getUser();
        $concession = $user->getConcession()->getId();
        $em = $this->getDoctrine()->getManager();
        $vehiculePhysiques = $em->getRepository('AppBundle:VehiculePhysique')->findByConcession($concession);

        return $this->render('admin/vendeur/validation_index.html.twig', array(
            'vehiculePhysiques' => $vehiculePhysiques,
        ));
    }


}
