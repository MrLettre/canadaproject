<?php

namespace AppBundle\Repository;

/**
 * CartRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CartRepository extends \Doctrine\ORM\EntityRepository
{


// Recuperation des ventes totales 

    public function ventesTotales()
    {
        $dql = 'SELECT c FROM AppBundle:Cart c where c.vente is not null order by c.dateMiseAuPanier ASC';
        $query = $this->getEntityManager()->createQuery($dql);
        return $query->execute();
    }


// Recuperation des ventes annuelles

    public function ventesAnnuelles($debutAnnee, $finAnnee)
    {
        $query = $this->createQueryBuilder('c')
                 ->where('c.vente is not null')
                 ->andWhere('c.dateMiseAuPanier BETWEEN :debutAnnee AND :finAnnee')
                 ->orderBy('c.dateMiseAuPanier', 'ASC')
                 ->setParameter('debutAnnee', $debutAnnee.'0101')  
                 ->setParameter('finAnnee', $finAnnee.'1231')
                 ->getQuery();

        return $query->getResult();         
    }


// Recuperation des ventes 1er trimestre

    public function ventesTrimUn($premierTriDeb, $premierTriFin)
    {
        $query = $this->createQueryBuilder('c')
                 ->where('c.vente is not null')
                 ->andWhere('c.dateMiseAuPanier BETWEEN :premierTriDeb AND :premierTriFin')
                 ->setParameter('premierTriDeb', $premierTriDeb.'0101')  
                 ->setParameter('premierTriFin', $premierTriFin.'0331')
                 ->orderBy('c.dateMiseAuPanier', 'ASC')
                 ->getQuery();

        return $query->getResult();         
    }


// Recuperation des ventes 2eme trimestre

    public function ventesTrimDeux($deuxiemeTriDeb, $deuxiemeTriFin)
    {
        $query = $this->createQueryBuilder('c')
            ->where('c.vente is not null')
            ->andWhere('c.dateMiseAuPanier BETWEEN :premierTriDeb AND :premierTriFin')
            ->setParameter('premierTriDeb', $deuxiemeTriDeb . '0401')
            ->setParameter('premierTriFin', $deuxiemeTriFin . '0630')
            ->orderBy('c.dateMiseAuPanier', 'ASC')
            ->getQuery();

        return $query->getResult();
    }


// Recuperation des ventes 3eme trimestre

    public function ventesTrimTrois($troisiemeTriDeb, $troisiemeTriFin)
    {
        $query = $this->createQueryBuilder('c')
            ->where('c.vente is not null')
            ->andWhere('c.dateMiseAuPanier BETWEEN :premierTriDeb AND :premierTriFin')
            ->setParameter('premierTriDeb', $troisiemeTriDeb . '0701')
            ->setParameter('premierTriFin', $troisiemeTriFin . '0930')
            ->orderBy('c.dateMiseAuPanier', 'ASC')
            ->getQuery();

        return $query->getResult();
    }


 // Recuperation des ventes 4eme trimestre

    public function ventesTrimQuatre($quatriemeTriDeb, $quatriemeTriFin)
    {
        $query = $this->createQueryBuilder('c')
            ->where('c.vente is not null')
            ->andWhere('c.dateMiseAuPanier BETWEEN :premierTriDeb AND :premierTriFin')
            ->setParameter('premierTriDeb', $quatriemeTriDeb . '1001')
            ->setParameter('premierTriFin', $quatriemeTriFin . '1231')
            ->orderBy('c.dateMiseAuPanier', 'ASC')
            ->getQuery();

        return $query->getResult();
    }    
    
    
    // Recuperation des ventes annuelles

    public function ventesJanvier($debutAnnee, $finAnnee)
    {
        $query = $this->createQueryBuilder('c')
                 ->where('c.vente is not null')
                 ->andWhere('c.dateMiseAuPanier BETWEEN :debutAnnee AND :finAnnee')
                 ->orderBy('c.dateMiseAuPanier', 'ASC')
                 ->setParameter('debutAnnee', $debutAnnee.'0101')  
                 ->setParameter('finAnnee', $finAnnee.'0131')
                 ->getQuery();

        return $query->getResult();         
    }

        // Recuperation des ventes annuelles

        public function ventesFevrier($debutAnnee, $finAnnee)
        {
            $query = $this->createQueryBuilder('c')
                     ->where('c.vente is not null')
                     ->andWhere('c.dateMiseAuPanier BETWEEN :debutAnnee AND :finAnnee')
                     ->orderBy('c.dateMiseAuPanier', 'ASC')
                     ->setParameter('debutAnnee', $debutAnnee.'0201')  
                     ->setParameter('finAnnee', $finAnnee.'0229')
                     ->getQuery();
    
            return $query->getResult();         
        }


            // Recuperation des ventes annuelles

    public function ventesMars($debutAnnee, $finAnnee)
    {
        $query = $this->createQueryBuilder('c')
                 ->where('c.vente is not null')
                 ->andWhere('c.dateMiseAuPanier BETWEEN :debutAnnee AND :finAnnee')
                 ->orderBy('c.dateMiseAuPanier', 'ASC')
                 ->setParameter('debutAnnee', $debutAnnee.'0301')  
                 ->setParameter('finAnnee', $finAnnee.'0331')
                 ->getQuery();

        return $query->getResult();         
    }


        // Recuperation des ventes annuelles

        public function ventesAvril($debutAnnee, $finAnnee)
        {
            $query = $this->createQueryBuilder('c')
                     ->where('c.vente is not null')
                     ->andWhere('c.dateMiseAuPanier BETWEEN :debutAnnee AND :finAnnee')
                     ->orderBy('c.dateMiseAuPanier', 'ASC')
                     ->setParameter('debutAnnee', $debutAnnee.'0401')  
                     ->setParameter('finAnnee', $finAnnee.'0430')
                     ->getQuery();
    
            return $query->getResult();         
        }

            // Recuperation des ventes annuelles

    public function ventesMai($debutAnnee, $finAnnee)
    {
        $query = $this->createQueryBuilder('c')
                 ->where('c.vente is not null')
                 ->andWhere('c.dateMiseAuPanier BETWEEN :debutAnnee AND :finAnnee')
                 ->orderBy('c.dateMiseAuPanier', 'ASC')
                 ->setParameter('debutAnnee', $debutAnnee.'0501')  
                 ->setParameter('finAnnee', $finAnnee.'0531')
                 ->getQuery();

        return $query->getResult();         
    }


        // Recuperation des ventes annuelles

        public function ventesJuin($debutAnnee, $finAnnee)
        {
            $query = $this->createQueryBuilder('c')
                     ->where('c.vente is not null')
                     ->andWhere('c.dateMiseAuPanier BETWEEN :debutAnnee AND :finAnnee')
                     ->orderBy('c.dateMiseAuPanier', 'ASC')
                     ->setParameter('debutAnnee', $debutAnnee.'0601')  
                     ->setParameter('finAnnee', $finAnnee.'0631')
                     ->getQuery();
    
            return $query->getResult();         
        }

            // Recuperation des ventes annuelles

    public function ventesJuillet($debutAnnee, $finAnnee)
    {
        $query = $this->createQueryBuilder('c')
                 ->where('c.vente is not null')
                 ->andWhere('c.dateMiseAuPanier BETWEEN :debutAnnee AND :finAnnee')
                 ->orderBy('c.dateMiseAuPanier', 'ASC')
                 ->setParameter('debutAnnee', $debutAnnee.'0701')  
                 ->setParameter('finAnnee', $finAnnee.'0731')
                 ->getQuery();

        return $query->getResult();         
    }


        // Recuperation des ventes annuelles

        public function ventesAout($debutAnnee, $finAnnee)
        {
            $query = $this->createQueryBuilder('c')
                     ->where('c.vente is not null')
                     ->andWhere('c.dateMiseAuPanier BETWEEN :debutAnnee AND :finAnnee')
                     ->orderBy('c.dateMiseAuPanier', 'ASC')
                     ->setParameter('debutAnnee', $debutAnnee.'0801')  
                     ->setParameter('finAnnee', $finAnnee.'0831')
                     ->getQuery();
    
            return $query->getResult();         
        }

            // Recuperation des ventes annuelles

    public function ventesSeptembre($debutAnnee, $finAnnee)
    {
        $query = $this->createQueryBuilder('c')
                 ->where('c.vente is not null')
                 ->andWhere('c.dateMiseAuPanier BETWEEN :debutAnnee AND :finAnnee')
                 ->orderBy('c.dateMiseAuPanier', 'ASC')
                 ->setParameter('debutAnnee', $debutAnnee.'0901')  
                 ->setParameter('finAnnee', $finAnnee.'0931')
                 ->getQuery();

        return $query->getResult();         
    }

        // Recuperation des ventes annuelles

        public function ventesOctobre($debutAnnee, $finAnnee)
        {
            $query = $this->createQueryBuilder('c')
                     ->where('c.vente is not null')
                     ->andWhere('c.dateMiseAuPanier BETWEEN :debutAnnee AND :finAnnee')
                     ->orderBy('c.dateMiseAuPanier', 'ASC')
                     ->setParameter('debutAnnee', $debutAnnee.'1001')  
                     ->setParameter('finAnnee', $finAnnee.'1031')
                     ->getQuery();
    
            return $query->getResult();         
        }

            // Recuperation des ventes annuelles

    public function ventesNovembre($debutAnnee, $finAnnee)
    {
        $query = $this->createQueryBuilder('c')
                 ->where('c.vente is not null')
                 ->andWhere('c.dateMiseAuPanier BETWEEN :debutAnnee AND :finAnnee')
                 ->orderBy('c.dateMiseAuPanier', 'ASC')
                 ->setParameter('debutAnnee', $debutAnnee.'1101')  
                 ->setParameter('finAnnee', $finAnnee.'1131')
                 ->getQuery();

        return $query->getResult();         
    }

        // Recuperation des ventes annuelles

        public function ventesDecembre($debutAnnee, $finAnnee)
        {
            $query = $this->createQueryBuilder('c')
                     ->where('c.vente is not null')
                     ->andWhere('c.dateMiseAuPanier BETWEEN :debutAnnee AND :finAnnee')
                     ->orderBy('c.dateMiseAuPanier', 'ASC')
                     ->setParameter('debutAnnee', $debutAnnee.'1201')  
                     ->setParameter('finAnnee', $finAnnee.'1231')
                     ->getQuery();
    
            return $query->getResult();         
        }

        public function findByUserID($user)
        {
            $query = $this->createQueryBuilder('c')
                ->join('c.cartContent', 'content')
                ->where('content.user = :user')
                ->andwhere('c.actif = 1')
                ->setParameter('user', $user)
                ->getQuery();

            return $query->getResult();

        }


}
