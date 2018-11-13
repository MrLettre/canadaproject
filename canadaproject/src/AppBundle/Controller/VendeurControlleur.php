<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Article;
use AppBundle\Entity\User;
use AppBundle\Entity\Livraison;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Marque;
use AppBundle\Entity\DemandeEssai;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class VendeurControlleur extends Controller
{
    /**
     * @Route("/vendeur", name="adminHomepageSeller")
     * @Method("GET")
     */
    public function vendeurPageAction()
    {
        // replace this example code with whatever you need
        return $this->render('admin/vendeur/index.html.twig');
    }

    // GESTION DES STATISTIQUES VENDEUR ---------------------------------------------------------------------------- */

    /**
     * @Route("/vendeur/statistiques", name="vendeurStats")
     */
    public function vendeurStats(Request $request)
    {
        $userId = $this->getUser();

        $concession = $userId->getConcession()->getId();
        
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
      $venteTotales = $em->getRepository('AppBundle:CartContent')->findVentesVendeurTotales($concession);



      //Chiffre des ventes totales de toutes les années
      $venteTotalesCompte = count($venteTotales);


      //Recuperation des ventes années par années pour la chart
      $vente2018 =  count($em->getRepository('AppBundle:CartContent')->findVentesVendeur2018($annee2018, $concession));
      $vente2019 =  count($em->getRepository('AppBundle:CartContent')->findVentesVendeur2019($annee2019, $concession));
      $vente2020 =  count($em->getRepository('AppBundle:CartContent')->findVentesVendeur2020($annee2020, $concession));
      $vente2021 =  count($em->getRepository('AppBundle:CartContent')->findVentesVendeur2021($annee2021, $concession));
      $vente2022 =  count($em->getRepository('AppBundle:CartContent')->findVentesVendeur2022($annee2022, $concession));
      $vente2023 =  count($em->getRepository('AppBundle:CartContent')->findVentesVendeur2023($annee2023, $concession));
      $vente2024 =  count($em->getRepository('AppBundle:CartContent')->findVentesVendeur2024($annee2024, $concession));
      $vente2025 =  count($em->getRepository('AppBundle:CartContent')->findVentesVendeur2025($annee2025, $concession));




      //Ventes annuelles par an
      $venteAnnuelles = $em->getRepository('AppBundle:CartContent')->findVentesVendeurAnnuelles($debutAnnee, $finAnnee, $concession);

      //Ventes 1er trimestre
      $venteTrimUn = $em->getRepository('AppBundle:CartContent')->findVentesVendeurTrimUn($premierTriDeb, $premierTriFin, $concession);

      //Ventes 2eme trimestre
      $venteTrimDeux = $em->getRepository('AppBundle:CartContent')->findVentesVendeurTrimDeux($deuxiemeTriDeb, $deuxiemeTriFin, $concession);

      //Ventes 3eme trimestre
      $venteTrimTrois = $em->getRepository('AppBundle:CartContent')->findVentesVendeurTrimTrois($troisiemeTriDeb, $troisiemeTriFin, $concession);

      //Ventes 4eme trimestre
      $venteTrimQuatre = $em->getRepository('AppBundle:CartContent')->findVentesVendeurTrimQuatre($quatriemeTriDeb, $quatriemeTriFin, $concession);


        //VENTE PAR MOIS + COUNT POUR LA CHART

      $venteJanvier = $em->getRepository('AppBundle:CartContent')->findVentesVendeurJanvier($debutAnnee, $finAnnee, $concession);
      $chartJanvier = count($venteJanvier);
      $venteFevrier = $em->getRepository('AppBundle:CartContent')->findVentesVendeurFevrier($debutAnnee, $finAnnee, $concession);
      $chartFevrier = count($venteFevrier);
      $venteMars = $em->getRepository('AppBundle:CartContent')->findVentesVendeurMars($debutAnnee, $finAnnee, $concession);
      $chartMars = count($venteMars);
      $venteAvril = $em->getRepository('AppBundle:CartContent')->findVentesVendeurAvril($debutAnnee, $finAnnee, $concession);
      $chartAvril = count($venteAvril);
      $venteMai = $em->getRepository('AppBundle:CartContent')->findVentesVendeurMai($debutAnnee, $finAnnee, $concession);
      $chartMai = count($venteMai);
      $venteJuin = $em->getRepository('AppBundle:CartContent')->findVentesVendeurJuin($debutAnnee, $finAnnee, $concession);
      $chartJuin = count($venteJuin);
      $venteJuillet = $em->getRepository('AppBundle:CartContent')->findVentesVendeurJuillet($debutAnnee, $finAnnee, $concession);
      $chartJuillet = count($venteJuillet);
      $venteAout = $em->getRepository('AppBundle:CartContent')->findVentesVendeurAout($debutAnnee, $finAnnee, $concession);
      $chartAout = count($venteAout);
      $venteSeptembre = $em->getRepository('AppBundle:CartContent')->findVentesVendeurSeptembre($debutAnnee, $finAnnee, $concession);
      $chartSeptembre = count($venteSeptembre);
      $venteOctobre = $em->getRepository('AppBundle:CartContent')->findVentesVendeurOctobre($debutAnnee, $finAnnee, $concession);
      $chartOctobre = count($venteOctobre);
      $venteNovembre = $em->getRepository('AppBundle:CartContent')->findVentesVendeurNovembre($debutAnnee, $finAnnee, $concession);
      $chartNovembre = count($venteNovembre);
      $venteDecembre = $em->getRepository('AppBundle:CartContent')->findVentesVendeurDecembre($debutAnnee, $finAnnee, $concession);
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


        return $this->render('admin/vendeur/statistiques.html.twig', [
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
                'userId'  => $userId
      ]);
    }



    // GESTION DU PARC AUTO VENDEUR --------------------------------------------------------------------------------- */

    /**
     * @Route("/vendeur/parc", name="vendeur_parc")
     * @Method("GET")
     */

    public function vendeurVehPhy()
    {
        $user = $this->getUser();
        $concession = $user->getConcession()->getId();
        $em = $this->getDoctrine()->getManager();
        $vehPhys = $em->getRepository('AppBundle:VehiculePhysique')->findByConcession($concession);

        return $this->render('admin/vendeur/catalogue.html.twig', array(
            'vehPhys' => $vehPhys,
            'user' => $user,
        ));
    }

    /**
     * Lists all vehiculePhysique entities.
     *
     * @Route("/vendeur/validation", name="vehiculevendeur_validation_index")
     * @Method("GET")
     */
    public function indexVendeurValidationAction()
    {
        $user = $this->getUser();
        $concession = $user->getConcession()->getId();
        $em = $this->getDoctrine()->getManager();
        $vehiculePhysiques = $em->getRepository('AppBundle:VehiculePhysique')->findByConcession($concession);

        return $this->render('admin/vendeur/validation_index.html.twig', array(
            'vehiculePhysiques' => $vehiculePhysiques,
        ));
    }

    // GESTION DES DEMANDES D'ESSAI DES VENDEURS --------------------------------------------------------------------- */

    /**
     * Lists all vehiculePhysique entities.
     *
     * @Route("/vendeur/demandeEssai", name="demandeEssai_validation_index")
     * @Method("GET")
     */
    public function indexVendeurEssaiAction()
    {
        $user = $this->getUser();
        $concession = $user->getConcession()->getId();
        $em = $this->getDoctrine()->getManager();
        $demandeEssais = $em->getRepository('AppBundle:DemandeEssai')->findEssaiByConcession($concession);

        return $this->render('admin/vendeur/demandeEssai_index.html.twig', array(
            'demandeEssais' => $demandeEssais,
        ));
    }

    /**
     * Displays a form to edit an existing demandeEssai entity.
     *
     * @Route("/vendeur/demandeEssai/{id}/edit", name="demandeessaivendeur_edit")
     * @Method({"GET", "POST"})
     */
    public function editVendeurEssaiAction(Request $request, DemandeEssai $demandeEssai)
    {
        $editForm = $this->createForm('AppBundle\Form\EditDemandeEssaiType', $demandeEssai);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('demandeessai_edit', array('id' => $demandeEssai->getId()));
        }

        return $this->render('admin/vendeur/vendeurEditEssai.html.twig', array(
            'demandeEssai' => $demandeEssai,
            'edit_form' => $editForm->createView(),
        ));
    }

    // GESTION DES LIVRAISONS POUR LES VENDEURS -------------------------------------------------------------------- */

    /**
     * Lists all livraison entities.
     *
     * @Route("/vendeur/livraisons", name="vendeurlivraison_index")
     * @Method("GET")
     */
    public function indexLivraisonVendeurAction()
    {
        $user = $this->getUser();
        $concession = $user->getConcession()->getId();
        $em = $this->getDoctrine()->getManager();

        $livraisons = $em->getRepository('AppBundle:Livraison')->findLivraisonsEffectueesByConcession($concession);

        return $this->render('admin/vendeur/vendeurLivraison.html.twig', array(
            'livraisons' => $livraisons,
        ));
    }

    /**
     * Lists all livraison entities.
     *
     * @Route("/vendeur/livraisonsEnAttente", name="vendeurlivraisonEnAttente_index")
     * @Method("GET")
     */
    public function indexLivraisonEnAttenteVendeurAction()
    {
        $user = $this->getUser();
        $concession = $user->getConcession()->getId();
        $em = $this->getDoctrine()->getManager();

        $livraisons = $em->getRepository('AppBundle:Livraison')->findLivraisonsEnAttenteByConcession($concession);

        return $this->render('admin/vendeur/vendeurLivraisonsEnAttentes.html.twig', array(
            'livraisons' => $livraisons,
        ));
    }

    /**
     * Displays a form to edit an existing livraison entity.
     *
     * @Route("vendeur/{id}/edit", name="livraisonVendeur_edit")
     * @Method({"GET", "POST"})
     */
    public function editVendeurLivraisonAction(Request $request, Livraison $livraison)
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
     * @Route("/vendeur/myClients", name="adminSellerMyClients")
     * @Method("GET")
     */
    public function vendeurMyClients()
    {

        $em = $this->getDoctrine()->getManager();

        $userId = $this->getUser();

        $concession = $userId->getConcession()->getId();


        $clients = $em->getRepository('AppBundle:CartContent')->findVendeurClients($concession);

      
  


        // replace this example code with whatever you need
        return $this->render('admin/vendeur/clients.html.twig', [
          'clients' => $clients
        ]);
    }





}
