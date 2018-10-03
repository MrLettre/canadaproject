<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Marque;

class AdminController extends Controller
{
    /**
     * @Route("/admin", name="adminHomepage")
     */
    public function adminPageAction()
    {
        // replace this example code with whatever you need
        return $this->render('admin/admin/index.html.twig');
    }

    /**
     * @Route("/adminSeller", name="adminHomepageSeller")
     */
    public function adminSellerPageAction()
    {
        // replace this example code with whatever you need
        return $this->render('admin/vendeur/index.html.twig');
    }


    //Routes pour les actions de la page Admin du site 


    /**
     * @Route("/adminMySeller", name="adminMySeller")
     */
    public function adminMySeller()
    {
        // replace this example code with whatever you need
        return $this->render('admin/admin/adminMySeller.html.twig');
    }

    /**
     * @Route("/adminMyClient", name="adminMyClient")
     */
    public function adminMyClient()
    {
        // replace this example code with whatever you need
        return $this->render('admin/admin/adminMyClient.html.twig');
    }

    /**
     * @Route("/adminStats", name="adminStats")
     */
    public function adminStats()
    {
        // replace this example code with whatever you need
        return $this->render('admin/admin/adminStats.html.twig');
    }

     /**
     * @Route("/adminAutoPark", name="adminAutoPark")
     */
    public function adminAutoPark()
    {
        // replace this example code with whatever you need
        return $this->render('admin/admin/adminAutoPark.html.twig');
    }

     /**
     * @Route("/adminAfterSale", name="adminAfterSale")
     */
    public function adminAfterSale()
    {
        // replace this example code with whatever you need
        return $this->render('admin/admin/adminAfterSale.html.twig');
    }

         /**
     * @Route("/adminAddCar", name="adminAddCar")
     */
    public function adminAddCar(Request $request)
    {
        // replace this example code with whatever you need

        $marque = new Marque();
        $form = $this->createForm('AppBundle\Form\AjoutVehDef', $marque);
        $form->handleRequest($request);

       if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($marque);
            $em->flush();

            return $this->redirectToRoute('adminAddCar');
       }


        return $this->render('admin/admin/adminAddCar.html.twig', array(
            'marque' => $marque,
            'form' => $form->createView(),
        ));
    
}


    // Routes pour les actions de la page Admin Vendeur du site  


    /**
     * @Route("/adminSellerCatalogue", name="adminSellerCatalogue")
     */
    public function adminSellerCatalogue()
    {
        // replace this example code with whatever you need
        return $this->render('admin/vendeur/catalogue.html.twig');
    }

    /**
     * @Route("/adminSellerSales", name="adminSellerSales")
     */
    public function adminSellerSales()
    {
        // replace this example code with whatever you need
        return $this->render('admin/vendeur/ventes.html.twig');
    }

    /**
     * @Route("/adminSellerClients", name="adminSellerClients")
     */
    public function adminSellerClients()
    {
        // replace this example code with whatever you need
        return $this->render('admin/vendeur/clients.html.twig');
    }

     /**
     * @Route("/adminSellerContact", name="adminSellerContact")
     */
    public function adminSellerContact()
    {
        // replace this example code with whatever you need
        return $this->render('admin/vendeur/contact.html.twig');
    }

     /**
     * @Route("/adminSellerStats", name="adminSellerStats")
     */
    public function adminSellerStats()
    {

        $em = $this->getDoctrine()->getManager();
        
        $total = $em->getRepository('AppBundle:Cart')->findAll();
        // replace this example code with whatever you need
        return $this->render('admin/vendeur/statistiques.html.twig', [
            'total' => $total,
        ]);
    }

     /**
     * @Route("/adminSellerAfterSale", name="adminSellerAfterSale")
     */
    public function adminSellerAfterSale()
    {
        // replace this example code with whatever you need
        return $this->render('admin/vendeur/sav.html.twig');
    }

}
