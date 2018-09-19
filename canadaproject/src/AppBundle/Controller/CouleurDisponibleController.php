<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CouleurDisponible;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Couleurdisponible controller.
 *
 * @Route("couleurdisponible")
 */
class CouleurDisponibleController extends Controller
{
    /**
     * Lists all couleurDisponible entities.
     *
     * @Route("/", name="couleurdisponible_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $couleurDisponibles = $em->getRepository('AppBundle:CouleurDisponible')->findAll();

        return $this->render('Form/couleurdisponible/index.html.twig', array(
            'couleurDisponibles' => $couleurDisponibles,
        ));
    }

    /**
     * Creates a new couleurDisponible entity.
     *
     * @Route("/new", name="couleurdisponible_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $couleurDisponible = new Couleurdisponible();
        $form = $this->createForm('AppBundle\Form\CouleurDisponibleType', $couleurDisponible);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($couleurDisponible);
            $em->flush();

            return $this->redirectToRoute('couleurdisponible_show', array('id' => $couleurDisponible->getId()));
        }

        return $this->render('Form/couleurdisponible/new.html.twig', array(
            'couleurDisponible' => $couleurDisponible,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a couleurDisponible entity.
     *
     * @Route("/{id}", name="couleurdisponible_show")
     * @Method("GET")
     */
    public function showAction(CouleurDisponible $couleurDisponible)
    {
        $deleteForm = $this->createDeleteForm($couleurDisponible);

        return $this->render('Form/couleurdisponible/show.html.twig', array(
            'couleurDisponible' => $couleurDisponible,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing couleurDisponible entity.
     *
     * @Route("/{id}/edit", name="couleurdisponible_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CouleurDisponible $couleurDisponible)
    {
        $deleteForm = $this->createDeleteForm($couleurDisponible);
        $editForm = $this->createForm('AppBundle\Form\CouleurDisponibleType', $couleurDisponible);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('couleurdisponible_edit', array('id' => $couleurDisponible->getId()));
        }

        return $this->render('Form/couleurdisponible/edit.html.twig', array(
            'couleurDisponible' => $couleurDisponible,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a couleurDisponible entity.
     *
     * @Route("/{id}", name="couleurdisponible_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CouleurDisponible $couleurDisponible)
    {
        $form = $this->createDeleteForm($couleurDisponible);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($couleurDisponible);
            $em->flush();
        }

        return $this->redirectToRoute('couleurdisponible_index');
    }

    /**
     * Creates a form to delete a couleurDisponible entity.
     *
     * @param CouleurDisponible $couleurDisponible The couleurDisponible entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CouleurDisponible $couleurDisponible)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('couleurdisponible_delete', array('id' => $couleurDisponible->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
