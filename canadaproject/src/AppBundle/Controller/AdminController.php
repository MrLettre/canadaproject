<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Marque;
use AppBundle\Entity\VehiculePhysique;
use AppBundle\Entity\Concession;
use AppBundle\Entity\Vente;
use AppBundle\Entity\Cart;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


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
    public function adminSellerStats(Request $request)
    {

        
        $form = $this->createFormBuilder()
                ->add('Choix', ChoiceType::class,[
                    'choices' => [
                        '2018' => 2018,
                        '2019' => 2019,
                        '2020' => 2020,
                        '2021' => 2021,
                        '2022' => 2022,
                        '2023' => 2023,
                        '2024' => 2024,
                        '2024' => 2024,
                        '2025' => 2025,
            ]
        ])
        ->add('save', SubmitType::class, array('label' => 'Choisir la date'))
                ->getForm();


        $form->handleRequest($request);

        $date = '';

        $em = $this->getDoctrine()->getManager();
        //Récupération de toutes les ventes totales de toutes les années
        $venteTotales = $em->getRepository('AppBundle:Cart')->ventesTotales();

        if ($form->isSubmitted() && $form->isValid()) {

            $dateArray = $form->getData();

            foreach($dateArray as $key=>$date){
                $dateArray = $date;
            }    
}

        $debutAnnee = $date;
        $finAnnee = $date;
        $premierTriDeb = $date;
        $premierTriFin = $date;

     
        //Ventes annuelles par an
        $venteAnnuelles = $em->getRepository('AppBundle:Cart')->ventesAnnuelles($debutAnnee, $finAnnee);

        //Ventes 1er trimestre
        $venteTrimUn = $em->getRepository('AppBundle:Cart')->ventesTrimUn($premierTriDeb, $premierTriFin);

        //Chiffre des ventes totales de toutes les années
        $venteTotalesCompte = count($venteTotales);
        
 
  

        return $this->render('admin/vendeur/statistiques.html.twig', [
            'form'                   =>$form->createView(),
            'venteTotalesCompte'     =>$venteTotalesCompte,
            'venteTotales'           =>$venteTotales,
            'venteAnnuelles'         =>$venteAnnuelles,  
            'venteTrimUn'            =>$venteTrimUn,
            
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
