<?php

namespace AppBundle\Repository;

/**
 * VehicleOptionRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class VehicleOptionRepository extends \Doctrine\ORM\EntityRepository
{
    public function findOptionsWithoutOptionsVersion($optionsVersion){
            $query = $this->createQueryBuilder('vo')
               ->select('vo');

            $query = $query->add('where', $query->expr()->notIn('vo.id', ':id'))
                           ->setParameter('id', $optionsVersion)
                           ->getQuery()->getResult();

            return $query;
        //return $this->getEntityManager()
          //  ->createQuery("SELECT vo FROM AppBundle:VehicleOption vo WHERE vo.id NOT IN $optionsVersion")
            //->getResult();

    }
}
