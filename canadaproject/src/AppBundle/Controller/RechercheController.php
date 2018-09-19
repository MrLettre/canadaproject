<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;


class RechercheController extends Controller
{

    /**
     * @Route("/recherche", name="recherche")
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {
        $activeRecherche = true;

        // replace this example code with whatever you need
        return $this->render('pagesCarifyPublic/recherche/index.html.twig', ['activeRecherche' => $activeRecherche,
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
}