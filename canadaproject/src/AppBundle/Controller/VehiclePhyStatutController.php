<?php

namespace AppBundle\Controller;

use AppBundle\Entity\VehiclePhyStatut;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Vehiclephystatut controller.
 *
 * @Route("vehiclephystatut")
 */
class VehiclePhyStatutController extends Controller
{
    /**
     * Lists all vehiclePhyStatut entities.
     *
     * @Route("/", name="vehiclephystatut_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $vehiclePhyStatuts = $em->getRepository('AppBundle:VehiclePhyStatut')->findAll();

        return $this->render('Form/vehiclephystatut/index.html.twig', array(
            'vehiclePhyStatuts' => $vehiclePhyStatuts,
        ));
    }

    /**
     * Creates a new vehiclePhyStatut entity.
     *
     * @Route("/new", name="vehiclephystatut_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $vehiclePhyStatut = new Vehiclephystatut();
        $form = $this->createForm('AppBundle\Form\VehiclePhyStatutType', $vehiclePhyStatut);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($vehiclePhyStatut);
            $em->flush();

            return $this->redirectToRoute('vehiclephystatut_show', array('id' => $vehiclePhyStatut->getId()));
        }

        return $this->render('Form/vehiclephystatut/new.html.twig', array(
            'vehiclePhyStatut' => $vehiclePhyStatut,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a vehiclePhyStatut entity.
     *
     * @Route("/{id}", name="vehiclephystatut_show")
     * @Method("GET")
     */
    public function showAction(VehiclePhyStatut $vehiclePhyStatut)
    {
        $deleteForm = $this->createDeleteForm($vehiclePhyStatut);

        return $this->render('Form/vehiclephystatut/show.html.twig', array(
            'vehiclePhyStatut' => $vehiclePhyStatut,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing vehiclePhyStatut entity.
     *
     * @Route("/{id}/edit", name="vehiclephystatut_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, VehiclePhyStatut $vehiclePhyStatut)
    {
        $deleteForm = $this->createDeleteForm($vehiclePhyStatut);
        $editForm = $this->createForm('AppBundle\Form\VehiclePhyStatutType', $vehiclePhyStatut);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('vehiclephystatut_edit', array('id' => $vehiclePhyStatut->getId()));
        }

        return $this->render('Form/vehiclephystatut/edit.html.twig', array(
            'vehiclePhyStatut' => $vehiclePhyStatut,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a vehiclePhyStatut entity.
     *
     * @Route("/{id}", name="vehiclephystatut_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, VehiclePhyStatut $vehiclePhyStatut)
    {
        $form = $this->createDeleteForm($vehiclePhyStatut);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($vehiclePhyStatut);
            $em->flush();
        }

        return $this->redirectToRoute('vehiclephystatut_index');
    }

    /**
     * Creates a form to delete a vehiclePhyStatut entity.
     *
     * @param VehiclePhyStatut $vehiclePhyStatut The vehiclePhyStatut entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(VehiclePhyStatut $vehiclePhyStatut)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('vehiclephystatut_delete', array('id' => $vehiclePhyStatut->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
