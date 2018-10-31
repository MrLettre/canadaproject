<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Article;
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

        $em = $this->getDoctrine()->getManager();
        //Récupération de toutes les ventes totales de toutes les années
        $venteTotales = $em->getRepository('AppBundle:Cart')->ventesTotales();

        if ($form->isSubmitted() && $form->isValid()) {

            //Recuperation de la date selectionné en array
            $date = implode($form->getData());
        }

        //Attribution de la date aux variables
        $debutAnnee = $date;
        $finAnnee = $date;
        $premierTriDeb = $date;
        $premierTriFin = $date;
        $deuxiemeTriDeb = $date;
        $deuxiemeTriFin = $date;
        $troisiemeTriDeb = $date;
        $troisiemeTriFin = $date;
        $quatriemeTriDeb = $date;
        $quatriemeTriFin = $date;


        //Ventes annuelles par an
        $venteAnnuelles = $em->getRepository('AppBundle:Cart')->ventesAnnuelles($debutAnnee, $finAnnee);

        //Ventes 1er trimestre
        $venteTrimUn = $em->getRepository('AppBundle:Cart')->ventesTrimUn($premierTriDeb, $premierTriFin);


        //Ventes 2eme trimestre
        $venteTrimDeux = $em->getRepository('AppBundle:Cart')->ventesTrimDeux($deuxiemeTriDeb, $deuxiemeTriFin);

        //Ventes 3eme trimestre
        $venteTrimTrois = $em->getRepository('AppBundle:Cart')->ventesTrimTrois($troisiemeTriDeb, $troisiemeTriFin);

        //Ventes 4eme trimestre
        $venteTrimQuatre = $em->getRepository('AppBundle:Cart')->ventesTrimQuatre($quatriemeTriDeb, $quatriemeTriFin);

        //Chiffre des ventes totales de toutes les années
        $venteTotalesCompte = count($venteTotales);

        //variable pour les charts
        $chartTrimUn = count($venteTrimUn);
        $chartTrimDeux = count($venteTrimDeux);
        $chartTrimTrois = count($venteTrimTrois);
        $chartTrimQuatre = count($venteTrimQuatre);




        return $this->render('admin/admin/adminStats.html.twig', [
            'form' => $form->createView(),
            'venteTotalesCompte' => $venteTotalesCompte,
            'venteTotales' => $venteTotales,
            'venteAnnuelles' => $venteAnnuelles,
            'venteTrimUn' => $venteTrimUn,
            'venteTrimDeux' => $venteTrimDeux,
            'venteTrimTrois' => $venteTrimTrois,
            'venteTrimQuatre' => $venteTrimQuatre,
            'chartTrimUn'  => $chartTrimUn,
            'chartTrimDeux' => $chartTrimDeux,
            'chartTrimTrois' => $chartTrimTrois,
            'chartTrimQuatre' => $chartTrimQuatre,
        ]);
    }

    /** GESTION DES VALIDATIONS DE VEHICULES PHYSIQUES PAR L'ADMINISTRATEUR */

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

    /** GESTION DES DEMANDES DE CONTACT PAR LES CLIENTS OU PROSPECTS */

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



}
