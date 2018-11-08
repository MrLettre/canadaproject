<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Article;
use AppBundle\Entity\User;
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

    /**
     * @Route("/vendeur/statistiques", name="vendeurStats")
     */
    public function vendeurStats(Request $request)
    {

        $em = $this->getDoctrine()->getManager();

        $userId = $this->getUser()->getId();


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
      ]);
    }

    //Routes pour les actions de la page Vendeur du site

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


}
