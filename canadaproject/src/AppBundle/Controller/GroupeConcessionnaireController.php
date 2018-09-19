<?php

namespace AppBundle\Controller;

use AppBundle\Entity\GroupeConcessionnaire;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Groupeconcessionnaire controller.
 *
 * @Route("groupeconcessionnaire")
 */
class GroupeConcessionnaireController extends Controller
{
    /**
     * Lists all groupeConcessionnaire entities.
     *
     * @Route("/", name="groupeconcessionnaire_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $groupeConcessionnaires = $em->getRepository('AppBundle:GroupeConcessionnaire')->findAll();

        return $this->render('Form/groupeconcessionnaire/index.html.twig', array(
            'groupeConcessionnaires' => $groupeConcessionnaires,
        ));
    }

    /**
     * Creates a new groupeConcessionnaire entity.
     *
     * @Route("/new", name="groupeconcessionnaire_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $groupeConcessionnaire = new Groupeconcessionnaire();
        $form = $this->createForm('AppBundle\Form\GroupeConcessionnaireType', $groupeConcessionnaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($groupeConcessionnaire);
            $em->flush();

            return $this->redirectToRoute('groupeconcessionnaire_show', array('id' => $groupeConcessionnaire->getId()));
        }

        return $this->render('Form/groupeconcessionnaire/new.html.twig', array(
            'groupeConcessionnaire' => $groupeConcessionnaire,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a groupeConcessionnaire entity.
     *
     * @Route("/{id}", name="groupeconcessionnaire_show")
     * @Method("GET")
     */
    public function showAction(GroupeConcessionnaire $groupeConcessionnaire)
    {
        $deleteForm = $this->createDeleteForm($groupeConcessionnaire);

        return $this->render('Form/groupeconcessionnaire/show.html.twig', array(
            'groupeConcessionnaire' => $groupeConcessionnaire,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing groupeConcessionnaire entity.
     *
     * @Route("/{id}/edit", name="groupeconcessionnaire_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, GroupeConcessionnaire $groupeConcessionnaire)
    {
        $deleteForm = $this->createDeleteForm($groupeConcessionnaire);
        $editForm = $this->createForm('AppBundle\Form\GroupeConcessionnaireType', $groupeConcessionnaire);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('groupeconcessionnaire_edit', array('id' => $groupeConcessionnaire->getId()));
        }

        return $this->render('Form/groupeconcessionnaire/edit.html.twig', array(
            'groupeConcessionnaire' => $groupeConcessionnaire,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a groupeConcessionnaire entity.
     *
     * @Route("/{id}", name="groupeconcessionnaire_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, GroupeConcessionnaire $groupeConcessionnaire)
    {
        $form = $this->createDeleteForm($groupeConcessionnaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($groupeConcessionnaire);
            $em->flush();
        }

        return $this->redirectToRoute('groupeconcessionnaire_index');
    }

    /**
     * Creates a form to delete a groupeConcessionnaire entity.
     *
     * @param GroupeConcessionnaire $groupeConcessionnaire The groupeConcessionnaire entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(GroupeConcessionnaire $groupeConcessionnaire)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('groupeconcessionnaire_delete', array('id' => $groupeConcessionnaire->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
