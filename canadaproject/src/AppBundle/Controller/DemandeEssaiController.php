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
     * Lists all demandeEssai entities.
     *
     * @Route("/", name="demandeessai_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $demandeEssais = $em->getRepository('AppBundle:DemandeEssai')->findAll();

        return $this->render('demandeessai/index.html.twig', array(
            'demandeEssais' => $demandeEssais,
        ));
    }

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
        $deleteForm = $this->createDeleteForm($demandeEssai);

        return $this->render('demandeessai/show.html.twig', array(
            'demandeEssai' => $demandeEssai,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing demandeEssai entity.
     *
     * @Route("/{id}/edit", name="demandeessai_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, DemandeEssai $demandeEssai)
    {
        $deleteForm = $this->createDeleteForm($demandeEssai);
        $editForm = $this->createForm('AppBundle\Form\DemandeEssaiType', $demandeEssai);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('demandeessai_edit', array('id' => $demandeEssai->getId()));
        }

        return $this->render('demandeessai/edit.html.twig', array(
            'demandeEssai' => $demandeEssai,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a demandeEssai entity.
     *
     * @Route("/{id}", name="demandeessai_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, DemandeEssai $demandeEssai)
    {
        $form = $this->createDeleteForm($demandeEssai);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($demandeEssai);
            $em->flush();
        }

        return $this->redirectToRoute('demandeessai_index');
    }

    /**
     * Creates a form to delete a demandeEssai entity.
     *
     * @param DemandeEssai $demandeEssai The demandeEssai entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(DemandeEssai $demandeEssai)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('demandeessai_delete', array('id' => $demandeEssai->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
