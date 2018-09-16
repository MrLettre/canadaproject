<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VehicleDefinition
 *
 * @ORM\Table(name="vehicle_definition")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\VehicleDefinitionRepository")
 */
class VehicleDefinition
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}

