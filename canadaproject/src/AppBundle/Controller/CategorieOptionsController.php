<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CategorieOptions;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Categorieoption controller.
 *
 * @Route("categorieoptions")
 */
class CategorieOptionsController extends Controller
{
    /**
     * Lists all categorieOption entities.
     *
     * @Route("/", name="categorieoptions_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $categorieOptions = $em->getRepository('AppBundle:CategorieOptions')->findAll();

        return $this->render('categorieoptions/index.html.twig', array(
            'categorieOptions' => $categorieOptions,
        ));
    }

    /**
     * Creates a new categorieOption entity.
     *
     * @Route("/new", name="categorieoptions_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $categorieOption = new Categorieoption();
        $form = $this->createForm('AppBundle\Form\CategorieOptionsType', $categorieOption);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($categorieOption);
            $em->flush();

            return $this->redirectToRoute('categorieoptions_show', array('id' => $categorieOption->getId()));
        }

        return $this->render('categorieoptions/new.html.twig', array(
            'categorieOption' => $categorieOption,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a categorieOption entity.
     *
     * @Route("/{id}", name="categorieoptions_show")
     * @Method("GET")
     */
    public function showAction(CategorieOptions $categorieOption)
    {
        $deleteForm = $this->createDeleteForm($categorieOption);

        return $this->render('categorieoptions/show.html.twig', array(
            'categorieOption' => $categorieOption,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing categorieOption entity.
     *
     * @Route("/{id}/edit", name="categorieoptions_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CategorieOptions $categorieOption)
    {
        $deleteForm = $this->createDeleteForm($categorieOption);
        $editForm = $this->createForm('AppBundle\Form\CategorieOptionsType', $categorieOption);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('categorieoptions_edit', array('id' => $categorieOption->getId()));
        }

        return $this->render('categorieoptions/edit.html.twig', array(
            'categorieOption' => $categorieOption,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a categorieOption entity.
     *
     * @Route("/{id}", name="categorieoptions_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CategorieOptions $categorieOption)
    {
        $form = $this->createDeleteForm($categorieOption);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($categorieOption);
            $em->flush();
        }

        return $this->redirectToRoute('categorieoptions_index');
    }

    /**
     * Creates a form to delete a categorieOption entity.
     *
     * @param CategorieOptions $categorieOption The categorieOption entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CategorieOptions $categorieOption)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('categorieoptions_delete', array('id' => $categorieOption->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
