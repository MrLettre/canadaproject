<?php

namespace AppBundle\Repository;

/**
 * LivraisonRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class LivraisonRepository extends \Doctrine\ORM\EntityRepository
{
    public function findLivraisonsEffectuees()
    {
        return $this->getEntityManager()
            ->createQuery("SELECT l FROM AppBundle:Livraison l WHERE l.dateLivraisonEffective IS NOT NULL ORDER BY l.dateLivraisonEffective DESC")
            ->getResult();
    }

    public function findLivraisonsEnAttente()
    {
        return $this->getEntityManager()
            ->createQuery("SELECT l FROM AppBundle:Livraison l WHERE l.dateLivraisonEffective IS NULL ORDER BY l.dateLivraisonPrevisionnelle DESC")
            ->getResult();
    }
}
