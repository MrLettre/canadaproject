<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;


class DossierController extends Controller
{

    /**
     * @Route("/dossier", name="dossier")
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {
        $activeDossier = true;

        // replace this example code with whatever you need
        return $this->render('pagesCarifyPublic/dossiers&articles/index.html.twig', ['activeDossier' => $activeDossier,
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
}