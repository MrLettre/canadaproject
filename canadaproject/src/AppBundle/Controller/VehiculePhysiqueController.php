<?php

namespace AppBundle\Controller;

use AppBundle\Entity\VehiculePhysique;
use AppBundle\Entity\VehicleDefinition;
use AppBundle\Entity\Vente;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Vehiculephysique controller.
 *
 * @Route("vehiculephysique")
 */
class VehiculePhysiqueController extends Controller
{
    /**
     * Lists all vehiculePhysique entities.
     *
     * @Route("/", name="vehiculephysique_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $vehiculePhysiques = $em->getRepository('AppBundle:VehiculePhysique')->findAll();

        return $this->render('Form/vehiculephysique/index.html.twig', array(
            'vehiculePhysiques' => $vehiculePhysiques,
        ));
    }

    /**
     * Creates a new vehiculePhysique entity.
     *
     * @Route("/new", name="vehiculephysique_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $vehiculePhysique = new Vehiculephysique();
        $form = $this->createForm('AppBundle\Form\VehiculePhysiqueType', $vehiculePhysique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($vehiculePhysique);
            $em->flush();

            return $this->redirectToRoute('vehiculephysique_show', array('id' => $vehiculePhysique->getId()));
        }

        return $this->render('Form/vehiculephysique/new.html.twig', array(
            'vehiculePhysique' => $vehiculePhysique,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a vehiculePhysique entity.
     *
     * @Route("/{id}/lol", name="vehiculephysique_show")
     * @Method("GET")
     */
    public function showAction(VehiculePhysique $vehiculePhysique)
    {
        $deleteForm = $this->createDeleteForm($vehiculePhysique);

        return $this->render('Form/vehiculephysique/show.html.twig', array(
            'vehiculePhysique' => $vehiculePhysique,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing vehiculePhysique entity.
     *
     * @Route("/{id}/edit", name="vehiculephysique_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, VehiculePhysique $vehiculePhysique)
    {
        $deleteForm = $this->createDeleteForm($vehiculePhysique);
        $editForm = $this->createForm('AppBundle\Form\VehiculePhysiqueType', $vehiculePhysique);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('vehiculephysique_edit', array('id' => $vehiculePhysique->getId()));
        }

        return $this->render('Form/vehiculephysique/edit.html.twig', array(
            'vehiculePhysique' => $vehiculePhysique,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a vehiculePhysique entity.
     *
     * @Route("/{id}/lol", name="vehiculephysique_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, VehiculePhysique $vehiculePhysique)
    {
        $form = $this->createDeleteForm($vehiculePhysique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($vehiculePhysique);
            $em->flush();
        }

        return $this->redirectToRoute('vehiculephysique_index');
    }

    /**
     * Creates a form to delete a vehiculePhysique entity.
     *
     * @param VehiculePhysique $vehiculePhysique The vehiculePhysique entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(VehiculePhysique $vehiculePhysique)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('vehiculephysique_delete', array('id' => $vehiculePhysique->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }


        /**
     * Finds and displays a vehiculePhysique entity.
     *
     * @Route("/{id}", name="vehiculephysique_show")
     * @Method("GET")
     */
    public function ficheProduit(VehiculePhysique $vehiculePhysique, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $id = $id;
        $voituredef = $em->getRepository('AppBundle:VehicleDefinition')->findByid(['id' => $id]); 
        $voiturephy = $em->getRepository('AppBundle:VehiculePhysique')->findByid(['id' => $id]);

        return $this->render('pagesCarifyPublic/recherche/ficheProduit.html.twig', [
            'voituredef' => $voituredef,
            'voiturephy' => $voiturephy,
        ]);
    } 
}

Â