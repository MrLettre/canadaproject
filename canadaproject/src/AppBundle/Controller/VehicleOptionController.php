<?php

namespace AppBundle\Controller;

use AppBundle\Entity\VehicleOption;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Vehicleoption controller.
 *
 * @Route("vehicleoption")
 */
class VehicleOptionController extends Controller
{
    /**
     * Lists all vehicleOption entities.
     *
     * @Route("/", name="vehicleoption_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $vehicleOptions = $em->getRepository('AppBundle:VehicleOption')->findAll();

        return $this->render('vehicleoption/index.html.twig', array(
            'vehicleOptions' => $vehicleOptions,
        ));
    }

    /**
     * Creates a new vehicleOption entity.
     *
     * @Route("/new", name="vehicleoption_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $vehicleOption = new Vehicleoption();
        $form = $this->createForm('AppBundle\Form\VehicleOptionType', $vehicleOption);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($vehicleOption);
            $em->flush();

            return $this->redirectToRoute('vehicleoption_show', array('id' => $vehicleOption->getId()));
        }

        return $this->render('vehicleoption/new.html.twig', array(
            'vehicleOption' => $vehicleOption,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a vehicleOption entity.
     *
     * @Route("/{id}", name="vehicleoption_show")
     * @Method("GET")
     */
    public function showAction(VehicleOption $vehicleOption)
    {
        $deleteForm = $this->createDeleteForm($vehicleOption);

        return $this->render('vehicleoption/show.html.twig', array(
            'vehicleOption' => $vehicleOption,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing vehicleOption entity.
     *
     * @Route("/{id}/edit", name="vehicleoption_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, VehicleOption $vehicleOption)
    {
        $deleteForm = $this->createDeleteForm($vehicleOption);
        $editForm = $this->createForm('AppBundle\Form\VehicleOptionType', $vehicleOption);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('vehicleoption_edit', array('id' => $vehicleOption->getId()));
        }

        return $this->render('vehicleoption/edit.html.twig', array(
            'vehicleOption' => $vehicleOption,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a vehicleOption entity.
     *
     * @Route("/{id}", name="vehicleoption_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, VehicleOption $vehicleOption)
    {
        $form = $this->createDeleteForm($vehicleOption);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($vehicleOption);
            $em->flush();
        }

        return $this->redirectToRoute('vehicleoption_index');
    }

    /**
     * Creates a form to delete a vehicleOption entity.
     *
     * @param VehicleOption $vehicleOption The vehicleOption entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(VehicleOption $vehicleOption)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('vehicleoption_delete', array('id' => $vehicleOption->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
