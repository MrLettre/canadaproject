<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VehiclePhyStatut
 *
 * @ORM\Table(name="vehicle_phy_statut")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\VehiclePhyStatutRepository")
 */
class VehiclePhyStatut
{
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\VehiculePhysique", mappedBy="vehiclePhyStatut")
     */
    private $vehiculePhysiques;

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
     * @ORM\Column(name="statut", type="string", length=255, unique=true)
     */
    private $statut;


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
     * Constructor
     */
    public function __construct()
    {
        $this->vehiculePhysiques = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set statut.
     *
     * @param string $statut
     *
     * @return VehiclePhyStatut
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut.
     *
     * @return string
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Add vehiculePhysique.
     *
     * @param \AppBundle\Entity\VehiculePhysique $vehiculePhysique
     *
     * @return VehiclePhyStatut
     */
    public function addVehiculePhysique(\AppBundle\Entity\VehiculePhysique $vehiculePhysique)
    {
        $this->vehiculePhysiques[] = $vehiculePhysique;

        return $this;
    }

    /**
     * Remove vehiculePhysique.
     *
     * @param \AppBundle\Entity\VehiculePhysique $vehiculePhysique
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeVehiculePhysique(\AppBundle\Entity\VehiculePhysique $vehiculePhysique)
    {
        return $this->vehiculePhysiques->removeElement($vehiculePhysique);
    }

    /**
     * Get vehiculePhysiques.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVehiculePhysiques()
    {
        return $this->vehiculePhysiques;
    }
}
