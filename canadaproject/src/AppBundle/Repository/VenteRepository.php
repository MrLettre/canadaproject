<?php

namespace AppBundle\Repository;

/**
 * VenteRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class VenteRepository extends \Doctrine\ORM\EntityRepository
{

    public function vente()
    {

        $dql = 'SELECT v FROM AppBundle:Vente v where v.id > 0';
        $query = $this->getEntityManager()->createQuery($dql);
        return $query->execute();

    }

}
