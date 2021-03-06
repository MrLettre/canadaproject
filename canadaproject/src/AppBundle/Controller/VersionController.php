<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Version;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Version controller.
 *
 * @Route("version")
 */
class VersionController extends Controller
{
    /**
     * Lists all version entities.
     *
     * @Route("/", name="version_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $versions = $em->getRepository('AppBundle:Version')->findAll();

        return $this->render('Form/version/index.html.twig', array(
            'versions' => $versions,
        ));
    }

    /**
     * Creates a new version entity.
     *
     * @Route("/new", name="version_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $version = new Version();
        $form = $this->createForm('AppBundle\Form\VersionType', $version);
        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('AppBundle:CategorieOptions')->findAll();

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $optionsString = $_POST["appbundle_version"]["tableauOption"];
            $options = explode(",", $optionsString);

            foreach ($options as $value){
                $em = $this->getDoctrine()->getManager();
                $objetOption = $em->getRepository('AppBundle:VehicleOption')->findOneBy(array('id' => $value));
                $version->addOption($objetOption);
                $version->setActif('1');
                $em->persist($version);
            }
            $em->persist($version);
            $em->flush();

            return $this->redirectToRoute('vehicledefinition_new');
        }

        return $this->render('Form/version/new.html.twig', array(
            'version' => $version,
            'categories' => $categories,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a version entity.
     *
     * @Route("/{id}", name="version_show")
     * @Method("GET")
     */
    public function showAction(Version $version)
    {
        $deleteForm = $this->createDeleteForm($version);

        return $this->render('Form/version/show.html.twig', array(
            'version' => $version,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing version entity.
     *
     * @Route("/{id}/edit", name="version_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Version $version)
    {
        $deleteForm = $this->createDeleteForm($version);
        $editForm = $this->createForm('AppBundle\Form\VersionType', $version);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('version_edit', array('id' => $version->getId()));
        }

        return $this->render('Form/version/edit.html.twig', array(
            'version' => $version,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a version entity.
     *
     * @Route("/{id}", name="version_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Version $version)
    {
        $form = $this->createDeleteForm($version);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($version);
            $em->flush();
        }

        return $this->redirectToRoute('version_index');
    }

    /**
     * Creates a form to delete a version entity.
     *
     * @param Version $version The version entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Version $version)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('version_delete', array('id' => $version->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
