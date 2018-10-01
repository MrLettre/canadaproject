<?php

namespace AppBundle\Controller;

use AppBundle\Entity\VehicleDefinition;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Vehicledefinition controller.
 *
 * @Route("vehicledefinition")
 */
class VehicleDefinitionController extends Controller
{
    /**
     * Lists all vehicleDefinition entities.
     *
     * @Route("/", name="vehicledefinition_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $vehicleDefinitions = $em->getRepository('AppBundle:VehicleDefinition')->findAll();

        return $this->render('Form/vehicledefinition/index.html.twig', array(
            'vehicleDefinitions' => $vehicleDefinitions,
        ));
    }

    /**
     * Creates a new vehicleDefinition entity.
     *
     * @Route("/new", name="vehicledefinition_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $vehicleDefinition = new Vehicledefinition();
        $form = $this->createForm('AppBundle\Form\VehicleDefinitionType', $vehicleDefinition);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($vehicleDefinition);
            $em->flush();

            return $this->redirectToRoute('vehicledefinition_index');
        }

        return $this->render('Form/vehicledefinition/new.html.twig', array(
            'vehicleDefinition' => $vehicleDefinition,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a vehicleDefinition entity.
     *
     * @Route("/{id}", name="vehicledefinition_show")
     * @Method("GET")
     */
    public function showAction(VehicleDefinition $vehicleDefinition)
    {
        $deleteForm = $this->createDeleteForm($vehicleDefinition);

        return $this->render('Form/vehicledefinition/show.html.twig', array(
            'vehicleDefinition' => $vehicleDefinition,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing vehicleDefinition entity.
     *
     * @Route("/{id}/edit", name="vehicledefinition_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, VehicleDefinition $vehicleDefinition)
    {
        $deleteForm = $this->createDeleteForm($vehicleDefinition);
        $editForm = $this->createForm('AppBundle\Form\VehicleDefinitionType', $vehicleDefinition);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('vehicledefinition_edit', array('id' => $vehicleDefinition->getId()));
        }

        return $this->render('Form/vehicledefinition/edit.html.twig', array(
            'vehicleDefinition' => $vehicleDefinition,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a vehicleDefinition entity.
     *
     * @Route("/{id}", name="vehicledefinition_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, VehicleDefinition $vehicleDefinition)
    {
        $form = $this->createDeleteForm($vehicleDefinition);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($vehicleDefinition);
            $em->flush();
        }

        return $this->redirectToRoute('vehicledefinition_index');
    }

    /**
     * Creates a form to delete a vehicleDefinition entity.
     *
     * @param VehicleDefinition $vehicleDefinition The vehicleDefinition entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(VehicleDefinition $vehicleDefinition)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('vehicledefinition_delete', array('id' => $vehicleDefinition->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
