<?php

namespace AppBundle\Repository;

/**
 * VehicleDefinitionRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class VehicleDefinitionRepository extends \Doctrine\ORM\EntityRepository
{
    public function findVehDefById($id) {
        return $this->getEntityManager()
            ->createQuery("SELECT v FROM AppBundle:VehicleDefinition v WHERE v.id = $id")
            ->getResult();
    }
}
