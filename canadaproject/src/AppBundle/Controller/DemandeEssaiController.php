<?php

namespace AppBundle\Controller;

use AppBundle\Entity\DemandeEssai;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Demandeessai controller.
 *
 * @Route("demandeessai")
 */
class DemandeEssaiController extends Controller
{
    /**
     * Lists all demandeEssai entities.
     *
     * @Route("/", name="demandeessai_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $demandeEssais = $em->getRepository('AppBundle:DemandeEssai')->findAll();

        return $this->render('demandeessai/index.html.twig', array(
            'demandeEssais' => $demandeEssais,
        ));
    }

    /**
     * Creates a new demandeEssai entity.
     *
     * @Route("/new", name="demandeessai_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $demandeEssai = new Demandeessai();
        $form = $this->createForm('AppBundle\Form\DemandeEssaiType', $demandeEssai);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($demandeEssai);
            $em->flush();

            return $this->redirectToRoute('demandeessai_show', array('id' => $demandeEssai->getId()));
        }

        return $this->render('demandeessai/new.html.twig', array(
            'demandeEssai' => $demandeEssai,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a demandeEssai entity.
     *
     * @Route("/{id}", name="demandeessai_show")
     * @Method("GET")
     */
    public function showAction(DemandeEssai $demandeEssai)
    {
        $deleteForm = $this->createDeleteForm($demandeEssai);

        return $this->render('demandeessai/show.html.twig', array(
            'demandeEssai' => $demandeEssai,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing demandeEssai entity.
     *
     * @Route("/{id}/edit", name="demandeessai_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, DemandeEssai $demandeEssai)
    {
        $deleteForm = $this->createDeleteForm($demandeEssai);
        $editForm = $this->createForm('AppBundle\Form\DemandeEssaiType', $demandeEssai);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('demandeessai_edit', array('id' => $demandeEssai->getId()));
        }

        return $this->render('demandeessai/edit.html.twig', array(
            'demandeEssai' => $demandeEssai,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a demandeEssai entity.
     *
     * @Route("/{id}", name="demandeessai_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, DemandeEssai $demandeEssai)
    {
        $form = $this->createDeleteForm($demandeEssai);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($demandeEssai);
            $em->flush();
        }

        return $this->redirectToRoute('demandeessai_index');
    }

    /**
     * Creates a form to delete a demandeEssai entity.
     *
     * @param DemandeEssai $demandeEssai The demandeEssai entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(DemandeEssai $demandeEssai)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('demandeessai_delete', array('id' => $demandeEssai->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
