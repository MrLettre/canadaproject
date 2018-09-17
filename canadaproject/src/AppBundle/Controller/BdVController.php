<?php

namespace AppBundle\Controller;

use AppBundle\Entity\BdV;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Bdv controller.
 *
 * @Route("bdv")
 */
class BdVController extends Controller
{
    /**
     * Lists all bdV entities.
     *
     * @Route("/", name="bdv_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $bdVs = $em->getRepository('AppBundle:BdV')->findAll();

        return $this->render('bdv/index.html.twig', array(
            'bdVs' => $bdVs,
        ));
    }

    /**
     * Creates a new bdV entity.
     *
     * @Route("/new", name="bdv_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $bdV = new Bdv();
        $form = $this->createForm('AppBundle\Form\BdVType', $bdV);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($bdV);
            $em->flush();

            return $this->redirectToRoute('bdv_show', array('id' => $bdV->getId()));
        }

        return $this->render('bdv/new.html.twig', array(
            'bdV' => $bdV,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a bdV entity.
     *
     * @Route("/{id}", name="bdv_show")
     * @Method("GET")
     */
    public function showAction(BdV $bdV)
    {
        $deleteForm = $this->createDeleteForm($bdV);

        return $this->render('bdv/show.html.twig', array(
            'bdV' => $bdV,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing bdV entity.
     *
     * @Route("/{id}/edit", name="bdv_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, BdV $bdV)
    {
        $deleteForm = $this->createDeleteForm($bdV);
        $editForm = $this->createForm('AppBundle\Form\BdVType', $bdV);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('bdv_edit', array('id' => $bdV->getId()));
        }

        return $this->render('bdv/edit.html.twig', array(
            'bdV' => $bdV,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a bdV entity.
     *
     * @Route("/{id}", name="bdv_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, BdV $bdV)
    {
        $form = $this->createDeleteForm($bdV);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($bdV);
            $em->flush();
        }

        return $this->redirectToRoute('bdv_index');
    }

    /**
     * Creates a form to delete a bdV entity.
     *
     * @param BdV $bdV The bdV entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(BdV $bdV)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('bdv_delete', array('id' => $bdV->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
