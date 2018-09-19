<?php

namespace AppBundle\Controller;

use AppBundle\Entity\TypeVehicule;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Typevehicule controller.
 *
 * @Route("typevehicule")
 */
class TypeVehiculeController extends Controller
{
    /**
     * Lists all typeVehicule entities.
     *
     * @Route("/", name="typevehicule_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $typeVehicules = $em->getRepository('AppBundle:TypeVehicule')->findAll();

        return $this->render('Form/typevehicule/index.html.twig', array(
            'typeVehicules' => $typeVehicules,
        ));
    }

    /**
     * Creates a new typeVehicule entity.
     *
     * @Route("/new", name="typevehicule_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $typeVehicule = new Typevehicule();
        $form = $this->createForm('AppBundle\Form\TypeVehiculeType', $typeVehicule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($typeVehicule);
            $em->flush();

            return $this->redirectToRoute('typevehicule_show', array('id' => $typeVehicule->getId()));
        }

        return $this->render('Form/typevehicule/new.html.twig', array(
            'typeVehicule' => $typeVehicule,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a typeVehicule entity.
     *
     * @Route("/{id}", name="typevehicule_show")
     * @Method("GET")
     */
    public function showAction(TypeVehicule $typeVehicule)
    {
        $deleteForm = $this->createDeleteForm($typeVehicule);

        return $this->render('Form/typevehicule/show.html.twig', array(
            'typeVehicule' => $typeVehicule,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing typeVehicule entity.
     *
     * @Route("/{id}/edit", name="typevehicule_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TypeVehicule $typeVehicule)
    {
        $deleteForm = $this->createDeleteForm($typeVehicule);
        $editForm = $this->createForm('AppBundle\Form\TypeVehiculeType', $typeVehicule);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('typevehicule_edit', array('id' => $typeVehicule->getId()));
        }

        return $this->render('Form/typevehicule/edit.html.twig', array(
            'typeVehicule' => $typeVehicule,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a typeVehicule entity.
     *
     * @Route("/{id}", name="typevehicule_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, TypeVehicule $typeVehicule)
    {
        $form = $this->createDeleteForm($typeVehicule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($typeVehicule);
            $em->flush();
        }

        return $this->redirectToRoute('typevehicule_index');
    }

    /**
     * Creates a form to delete a typeVehicule entity.
     *
     * @param TypeVehicule $typeVehicule The typeVehicule entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TypeVehicule $typeVehicule)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('typevehicule_delete', array('id' => $typeVehicule->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
