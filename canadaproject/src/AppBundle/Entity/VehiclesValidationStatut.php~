<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VehiclesValidationStatut
 *
 * @ORM\Table(name="vehicles_validation_statut")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\VehiclesValidationStatutRepository")
 */
class VehiclesValidationStatut
{
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\VehiculePhysique", mappedBy="validationStatut")
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
     * @ORM\Column(name="statut", type="string", nullable=false)
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
     * Add vehiculePhysique
     *
     * @param \AppBundle\Entity\VehiculePhysique $vehiculePhysique
     *
     * @return VehiclesValidationStatut
     */
    public function addVehiculePhysique(\AppBundle\Entity\VehiculePhysique $vehiculePhysique)
    {
        $this->vehiculePhysiques[] = $vehiculePhysique;

        return $this;
    }

    /**
     * Remove vehiculePhysique
     *
     * @param \AppBundle\Entity\VehiculePhysique $vehiculePhysique
     */
    public function removeVehiculePhysique(\AppBundle\Entity\VehiculePhysique $vehiculePhysique)
    {
        $this->vehiculePhysiques->removeElement($vehiculePhysique);
    }

    /**
     * Get vehiculePhysiques
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVehiculePhysiques()
    {
        return $this->vehiculePhysiques;
    }

    /**
     * Set statut.
     *
     * @param string|null $statut
     *
     * @return VehiclesValidationStatut
     */
    public function setStatut($statut = null)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut.
     *
     * @return string|null
     */
    public function getStatut()
    {
        return $this->statut;
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->statut;
    }

}
