<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VehicleOption
 *
 * @ORM\Table(name="vehicle_option")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\VehicleOptionRepository")
 */
class VehicleOption
{
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\VehicleDefinition", inversedBy="options")
     * @ORM\JoinColumn(nullable=false)
     */
    private $vehiculeDef;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\VehiculePhysique", inversedBy="options")
     * @ORM\JoinColumn(nullable=false)
     */
    private $vehiculePhysique;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, unique=true)
     */
    private $nom;

    /**
     * @var int
     *
     * @ORM\Column(name="actif", type="integer")
     */
    private $actif;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return VehicleOption
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set actif
     *
     * @param integer $actif
     *
     * @return VehicleOption
     */
    public function setActif($actif)
    {
        $this->actif = $actif;

        return $this;
    }

    /**
     * Get actif
     *
     * @return int
     */
    public function getActif()
    {
        return $this->actif;
    }

    /**
     * Set vehiculeDef
     *
     * @param \AppBundle\Entity\VehicleDef $vehiculeDef
     *
     * @return VehicleOption
     */
    public function setVehiculeDef(\AppBundle\Entity\VehicleDef $vehiculeDef)
    {
        $this->vehiculeDef = $vehiculeDef;

        return $this;
    }

    /**
     * Get vehiculeDef
     *
     * @return \AppBundle\Entity\VehicleDef
     */
    public function getVehiculeDef()
    {
        return $this->vehiculeDef;
    }

    /**
     * Set vehiculePhysique
     *
     * @param \AppBundle\Entity\VehiculePhysique $vehiculePhysique
     *
     * @return VehicleOption
     */
    public function setVehiculePhysique(\AppBundle\Entity\VehiculePhysique $vehiculePhysique)
    {
        $this->vehiculePhysique = $vehiculePhysique;

        return $this;
    }

    /**
     * Get vehiculePhysique
     *
     * @return \AppBundle\Entity\VehiculePhysique
     */
    public function getVehiculePhysique()
    {
        return $this->vehiculePhysique;
    }
}
