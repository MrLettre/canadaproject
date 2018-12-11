<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Cart;
use AppBundle\Entity\User;
use AppBundle\Entity\Livraison;
use AppBundle\Entity\CartContent;
use AppBundle\Entity\VehiclesValidationStatut;
use AppBundle\Entity\Vente;
use AppBundle\Service\Mailer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Cartcontent controller.
 *
 * @Route("cartcontent")
 */
class CartContentController extends Controller
{

    

    /**
     * @Route("/cartClient", name="cartClient")
     * @Method("GET")
     */
    public function cartClient()
    {

        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        if($user != null){
        $userId = $user->getId();
        $cart = $em->getRepository('AppBundle:CartContent')->findByUser($userId);
        }else{
            return $this->redirectToRoute('fos_user_security_login');
        }
       

        if(!empty($cart)){
          foreach($cart as $prixHtTo){  
              $prixHtT[] = $prixHtTo->getVehiculePhysique()->getPrixHT();
          }
        
        $prixHtTotal = array_sum($prixHtT);
        }else{
        $prixHtTotal = null;
    }

        
            // replace this example code with whatever you need
        
            return $this->render('pagesCarifyPublic/cart/cartClient.html.twig', [
                'cart' => $cart,
                'prixHtTotal' => $prixHtTotal
            ]);
    }


    /**
     * @Route("/clearCart", name="clearCart")
     * @Method("GET")
     */
    public function clearClart()
    {

        $em = $this->getDoctrine()->getManager();
        $userId = $this->getUser()->getId();

        $cartContents = $em->getRepository('AppBundle:CartContent')->findByUser($userId);

        foreach ($cartContents as $value){
            $cartContent = $value->getCart()->setActif(0);
            $em->persist($cartContent);
            $em->flush();
        }

        return $this->render('pagesCarifyPublic/cart/cartSupprimer.html.twig');
    }

    /**
     * @Route("/cartValidation", name="cart_validation")
     * @Method("GET")
     */
    public function cartValidationAction()
    {
        return $this->render('pagesCarifyPublic/cart/cartValidation.html.twig');
    }

    /**
     * @Route("/cartDelivery", name="cart_delivery")
     * @Method("GET")
     */
    public function cartDeliveryAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $userId = $this->getUser()->getId();
        $carts = $em->getRepository('AppBundle:CartContent')->findByUser($userId);
        $livraisons = $em->getRepository('AppBundle:ModeDeLivraison')->findAll();

        $newLivraison = new Livraison();
        $form = $this->createForm('AppBundle\Form\LivraisonType', $newLivraison);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($newLivraison);
            $em->flush($newLivraison);

            return $this->redirectToRoute('cart_payment', array('id' => $newLivraison->getId()));
        }


        return $this->render('pagesCarifyPublic/cart/cartDelivery.html.twig', [
            'carts' => $carts,
            'livraisons' => $livraisons,
            'form' => $form->createView(),
            'newLivraison' => $newLivraison,
        ]);
    }

    /**
     * @Route("/cartPayment/{id}", name="cart_payment")
     * @Method("GET")
     */
    public function cartPaymentAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $userId = $this->getUser()->getId();
        $carts = $em->getRepository('AppBundle:CartContent')->findByUser($userId);
        $livraison = $em->getRepository('AppBundle:Livraison')->findOneBy(array('id'=>$id));

        return $this->render('pagesCarifyPublic/cart/cartPayment.html.twig', [
            'carts' => $carts,
            'livraison' => $livraison
        ]);
    }

    /**
     * @Route("/cartVenteValidation/{id}", name="cart_vente_validation")
     * @Method("GET")
     */
    public function cartVenteValidationtAction($id, Mailer $mailer)
    {
        $em = $this->getDoctrine()->getManager();
        $userId = $this->getUser()->getId();
        $cartContents = $em->getRepository('AppBundle:CartContent')->findByUser($userId);
        $livraison = $em->getRepository('AppBundle:Livraison')->findOneBy(array('id'=>$id));



        if(!empty($cartContents)){
            $dateVente = new \DateTime('now');
            $datePrev = new \DateTime('now');
            $datePrev->add(new \DateInterval('P10D'));

            $ref= 'VEH'.'-'.$userId.'-'.rand(0, 99999);
            $vente = new Vente();
            $vente->setDateVente($dateVente);
            $vente->setReferenceVente($ref);

            $ref = 'LIV-'.$userId.'-'.rand(0, 99999);
            $livraison->setReference($ref);
            $livraison->setDateHA($dateVente);
            $livraison->setDateLivraisonPrevisionnelle($datePrev);
            $vente->setLivraison($livraison);

            $em->persist($livraison);
            $em->persist($vente);

            $validationStatut = $em->getRepository('AppBundle:VehiclesValidationStatut')->findStatutVendu();

            foreach ($cartContents as $value){
                $cartContentVente = $value->setVente($vente);
                $cartContentActif = $value->getCart()->setActif(0);
                $cartVeh = $value->getVehiculePhysique()->setDateDeVente($dateVente);
                $vehStatut = $value->getVehiculePhysique()->setValidationStatut($validationStatut[0]);
                $em->persist($cartContentActif);
                $em->persist($cartContentVente);
                $em->persist($cartVeh);
                $em->persist($vehStatut);
            }

            $user = $em->getRepository('AppBundle:User')->findOneBy(array('id'=>$userId));
            if($user->getIsClient() == 0){
                $refClient = "CUST"."-".$userId."-".rand(0, 99999);
                $user->setIsClient(1);
                $user->setReferenceClient($refClient);
                $em->persist($user);
            }

            //$em->flush();

            $usermail = $user->getUsername();
           // var_dump($refClient);


            //Ici -> envoie du mail de validation de commande
                $mailer->sendEmail(
                    $subject = 'Order confirmation',
                    $sendTo = $this->getUser()->getEmail(),
                    $render = 'mails/mailConfirmationCommande.html.twig',
                    $username = $usermail,
                    $content = $vente->getReferenceVente()
                );


            $venteId = $vente->getId();
            $cartForFinalTwig = $em->getRepository('AppBundle:CartContent')->findForFinalTwig($venteId);

            return $this->render('pagesCarifyPublic/cart/cartVenteValidation.html.twig', [
                'cartContents' => $cartContents,
                'vente' => $vente,
                'cartForFinalTwig' => $cartForFinalTwig,
                ]);
        }else{
            return $this->redirectToRoute('accueil');
        }
    }


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
     * @Route("/{id}/new", name="cartcontent_new")
     * @Method({"GET", "POST"})
     */
    public function newAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $cartContent = new Cartcontent();
        $cart = new Cart();
        $user = $this->getUser();

        $ref = 'CART'.'-'.rand(0, 99999);
        $voiturephy = $em->getRepository('AppBundle:VehiculePhysique')->findById($id);
        $dateMaP = new \DateTime('now');


        $cart->setActif(1);
        $cart->setReferenceCart($ref);
        $cart->setDateCreationPanier($dateMaP);
        $cartContent->setUser($user);
        $cartContent->setVehiculePhysique($voiturephy[0]);
        $cartContent->setDateMiseAuPanier($dateMaP);
        $cartContent->setDateMiseAJourPanier($dateMaP);
        $cartContent->setCart($cart);
        $em->persist($cart);
        $em->persist($cartContent);

        $em->flush();


        return $this->redirectToRoute('cartClient');
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
