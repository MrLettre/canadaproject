<?php

namespace AppBundle\Controller;

use AppBundle\Entity\VehiclePhyStatut;
use AppBundle\Entity\VehiclesValidationStatut;
use AppBundle\Entity\VehiculePhysique;
use AppBundle\Entity\VehicleDefinition;
use AppBundle\Entity\Vente;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use AppBundle\Form\TaskType;
use Symfony\Component\HttpFoundation\Request;

/**
 * Vehiculephysique controller.
 *
 * @Route("vehiculephysique")
 */
class VehiculePhysiqueController extends Controller
{

    /**
     * Creates a new vehiculePhysique entity.
     *
     * @Route("/new", name="vehiculephysique_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $vehiculePhysique = new Vehiculephysique();
        $form = $this->createForm('AppBundle\Form\VehiculePhysiqueType', $vehiculePhysique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $user = $this->getUser();
            $concession = $user->getConcession();
            $vehiculePhysique->setConcession($concession);
            $ref= 'VEHPHY'.'-'.$concession.rand(0, 99999);
            $vehiculePhysique->setReferenceVehPhy($ref);
            $optionsVersion = $vehiculePhysique->getVersion()->getOptions();

            foreach ($optionsVersion as $value){
                $vehiculePhysique->addOption($value);
                $em->persist($vehiculePhysique);
            }

            $em->persist($vehiculePhysique);
            $em->flush();

            return $this->redirectToRoute('vehiculephysique_new_Options', array('id' => $vehiculePhysique->getId()));
        }

        return $this->render('Form/vehiculephysique/new.html.twig', array(
            'vehiculePhysique' => $vehiculePhysique,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a new vehiculePhysique entity.
     *
     * @Route("/{id}/options", name="vehiculephysique_new_Options")
     * @Method({"GET", "POST"})
     */
    public function newOptionsAction(Request $request, VehiculePhysique $vehiculePhysique)
    {

        $em = $this->getDoctrine()->getManager();

        $optionsV = $vehiculePhysique->getOptions();
        $oVer = $optionsV->toArray();
        $optionsVer = [];

        foreach ($oVer as $value){
            $optionsVer[] = $value->getId();
        }

       $options= $em->getRepository('AppBundle:VehicleOption')->findOptionsWithoutOptionsVersion($optionsVer);



        //if ($form->isSubmitted() && $form->isValid()) {
        //    foreach ($options as $value){
        //        $vehiculePhysique->addOption($value);
        //        $em->persist($vehiculePhysique);
        //    }
        //    $em->persist($vehiculePhysique);
        //    $em->flush();
        //    return $this->redirectToRoute('vehiculephysique_index', array('id' => $vehiculePhysique->getId()));
        //}

        return $this->render('Form/vehiculephysique/ajoutOptions.html.twig', array(
            'vehiculePhysique' => $vehiculePhysique,
            'options' => $options,
            'optionsV' => $optionsV,
        ));
    }


    /**
     * Finds and displays a vehiculePhysique entity.
     *
     * @Route("/{id}/show", name="vehiculephysique_show")
     * @Method("GET")
     */
    public function showAction(VehiculePhysique $vehiculePhysique)
    {
        $deleteForm = $this->createDeleteForm($vehiculePhysique);

        return $this->render('Form/vehiculephysique/show.html.twig', array(
            'vehiculePhysique' => $vehiculePhysique,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing vehiculePhysique entity.
     *
     * @Route("/{id}/edit", name="vehiculephysique_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, VehiculePhysique $vehiculePhysique)
    {
        $deleteForm = $this->createDeleteForm($vehiculePhysique);
        $editForm = $this->createForm('AppBundle\Form\VehiculePhysiqueType', $vehiculePhysique);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('vehiculephysique_edit', array('id' => $vehiculePhysique->getId()));
        }

        return $this->render('Form/vehiculephysique/edit.html.twig', array(
            'vehiculePhysique' => $vehiculePhysique,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a vehiculePhysique entity.
     *
     * @Route("/{id}/lol", name="vehiculephysique_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, VehiculePhysique $vehiculePhysique)
    {
        $form = $this->createDeleteForm($vehiculePhysique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($vehiculePhysique);
            $em->flush();
        }

        return $this->redirectToRoute('vehiculephysique_index');
    }

    /**
     * Creates a form to delete a vehiculePhysique entity.
     *
     * @param VehiculePhysique $vehiculePhysique The vehiculePhysique entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(VehiculePhysique $vehiculePhysique)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('vehiculephysique_delete', array('id' => $vehiculePhysique->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }


    /**
     * Finds and displays a vehiculePhysique entity.
     *
     * @Route("/recherche/{id}", name="vehiculephysique_recherche")
     * @Method("GET")
     */
    public function ficheProduit(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $voiturephy = $em->getRepository('AppBundle:VehiculePhysique')->findById($id);
        $optionsphy = $em->getRepository('AppBundle:VehiculePhysique')->find($id)->getOptions($id);

        $formCart = $this->createForm('AppBundle\Form\AddToCartType');
        $formCart->handleRequest($request);

        $formEssai = $this->createForm('AppBundle\Form\AddEssaiType');
        $formEssai->handleRequest($request);

        if ($formCart->isSubmitted() && $formCart->isValid()) {

            return $this->redirectToRoute('cartcontent_new', array(
                'id' => $id,
            ));
        }

        if ($formEssai->isSubmitted() && $formEssai->isValid()) {

            return $this->redirectToRoute('demandeessai_new', array(
                'id' => $id,
            ));
        }

        return $this->render('pagesCarifyPublic/recherche/ficheProduit.html.twig', [
            'voituredef' => $voituredef,
            'voiturephy' => $voiturephy,
            'optionsphy' => $optionsphy,
            'formCart' => $formCart->createView(),
            'formEssai' => $formEssai->createView(),
            'user' => $user,

        ]);
    }


    /**
     * Permet de mofifier le statut du vehphy pour l'admin.
     *
     * @Route("/{id}/validation/edit", name="vehiculephysique_validation_edit")
     * @Method({"GET", "POST"})
     */
    public function validationAction(Request $request, VehiculePhysique $vehiculePhysique)
    {
        $vehiclesValidationStatut = new Vehiclesvalidationstatut();
        $validationForm = $this->createForm('AppBundle\Form\AdminVehiculePhysiqueType', $vehiclesValidationStatut);
        $validationForm->handleRequest($request);

        if ($validationForm->isSubmitted() && $validationForm->isValid()) {
            $em =$this->getDoctrine()->getManager();
            $statutId = $vehiclesValidationStatut->getStatut($vehiclesValidationStatut);
            $vehiculePhysique->setValidationStatut($statutId);
            if($statutId == 'Validé'){
                $vehiculePhysique->setDateMiseEnLigne(new \DateTime('now'));
            }
            $em->persist($vehiculePhysique);
            $em->flush();

            return $this->redirectToRoute('vehiculephysique_index');
        }

        return $this->render('Form/vehiculephysique/validation.html.twig', array(
            'vehiculePhysique' => $vehiculePhysique,
            'validation_form' => $validationForm->createView(),
        ));
    }

}

