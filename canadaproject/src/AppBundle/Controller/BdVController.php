<?php

namespace AppBundle\Controller;

use AppBundle\Entity\BdV;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * BdV controller.
 *
 * @Route("bdv")
 */
class BdVController extends Controller
{
    /**
     * Lists all bdv entities.
     *
     * @Route("/", name="bdv_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $bdvs = $em->getRepository('AppBundle:BdV')->findAll();

        return $this->render('bdv/index.html.twig', array(
            'bdvs' => $bdvs,
        ));
    }

    /**
     * Creates a new bdv entity.
     *
     * @Route("/new", name="bdv_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $bdv = new BdV();
        $form = $this->createForm('AppBundle\Form\BdVType', $bdv);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($bdv);
            $em->flush();

            return $this->redirectToRoute('bdv_show', array('id' => $bdv->getId()));
        }

        return $this->render('bdv/new.html.twig', array(
            'bdv' => $bdv,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a bdv entity.
     *
     * @Route("/{id}", name="bdv_show")
     * @Method("GET")
     */
    public function showAction(BdV $bdv)
    {
        $deleteForm = $this->createDeleteForm($bdv);

        return $this->render('bdv/show.html.twig', array(
            'bdv' => $bdv,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing bdv entity.
     *
     * @Route("/{id}/edit", name="bdv_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, BdV $bdv)
    {
        $deleteForm = $this->createDeleteForm($bdv);
        $editForm = $this->createForm('AppBundle\Form\BdVType', $bdv);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('bdv_edit', array('id' => $bdv->getId()));
        }

        return $this->render('bdv/edit.html.twig', array(
            'bdv' => $bdv,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a bdv entity.
     *
     * @Route("/{id}", name="bdv_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, BdV $bdv)
    {
        $form = $this->createDeleteForm($bdv);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($bdv);
            $em->flush();
        }

        return $this->redirectToRoute('bdv_index');
    }

    /**
     * Creates a form to delete a bdv entity.
     *
     * @param BdV $bdv The bdv entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(BdV $bdv)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('bdv_delete', array('id' => $bdv->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
