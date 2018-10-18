<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CartContent;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Cartcontent controller.
 *
 * @Route("cartcontent")
 */
class CartContentController extends Controller
{
    /**
     * Lists all cartContent entities.
     *
     * @Route("/", name="cartcontent_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cartContents = $em->getRepository('AppBundle:CartContent')->findAll();

        return $this->render('cartcontent/index.html.twig', array(
            'cartContents' => $cartContents,
        ));
    }

    /**
     * Creates a new cartContent entity.
     *
     * @Route("/new", name="cartcontent_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $cartContent = new Cartcontent();
        $form = $this->createForm('AppBundle\Form\CartContentType', $cartContent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cartContent);
            $em->flush();

            return $this->redirectToRoute('cartcontent_show', array('id' => $cartContent->getId()));
        }

        return $this->render('cartcontent/new.html.twig', array(
            'cartContent' => $cartContent,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a cartContent entity.
     *
     * @Route("/{id}", name="cartcontent_show")
     * @Method("GET")
     */
    public function showAction(CartContent $cartContent)
    {
        $deleteForm = $this->createDeleteForm($cartContent);

        return $this->render('cartcontent/show.html.twig', array(
            'cartContent' => $cartContent,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing cartContent entity.
     *
     * @Route("/{id}/edit", name="cartcontent_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CartContent $cartContent)
    {
        $deleteForm = $this->createDeleteForm($cartContent);
        $editForm = $this->createForm('AppBundle\Form\CartContentType', $cartContent);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cartcontent_edit', array('id' => $cartContent->getId()));
        }

        return $this->render('cartcontent/edit.html.twig', array(
            'cartContent' => $cartContent,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a cartContent entity.
     *
     * @Route("/{id}", name="cartcontent_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CartContent $cartContent)
    {
        $form = $this->createDeleteForm($cartContent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cartContent);
            $em->flush();
        }

        return $this->redirectToRoute('cartcontent_index');
    }

    /**
     * Creates a form to delete a cartContent entity.
     *
     * @param CartContent $cartContent The cartContent entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CartContent $cartContent)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cartcontent_delete', array('id' => $cartContent->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
