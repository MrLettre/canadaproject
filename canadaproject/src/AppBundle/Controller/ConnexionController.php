<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use FOS\UserBundle\Form\Type\RegistrationFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ConnexionController extends Controller{

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/user_info", name="user_info")
     *
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */

    public function showUserAction()
    {
        if ($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            return $this->render('admin/admin/index.html.twig');
        }

        if ($this->get('security.authorization_checker')->isGranted('ROLE_VENDEUR')) {
            return $this->render('admin/vendeur/index.html.twig');
        }

        if ($this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            return $this->render('admin/user/index.html.twig');
        }
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/profile_user", name="profile_user")
     *
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */

    public function determineUser()
    {
        if ($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            return $this->render('admin/admin/adminProfile.html.twig', array(
                'user'=>$this->getUser(),
            ));      }

        if ($this->get('security.authorization_checker')->isGranted('ROLE_VENDEUR')) {
            return $this->render('admin/vendeur/vendeurProfile.html.twig', array(
                'user'=>$this->getUser(),
            ));        }

        if ($this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            return $this->render('admin/user/userProfile.html.twig', array(
                'user'=>$this->getUser(),
            ));
        }
    }

}