<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Recherche;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use AppBundle\Repository\VehiculePhysiqueRepository;
use AppBundle\Entity\VehiculePhysique;


class RechercheController extends Controller
{

    /**
     * @Route("/recherche", name="recherche")
     * @Method({"GET", "POST"})
     */
    public function indexAction(Request $request)
    {
        $recherche = new Recherche();
        $form = $this->createForm('AppBundle\Form\RechercheVehPhyType', $recherche);
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
        $vehiculePhysiques = $em->getRepository('AppBundle:VehiculePhysique')->findActive();

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($recherche);
            $em->flush();

            $marque = $recherche->getMarque();
            $model = $recherche->getModel();
            $version = $recherche->getVersion();
            $miseEnCircuMax = $recherche->getDateDeMiseEnCirculationMax();
            $miseEnCircuMin = $recherche->getDateDeMiseEnCirculationMin();
            $kiloMax = $recherche->getKilometeMax();
            $kiloMin = $recherche->getKilometreMin();
            $prixMax = $recherche->getPrixMax();
            $prixMin = $recherche->getPrixMin();
            $bdv = $recherche->getBdv();
            $energie = $recherche->getEnergie();

            $vehiculePhysique = $em->getRepository('AppBundle:VehiculePhysique')
                ->findByRecherche($marque, $model, $version, $miseEnCircuMax, $miseEnCircuMin, $kiloMax, $kiloMin, $prixMax, $prixMin, $bdv, $energie);


            return $this->redirectToRoute('pagesCarifyPublic/recherche/index.html.twig', array(
                'vehiculePhysique' => $vehiculePhysique,
            ));
        }

        return $this->render('pagesCarifyPublic/recherche/index.html.twig', array(
            'vehiculePhysiques' => $vehiculePhysiques,
            'recherche' => $recherche,
            'form' => $form->createView(),
        ));
    }
}