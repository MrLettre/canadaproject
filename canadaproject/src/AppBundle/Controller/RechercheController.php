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

            $arrayVeh = $em->getRepository('AppBundle:VehiculePhysique')
                ->findByRecherche($marque, $model, $version, $miseEnCircuMax, $miseEnCircuMin, $kiloMax, $kiloMin, $prixMax, $prixMin, $bdv, $energie);

            $ids='';
            foreach($arrayVeh as $key => $value){
                $ids .= $value['id'] . ',';
            }
            $ids =substr($ids,0,-1);

            if($ids != ''){
            $vehiculePhysiques = $em->getRepository('AppBundle:VehiculePhysique')->findIds($ids);
            }

            return $this->render('pagesCarifyPublic/recherche/index.html.twig', array(
                'vehiculePhysiques' => $vehiculePhysiques,
                'form' => $form->createView(),
            ));
        }

        return $this->render('pagesCarifyPublic/recherche/index.html.twig', array(
            'vehiculePhysiques' => $vehiculePhysiques,
            'recherche' => $recherche,
            'form' => $form->createView(),
        ));
    }
}