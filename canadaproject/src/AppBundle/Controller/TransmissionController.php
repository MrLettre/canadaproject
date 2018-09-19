<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Transmission;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Transmission controller.
 *
 * @Route("transmission")
 */
class TransmissionController extends Controller
{
    /**
     * Lists all transmission entities.
     *
     * @Route("/", name="transmission_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $transmissions = $em->getRepository('AppBundle:Transmission')->findAll();

        return $this->render('Form/transmission/index.html.twig', array(
            'transmissions' => $transmissions,
        ));
    }

    /**
     * Creates a new transmission entity.
     *
     * @Route("/new", name="transmission_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $transmission = new Transmission();
        $form = $this->createForm('AppBundle\Form\TransmissionType', $transmission);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($transmission);
            $em->flush();

            return $this->redirectToRoute('transmission_show', array('id' => $transmission->getId()));
        }

        return $this->render('Form/transmission/new.html.twig', array(
            'transmission' => $transmission,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a transmission entity.
     *
     * @Route("/{id}", name="transmission_show")
     * @Method("GET")
     */
    public function showAction(Transmission $transmission)
    {
        $deleteForm = $this->createDeleteForm($transmission);

        return $this->render('Form/transmission/show.html.twig', array(
            'transmission' => $transmission,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing transmission entity.
     *
     * @Route("/{id}/edit", name="transmission_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Transmission $transmission)
    {
        $deleteForm = $this->createDeleteForm($transmission);
        $editForm = $this->createForm('AppBundle\Form\TransmissionType', $transmission);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('transmission_edit', array('id' => $transmission->getId()));
        }

        return $this->render('Form/transmission/edit.html.twig', array(
            'transmission' => $transmission,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a transmission entity.
     *
     * @Route("/{id}", name="transmission_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Transmission $transmission)
    {
        $form = $this->createDeleteForm($transmission);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($transmission);
            $em->flush();
        }

        return $this->redirectToRoute('transmission_index');
    }

    /**
     * Creates a form to delete a transmission entity.
     *
     * @param Transmission $transmission The transmission entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Transmission $transmission)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('transmission_delete', array('id' => $transmission->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
