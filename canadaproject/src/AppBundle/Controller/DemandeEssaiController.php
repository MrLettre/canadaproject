<?php

namespace AppBundle\Controller;

use AppBundle\Entity\DemandeEssai;
use AppBundle\Entity\VehiculePhysique;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\Date;

/**
 * Demandeessai controller.
 *
 * @Route("demandeessai")
 */
class DemandeEssaiController extends Controller
{
    /**
     * Creates a new demandeEssai entity.
     *
     * @Route("/{id}/new", name="demandeessai_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, $id)
    {
        // SI L'UTILISATEUR N'EST PAS ENREGISTRE OU IDENTIFIE ALORS ON NE LUI DONNE PAS ACCES
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_REMEMBERED');
        $user = $this->getUser();
        if ($user == null) {
            return $this->redirectToRoute('/login');
        }

        $demandeEssai = new Demandeessai();
        $formEssai = $this->createForm('AppBundle\Form\DemandeEssaiType', $demandeEssai);
        $formEssai->handleRequest($request);

        $em = $this->getDoctrine()->getManager();
        $voiturephy = $em->getRepository('AppBundle:VehiculePhysique')->findById($id);

        $statut = 'Non-lu';

        if ($formEssai->isSubmitted() && $formEssai->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $dateDemande = new \DateTime('now');
            $ref= 'ESSAI'.'-'.rand(0, 99999);
            /* @var $voiturephy VehiculePhysique */
            $concession = $voiturephy[0]->getConcession();
            $demandeEssai->setReference($ref);
            $demandeEssai->setDateDemande($dateDemande);
            $demandeEssai->setVehiculePhysique($voiturephy[0]);
            $demandeEssai->setConcession($concession);
            $demandeEssai->setUser($user);
            $demandeEssai->setStatutMailEssai($statut);


            $em->persist($demandeEssai);
            $em->flush();

            return $this->redirectToRoute('vehiculephysique_recherche', array('id' => $id));
        }

        return $this->render('demandeessai/new.html.twig', array(
            'voiturephy' => $voiturephy,
            'demandeEssai' => $demandeEssai,
            'user'=>$user,
            'formEssai' => $formEssai->createView(),
        ));
    }

    /**
     * Finds and displays a demandeEssai entity.
     *
     * @Route("/{id}", name="demandeessai_show")
     * @Method("GET")
     */
    public function showAction(DemandeEssai $demandeEssai)
    {

        return $this->render('demandeessai/show.html.twig', array(
            'demandeEssai' => $demandeEssai,
        ));
    }


}
