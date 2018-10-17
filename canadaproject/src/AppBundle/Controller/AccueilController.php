<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Repository\ArticleRepository;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Accueil controller.
 *
 * @Route("/")
 */
class AccueilController extends Controller
{

    /**
     * @Route("/", name="accueil")
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $articles = $em->getRepository('AppBundle:Article')->findArticleAccueil();
        $vehDefs = $em->getRepository('AppBundle:VehicleDefinition')->findLastThree();
        $vehPhys = $em->getRepository('AppBundle:VehiculePhysique')->findLastNine();

        // replace this example code with whatever you need
        return $this->render('pagesCarifyPublic/accueil/index.html.twig', array(
            'articles' => $articles,
            'vehDefs' => $vehDefs,
            'vehPhys' => $vehPhys,
        ));
    }



}