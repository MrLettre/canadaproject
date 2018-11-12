<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ModeDeLivraison;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Modedelivraison controller.
 *
 * @Route("modedelivraison")
 */
class ModeDeLivraisonController extends Controller
{
    /**
     * Lists all modeDeLivraison entities.
     *
     * @Route("/", name="modedelivraison_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $modeDeLivraisons = $em->getRepository('AppBundle:ModeDeLivraison')->findAll();

        return $this->render('modedelivraison/index.html.twig', array(
            'modeDeLivraisons' => $modeDeLivraisons,
        ));
    }

    /**
     * Creates a new modeDeLivraison entity.
     *
     * @Route("/new", name="modedelivraison_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $modeDeLivraison = new Modedelivraison();
        $form = $this->createForm('AppBundle\Form\ModeDeLivraisonType', $modeDeLivraison);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($modeDeLivraison);
            $em->flush();

            return $this->redirectToRoute('modedelivraison_show', array('id' => $modeDeLivraison->getId()));
        }

        return $this->render('modedelivraison/new.html.twig', array(
            'modeDeLivraison' => $modeDeLivraison,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a modeDeLivraison entity.
     *
     * @Route("/{id}", name="modedelivraison_show")
     * @Method("GET")
     */
    public function showAction(ModeDeLivraison $modeDeLivraison)
    {
        $deleteForm = $this->createDeleteForm($modeDeLivraison);

        return $this->render('modedelivraison/show.html.twig', array(
            'modeDeLivraison' => $modeDeLivraison,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing modeDeLivraison entity.
     *
     * @Route("/{id}/edit", name="modedelivraison_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ModeDeLivraison $modeDeLivraison)
    {
        $deleteForm = $this->createDeleteForm($modeDeLivraison);
        $editForm = $this->createForm('AppBundle\Form\ModeDeLivraisonType', $modeDeLivraison);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('modedelivraison_edit', array('id' => $modeDeLivraison->getId()));
        }

        return $this->render('modedelivraison/edit.html.twig', array(
            'modeDeLivraison' => $modeDeLivraison,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a modeDeLivraison entity.
     *
     * @Route("/{id}", name="modedelivraison_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ModeDeLivraison $modeDeLivraison)
    {
        $form = $this->createDeleteForm($modeDeLivraison);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($modeDeLivraison);
            $em->flush();
        }

        return $this->redirectToRoute('modedelivraison_index');
    }

    /**
     * Creates a form to delete a modeDeLivraison entity.
     *
     * @param ModeDeLivraison $modeDeLivraison The modeDeLivraison entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ModeDeLivraison $modeDeLivraison)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('modedelivraison_delete', array('id' => $modeDeLivraison->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
