<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Article;
use AppBundle\Entity\Livraison;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
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

    // GESTION DES STATISTIQUES POUR L'ADMINISTRATEUR ---------------------------------------------------------------- */

    /**
     * @Route("/admin/statistiques", name="adminStats")
     */
    public function adminStats(Request $request)
    {
      //Formulaire non relié à une entité pour choisir la date
      $form = $this->createFormBuilder()
      ->add('Choix', ChoiceType::class, [
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

            
            if ($form->isSubmitted() && $form->isValid()) {

                //Recuperation de la date selectionné en array
                $date = implode($form->getData());
            }

            //Attribution de la date aux variables
            $debutAnnee      = $date;
            $finAnnee        = $date;
            $premierTriDeb   = $date;
            $premierTriFin   = $date;
            $deuxiemeTriDeb  = $date;
            $deuxiemeTriFin  = $date;
            $troisiemeTriDeb = $date;
            $troisiemeTriFin = $date;
            $quatriemeTriDeb = $date;
            $quatriemeTriFin = $date;
            

  $annee2018 = "2018";  
  $annee2019 = "2019";
  $annee2020 = "2020";
  $annee2021 = "2021";
  $annee2022 = "2022";
  $annee2023 = "2023";
  $annee2024 = "2024";
  $annee2025 = "2025";       
           


  $em = $this->getDoctrine()->getManager();
  //Récupération de toutes les ventes totales de toutes les années
  $venteTotales = $em->getRepository('AppBundle:Vente')->findVentesTotales();

  //Chiffre des ventes totales de toutes les années
  $venteTotalesCompte = count($venteTotales);


  //Recuperation des ventes années par années pour la chart
  $vente2018 =  count($em->getRepository('AppBundle:Vente')->findVentes2019($annee2018));
  $vente2019 =  count($em->getRepository('AppBundle:Vente')->findVentes2019($annee2019));
  $vente2020 =  count($em->getRepository('AppBundle:Vente')->findVentes2020($annee2020));
  $vente2021 =  count($em->getRepository('AppBundle:Vente')->findVentes2021($annee2021));
  $vente2022 =  count($em->getRepository('AppBundle:Vente')->findVentes2022($annee2022));
  $vente2023 =  count($em->getRepository('AppBundle:Vente')->findVentes2023($annee2023));
  $vente2024 =  count($em->getRepository('AppBundle:Vente')->findVentes2024($annee2024));
  $vente2025 =  count($em->getRepository('AppBundle:Vente')->findVentes2025($annee2025));




  //Ventes annuelles par an
  $venteAnnuelles = $em->getRepository('AppBundle:Vente')->findVentesAnnuelles($debutAnnee, $finAnnee);

  //Ventes 1er trimestre
  $venteTrimUn = $em->getRepository('AppBundle:Vente')->findVentesTrimUn($premierTriDeb, $premierTriFin);

  //Ventes 2eme trimestre
  $venteTrimDeux = $em->getRepository('AppBundle:Vente')->findVentesTrimDeux($deuxiemeTriDeb, $deuxiemeTriFin);

  //Ventes 3eme trimestre
  $venteTrimTrois = $em->getRepository('AppBundle:Vente')->findVentesTrimTrois($troisiemeTriDeb, $troisiemeTriFin);

  //Ventes 4eme trimestre
  $venteTrimQuatre = $em->getRepository('AppBundle:Vente')->findVentesTrimQuatre($quatriemeTriDeb, $quatriemeTriFin);


    //VENTE PAR MOIS + COUNT POUR LA CHART

  $venteJanvier = $em->getRepository('AppBundle:Vente')->findVentesJanvier($debutAnnee, $finAnnee);
  $chartJanvier = count($venteJanvier);
  $venteFevrier = $em->getRepository('AppBundle:Vente')->findVentesFevrier($debutAnnee, $finAnnee);
  $chartFevrier = count($venteFevrier);
  $venteMars = $em->getRepository('AppBundle:Vente')->findVentesMars($debutAnnee, $finAnnee);
  $chartMars = count($venteMars);
  $venteAvril = $em->getRepository('AppBundle:Vente')->findVentesAvril($debutAnnee, $finAnnee);
  $chartAvril = count($venteAvril);
  $venteMai = $em->getRepository('AppBundle:Vente')->findVentesMai($debutAnnee, $finAnnee);
  $chartMai = count($venteMai);
  $venteJuin = $em->getRepository('AppBundle:Vente')->findVentesJuin($debutAnnee, $finAnnee);
  $chartJuin = count($venteJuin);
  $venteJuillet = $em->getRepository('AppBundle:Vente')->findVentesJuillet($debutAnnee, $finAnnee);
  $chartJuillet = count($venteJuillet);
  $venteAout = $em->getRepository('AppBundle:Vente')->findVentesAout($debutAnnee, $finAnnee);
  $chartAout = count($venteAout);
  $venteSeptembre = $em->getRepository('AppBundle:Vente')->findVentesSeptembre($debutAnnee, $finAnnee);
  $chartSeptembre = count($venteSeptembre);
  $venteOctobre = $em->getRepository('AppBundle:Vente')->findVentesOctobre($debutAnnee, $finAnnee);
  $chartOctobre = count($venteOctobre);
  $venteNovembre = $em->getRepository('AppBundle:Vente')->findVentesNovembre($debutAnnee, $finAnnee);
  $chartNovembre = count($venteNovembre);
  $venteDecembre = $em->getRepository('AppBundle:Vente')->findVentesDecembre($debutAnnee, $finAnnee);
  $chartDecembre = count($venteDecembre);

    //FIN VENTE PAR MOIS


  //variable pour la chart trimestrielle
  $chartTrimUn = count($venteTrimUn);
  $chartTrimDeux = count($venteTrimDeux);
  $chartTrimTrois = count($venteTrimTrois);
  $chartTrimQuatre = count($venteTrimQuatre);


  //Variables pour la chart annuelle
  $chartAnJanvier = count($venteJanvier);
  $chartAnFevrier = count($venteFevrier);
  $chartAnMars = count($venteMars);
  $chartAnAvril = count($venteAvril);
  $chartAnMai = count($venteMai);
  $chartAnJuin = count($venteJuin);
  $chartAnJuillet = count($venteJuillet);
  $chartAnAout = count($venteAout);
  $chartAnSeptembre = count($venteSeptembre);
  $chartAnOctobre = count($venteOctobre);
  $chartAnNovembre = count($venteNovembre);
  $chartAnDecembre = count($venteDecembre);


    return $this->render('admin/admin/adminStats.html.twig', [
        'form' => $form->createView(),
            'venteTotalesCompte' => $venteTotalesCompte,
            'venteTotales'       => $venteTotales,
            'venteAnnuelles'     => $venteAnnuelles,
            'venteTrimUn'        => $venteTrimUn,
            'venteTrimDeux'      => $venteTrimDeux,
            'venteTrimTrois'     => $venteTrimTrois,
            'venteTrimQuatre'    => $venteTrimQuatre,
            'venteJanvier'       => $venteJanvier,
            'venteFevrier'       => $venteFevrier,
            'venteMars'          => $venteMars,
            'venteAvril'         => $venteAvril,
            'venteMai'           => $venteMai,
            'venteJuin'          => $venteJuin,
            'venteJuillet'       => $venteJuillet,
            'venteAout'          => $venteAout,
            'venteSeptembre'     => $venteSeptembre,
            'venteOctobre'       => $venteOctobre,
            'venteNovembre'      => $venteNovembre,
            'venteDecembre'      => $venteDecembre,
            'chartTrimUn'        => $chartTrimUn,
            'chartTrimDeux'      => $chartTrimDeux,
            'chartTrimTrois'     => $chartTrimTrois,
            'chartTrimQuatre'    => $chartTrimQuatre,
            'chartAnJanvier'     => $chartAnJanvier, 
            'chartAnFevrier'     => $chartAnFevrier, 
            'chartAnMars'        => $chartAnMars, 
            'chartAnAvril'       => $chartAnAvril, 
            'chartAnMai'         => $chartAnMai, 
            'chartAnJuin'        => $chartAnJuin, 
            'chartAnJuillet'     => $chartAnJuillet, 
            'chartAnAout'        => $chartAnAout, 
            'chartAnSeptembre'   => $chartAnSeptembre,
            'chartAnOctobre'     => $chartAnOctobre,
            'chartAnNovembre'    => $chartAnNovembre,
            'chartAnDecembre'    => $chartAnDecembre,
            'vente2018'          => $vente2018, 
            'vente2019'          => $vente2019, 
            'vente2020'          => $vente2020, 
            'vente2021'          => $vente2021, 
            'vente2022'          => $vente2022, 
            'vente2023'          => $vente2023, 
            'vente2024'          => $vente2024, 
            'vente2025'          => $vente2025, 
            'chartJanvier'       => $chartJanvier,
            'chartFevrier'       => $chartFevrier,
            'chartMars'          => $chartMars,
            'chartAvril'         => $chartAvril,
            'chartMai'           => $chartMai,
            'chartJuin'          => $chartJuin,
            'chartJuillet'       => $chartJuillet,
            'chartAout'          => $chartAout,
            'chartSeptembre'     => $chartSeptembre,
            'chartOctobre'       => $chartOctobre,
            'chartNovembre'      => $chartNovembre,
            'chartDecembre'      => $chartDecembre,
      ]);
    }

    /** GESTION DES VALIDATIONS DE VEHICULES PHYSIQUES PAR L'ADMINISTRATEUR ---------------------------------------- */

    /**
     * Lists all vehiculePhysique entities.
     *
     * @Route("/admin/validation", name="vehiculephysique_validation_index")
     * @Method("GET")
     */
    public function indexValidationAction()
    {
        $em = $this->getDoctrine()->getManager();

        $vehiculePhysiques = $em->getRepository('AppBundle:VehiculePhysique')->findAll();

        return $this->render('Form/vehiculephysique/validation_index.html.twig', array(
            'vehiculePhysiques' => $vehiculePhysiques,
        ));
    }

    /** GESTION DES DEMANDES DE CONTACT DES CLIENTS OU PROSPECTS ----------------------------------------------------- */

    /**
     * Lists all contact entities.
     *
     * @Route("/admin/contact", name="contact_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $contacts = $em->getRepository('AppBundle:Contact')->findAll();

        return $this->render('Form/contact/index.html.twig', array(
            'contacts' => $contacts,
        ));
    }

    /** LISTE DES VEHICULES PHYSIQUES DANS LE PARC AUTO CARIFY  ---------------------------------------------------- */


    /**
     * Lists all vehiculePhysique entities.
     *
     * @Route("/admin/listeVehPhy", name="vehiculephysique_index")
     * @Method("GET")
     */
    public function indexVehPhyAction()
    {
        $em = $this->getDoctrine()->getManager();

        $vehiculePhysiques = $em->getRepository('AppBundle:VehiculePhysique')->findAll();

        return $this->render('Form/vehiculephysique/index.html.twig', array(
            'vehiculePhysiques' => $vehiculePhysiques,
        ));
    }

     /**
     * @Route("/adminAfterSale", name="adminAfterSale")
     */
    public function adminAfterSale()
    {
        // replace this example code with whatever you need
        return $this->render('admin/admin/adminAfterSale.html.twig');
    }

    /** CREATION D'UNE DEFINITION DE VEHICULE ----------------------------------------------------------------------- */

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

    /** GESTION DES ARTICLES CARIFY --------------------------------------------------------------------------------- */

    /**
     * Lists all article entities.
     *
     * @Route("/admin/article", name="article_admin_index")
     * @Method("GET")
     */
    public function indexArticleAction()
    {
        $em = $this->getDoctrine()->getManager();

        $articles = $em->getRepository('AppBundle:Article')->findAll();

        return $this->render('admin/admin/article_index.html.twig', array(
            'articles' => $articles,
        ));
    }

    /**
     * Creates a new article entity.
     *
     * @Route("/admin/article/new", name="article_admin_new")
     * @Method({"GET", "POST"})
     */
    public function newArticleAction(Request $request)
    {
        $article = new Article();
        $form = $this->createForm('AppBundle\Form\ArticleType', $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();

            return $this->redirectToRoute('article_show', array('id' => $article->getId()));
        }

        return $this->render('article/new.html.twig', array(
            'article' => $article,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a article entity.
     *
     * @Route("/admin/article/{id}", name="admin_article_show")
     * @Method("GET")
     */
    public function showAction(Article $article)
    {
        $deleteForm = $this->createDeleteForm($article);

        return $this->render('admin/admin/article_show.html.twig', array(
            'article' => $article,
            'delete_form' => $deleteForm->createView(),
        ));
    }


    /**
     * Displays a form to edit an existing article entity.
     *
     * @Route("/admin/article/{id}/edit", name="article_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Article $article)
    {
        $deleteForm = $this->createDeleteForm($article);
        $editForm = $this->createForm('AppBundle\Form\ArticleType', $article);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('article_edit', array('id' => $article->getId()));
        }

        return $this->render('article/edit.html.twig', array(
            'article' => $article,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a article entity.
     *
     * @Route("/admin/article/{id}", name="article_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Article $article)
    {
        $form = $this->createDeleteForm($article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($article);
            $em->flush();
        }

        return $this->redirectToRoute('article_index');
    }

    /**
     * Creates a form to delete a article entity.
     *
     * @param Article $article The article entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Article $article)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('article_delete', array('id' => $article->getId())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }

    /** GESTION DES LIVRAISONS NON EFFECTUEES    -------------------------------------------------------------------- */

    /**
     * Lists all livraison entities.
     *
     * @Route("/admin/livraisons", name="adminlivraison_index")
     * @Method("GET")
     */
    public function indexLivraisonAdminAction()
    {
        $em = $this->getDoctrine()->getManager();

        $livraisons = $em->getRepository('AppBundle:Livraison')->findLivraisonsEffectuees();

        return $this->render('admin/admin/adminLivraison.html.twig', array(
            'livraisons' => $livraisons,
        ));
    }

    /**
     * Lists all livraison entities.
     *
     * @Route("/admin/livraisonsEnAttente", name="adminlivraisonEnAttente_index")
     * @Method("GET")
     */
    public function indexLivraisonEnAttenteAdminAction()
    {
        $em = $this->getDoctrine()->getManager();

        $livraisons = $em->getRepository('AppBundle:Livraison')->findLivraisonsEnAttente();

        return $this->render('admin/admin/adminLivraisonsEnAttentes.html.twig', array(
            'livraisons' => $livraisons,
        ));
    }

    /**
     * Displays a form to edit an existing livraison entity.
     *
     * @Route("admin/{id}/edit", name="livraisonAdmin_edit")
     * @Method({"GET", "POST"})
     */
    public function editAdminLivraisonAction(Request $request, Livraison $livraison)
    {
        $editForm = $this->createForm('AppBundle\Form\LivraisonAdminType', $livraison);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('vendeurlivraisonEnAttente_index');
        }

        return $this->render('admin/vendeur/vendeurLivraisonEdit.html.twig', array(
            'livraison' => $livraison,
            'edit_form' => $editForm->createView(),
        ));
    }

      /**
    * @Route("/admin/userList", name="adminUserList")
    */
    public function adminUserList()
    {


       $em = $this->getDoctrine()->getManager();
       //Récupération de toutes les ventes totales de toutes les années
        $clients = $em->getRepository('AppBundle:CartContent')->findAdminClients();



    // replace this example code with whatever you need
    return $this->render('admin/admin/adminUserList.html.twig', [
      'clients' => $clients
      ]);
    }


    /**
    * @Route("/admin/userHistoric/{referenceClient}", name="adminUserHistoric")
    */
    public function adminUserHistoric($referenceClient)
    {
       $em = $this->getDoctrine()->getManager();
       //Récupération de toutes les ventes totales de toutes les années
       $cartContents = $em->getRepository('AppBundle:CartContent')->findUserHistoric($referenceClient);

    // replace this example code with whatever you need
    return $this->render('admin/admin/adminUserHistoric.html.twig', [
      'cartContents' => $cartContents
      ]);
    }

}
