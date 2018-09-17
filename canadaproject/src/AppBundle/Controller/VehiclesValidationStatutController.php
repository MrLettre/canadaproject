<?php

namespace AppBundle\Controller;

use AppBundle\Entity\VehiclesValidationStatut;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Vehiclesvalidationstatut controller.
 *
 * @Route("vehiclesvalidationstatut")
 */
class VehiclesValidationStatutController extends Controller
{
    /**
     * Lists all vehiclesValidationStatut entities.
     *
     * @Route("/", name="vehiclesvalidationstatut_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $vehiclesValidationStatuts = $em->getRepository('AppBundle:VehiclesValidationStatut')->findAll();

        return $this->render('vehiclesvalidationstatut/index.html.twig', array(
            'vehiclesValidationStatuts' => $vehiclesValidationStatuts,
        ));
    }

    /**
     * Creates a new vehiclesValidationStatut entity.
     *
     * @Route("/new", name="vehiclesvalidationstatut_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $vehiclesValidationStatut = new Vehiclesvalidationstatut();
        $form = $this->createForm('AppBundle\Form\VehiclesValidationStatutType', $vehiclesValidationStatut);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($vehiclesValidationStatut);
            $em->flush();

            return $this->redirectToRoute('vehiclesvalidationstatut_show', array('id' => $vehiclesValidationStatut->getId()));
        }

        return $this->render('vehiclesvalidationstatut/new.html.twig', array(
            'vehiclesValidationStatut' => $vehiclesValidationStatut,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a vehiclesValidationStatut entity.
     *
     * @Route("/{id}", name="vehiclesvalidationstatut_show")
     * @Method("GET")
     */
    public function showAction(VehiclesValidationStatut $vehiclesValidationStatut)
    {
        $deleteForm = $this->createDeleteForm($vehiclesValidationStatut);

        return $this->render('vehiclesvalidationstatut/show.html.twig', array(
            'vehiclesValidationStatut' => $vehiclesValidationStatut,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing vehiclesValidationStatut entity.
     *
     * @Route("/{id}/edit", name="vehiclesvalidationstatut_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, VehiclesValidationStatut $vehiclesValidationStatut)
    {
        $deleteForm = $this->createDeleteForm($vehiclesValidationStatut);
        $editForm = $this->createForm('AppBundle\Form\VehiclesValidationStatutType', $vehiclesValidationStatut);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('vehiclesvalidationstatut_edit', array('id' => $vehiclesValidationStatut->getId()));
        }

        return $this->render('vehiclesvalidationstatut/edit.html.twig', array(
            'vehiclesValidationStatut' => $vehiclesValidationStatut,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a vehiclesValidationStatut entity.
     *
     * @Route("/{id}", name="vehiclesvalidationstatut_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, VehiclesValidationStatut $vehiclesValidationStatut)
    {
        $form = $this->createDeleteForm($vehiclesValidationStatut);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($vehiclesValidationStatut);
            $em->flush();
        }

        return $this->redirectToRoute('vehiclesvalidationstatut_index');
    }

    /**
     * Creates a form to delete a vehiclesValidationStatut entity.
     *
     * @param VehiclesValidationStatut $vehiclesValidationStatut The vehiclesValidationStatut entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(VehiclesValidationStatut $vehiclesValidationStatut)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('vehiclesvalidationstatut_delete', array('id' => $vehiclesValidationStatut->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
