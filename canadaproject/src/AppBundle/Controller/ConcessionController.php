<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Concession;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Concession controller.
 *
 * @Route("concession")
 */
class ConcessionController extends Controller
{
    /**
     * Lists all concession entities.
     *
     * @Route("/", name="concession_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $concessions = $em->getRepository('AppBundle:Concession')->findAll();

        return $this->render('concession/index.html.twig', array(
            'concessions' => $concessions,
        ));
    }

    /**
     * Creates a new concession entity.
     *
     * @Route("/new", name="concession_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $concession = new Concession();
        $form = $this->createForm('AppBundle\Form\ConcessionType', $concession);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($concession);
            $em->flush();

            return $this->redirectToRoute('concession_show', array('id' => $concession->getId()));
        }

        return $this->render('concession/new.html.twig', array(
            'concession' => $concession,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a concession entity.
     *
     * @Route("/{id}", name="concession_show")
     * @Method("GET")
     */
    public function showAction(Concession $concession)
    {
        $deleteForm = $this->createDeleteForm($concession);

        return $this->render('concession/show.html.twig', array(
            'concession' => $concession,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing concession entity.
     *
     * @Route("/{id}/edit", name="concession_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Concession $concession)
    {
        $deleteForm = $this->createDeleteForm($concession);
        $editForm = $this->createForm('AppBundle\Form\ConcessionType', $concession);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('concession_edit', array('id' => $concession->getId()));
        }

        return $this->render('concession/edit.html.twig', array(
            'concession' => $concession,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a concession entity.
     *
     * @Route("/{id}", name="concession_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Concession $concession)
    {
        $form = $this->createDeleteForm($concession);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($concession);
            $em->flush();
        }

        return $this->redirectToRoute('concession_index');
    }

    /**
     * Creates a form to delete a concession entity.
     *
     * @param Concession $concession The concession entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Concession $concession)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('concession_delete', array('id' => $concession->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
