<?php

namespace AppBundle\Controller;

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
        $activeComparateur = true;

        // replace this example code with whatever you need
        return $this->render('pagesCarifyPublic/comparateur/index.html.twig', ['activeComparateur' => $activeComparateur,
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
}