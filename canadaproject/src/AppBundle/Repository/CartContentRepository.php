<?php

namespace AppBundle\Repository;

/**
 * CartContentRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CartContentRepository extends \Doctrine\ORM\EntityRepository
{

    public function findByUser($userId)
    {
       //select c from AppBundle:CartContent where user = userId join AppBundle:Cart where actif = 1

       $query = $this->createQueryBuilder('c')
       ->where('c.user = :userId')
       ->join('c.cart', 'cart')
       ->andwhere('cart.actif = 1')
       ->setParameter('userId', $userId)
       ->getQuery();

    return $query->getResult(); 

    }

    public function cartCleared()
    {
        
    }


}
