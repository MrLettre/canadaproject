<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Article;
use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Marque;


class VendeurControlleur extends Controller
{
    /**
     * @Route("/vendeur", name="adminHomepageSeller")
     */
    public function vendeurPageAction()
    {
        // replace this example code with whatever you need
        return $this->render('admin/vendeur/index.html.twig');
    }

    //Routes pour les actions de la page Vendeur du site

    /**
     * @Route("/vendeur/parc", name="vendeur_parc")
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



}
