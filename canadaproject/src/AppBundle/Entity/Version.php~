<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Version
 *
 * @ORM\Table(name="version")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\VersionRepository")
 */
class Version
{
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Model", inversedBy="versions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $model;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\BdV", inversedBy="versions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $bdv;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Transmission", inversedBy="versions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $transmission;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Energie", inversedBy="versions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $energie;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\VehicleDefinition", mappedBy="version")
     */
    protected $vehicleDef;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\VehiculePhysique", mappedBy="version")
     */
    private $vehiculePhysiques;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\VehicleOption", cascade={"persist", "remove"})
     */
    private $options;

    /**
     * Many Versions have Many Colors.
     * @ORM\ManyToMany(targetEntity="CouleurDisponible", cascade={"persist", "remove"}, inversedBy="versions")
     * @ORM\JoinTable(name="Couleurs_Version")
     */
    private $couleursDisponibles;

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
     * @ORM\Column(name="actif", type="boolean", options={"default":false})
     */
    private $actif;

    /**
     * @var string
     *
     * @ORM\Column(name="puissanceTh", type="text", nullable=true)
     */
    private $puissanceTh;

    /**
     * @var string
     *
     * @ORM\Column(name="puissanceHy", type="text", nullable=true)
     */
    private $puissanceHy;

    /**
     * @var string
     *
     * @ORM\Column(name="puissanceEl", type="text", nullable=true)
     */
    private $puissanceEl;

    /**
     * @var string
     *
     * @ORM\Column(name="autonimieTh", type="text", nullable=true)
     */
    private $autonimieTh;

    /**
     * @var string
     *
     * @ORM\Column(name="autonomieHy", type="text", nullable=true)
     */
    private $autonomieHy;

    /**
     * @var string
     *
     * @ORM\Column(name="autonomieEl", type="text", nullable=true)
     */
    private $autonomieEl;



    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->nom;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->couleursDisponibles = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom.
     *
     * @param string $nom
     *
     * @return Version
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom.
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set actif.
     *
     * @param bool $actif
     *
     * @return Version
     */
    public function setActif($actif)
    {
        $this->actif = $actif;

        return $this;
    }

    /**
     * Get actif.
     *
     * @return bool
     */
    public function getActif()
    {
        return $this->actif;
    }

    /**
     * Set puissanceTh.
     *
     * @param string|null $puissanceTh
     *
     * @return Version
     */
    public function setPuissanceTh($puissanceTh = null)
    {
        $this->puissanceTh = $puissanceTh;

        return $this;
    }

    /**
     * Get puissanceTh.
     *
     * @return string|null
     */
    public function getPuissanceTh()
    {
        return $this->puissanceTh;
    }

    /**
     * Set puissanceHy.
     *
     * @param string|null $puissanceHy
     *
     * @return Version
     */
    public function setPuissanceHy($puissanceHy = null)
    {
        $this->puissanceHy = $puissanceHy;

        return $this;
    }

    /**
     * Get puissanceHy.
     *
     * @return string|null
     */
    public function getPuissanceHy()
    {
        return $this->puissanceHy;
    }

    /**
     * Set puissanceEl.
     *
     * @param string|null $puissanceEl
     *
     * @return Version
     */
    public function setPuissanceEl($puissanceEl = null)
    {
        $this->puissanceEl = $puissanceEl;

        return $this;
    }

    /**
     * Get puissanceEl.
     *
     * @return string|null
     */
    public function getPuissanceEl()
    {
        return $this->puissanceEl;
    }

    /**
     * Set autonimieTh.
     *
     * @param string|null $autonimieTh
     *
     * @return Version
     */
    public function setAutonimieTh($autonimieTh = null)
    {
        $this->autonimieTh = $autonimieTh;

        return $this;
    }

    /**
     * Get autonimieTh.
     *
     * @return string|null
     */
    public function getAutonimieTh()
    {
        return $this->autonimieTh;
    }

    /**
     * Set autonomieHy.
     *
     * @param string|null $autonomieHy
     *
     * @return Version
     */
    public function setAutonomieHy($autonomieHy = null)
    {
        $this->autonomieHy = $autonomieHy;

        return $this;
    }

    /**
     * Get autonomieHy.
     *
     * @return string|null
     */
    public function getAutonomieHy()
    {
        return $this->autonomieHy;
    }

    /**
     * Set autonomieEl.
     *
     * @param string|null $autonomieEl
     *
     * @return Version
     */
    public function setAutonomieEl($autonomieEl = null)
    {
        $this->autonomieEl = $autonomieEl;

        return $this;
    }

    /**
     * Get autonomieEl.
     *
     * @return string|null
     */
    public function getAutonomieEl()
    {
        return $this->autonomieEl;
    }

    /**
     * Set model.
     *
     * @param \AppBundle\Entity\Model $model
     *
     * @return Version
     */
    public function setModel(\AppBundle\Entity\Model $model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model.
     *
     * @return \AppBundle\Entity\Model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set bdv.
     *
     * @param \AppBundle\Entity\BdV $bdv
     *
     * @return Version
     */
    public function setBdv(\AppBundle\Entity\BdV $bdv)
    {
        $this->bdv = $bdv;

        return $this;
    }

    /**
     * Get bdv.
     *
     * @return \AppBundle\Entity\BdV
     */
    public function getBdv()
    {
        return $this->bdv;
    }

    /**
     * Set transmission.
     *
     * @param \AppBundle\Entity\Transmission $transmission
     *
     * @return Version
     */
    public function setTransmission(\AppBundle\Entity\Transmission $transmission)
    {
        $this->transmission = $transmission;

        return $this;
    }

    /**
     * Get transmission.
     *
     * @return \AppBundle\Entity\Transmission
     */
    public function getTransmission()
    {
        return $this->transmission;
    }

    /**
     * Set energie.
     *
     * @param \AppBundle\Entity\Energie $energie
     *
     * @return Version
     */
    public function setEnergie(\AppBundle\Entity\Energie $energie)
    {
        $this->energie = $energie;

        return $this;
    }

    /**
     * Get energie.
     *
     * @return \AppBundle\Entity\Energie
     */
    public function getEnergie()
    {
        return $this->energie;
    }

    /**
     * Add couleursDisponible.
     *
     * @param \AppBundle\Entity\CouleurDisponible $couleursDisponible
     *
     * @return Version
     */
    public function addCouleursDisponible(\AppBundle\Entity\CouleurDisponible $couleursDisponible)
    {
        $this->couleursDisponibles[] = $couleursDisponible;

        return $this;
    }

    /**
     * Remove couleursDisponible.
     *
     * @param \AppBundle\Entity\CouleurDisponible $couleursDisponible
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeCouleursDisponible(\AppBundle\Entity\CouleurDisponible $couleursDisponible)
    {
        return $this->couleursDisponibles->removeElement($couleursDisponible);
    }

    /**
     * Get couleursDisponibles.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCouleursDisponibles()
    {
        return $this->couleursDisponibles;
    }

    /**
     * Set vehicleDefinition.
     *
     * @param \AppBundle\Entity\VehicleDefinition|null $vehicleDefinition
     *
     * @return Version
     */
    public function setVehicleDefinition(\AppBundle\Entity\VehicleDefinition $vehicleDefinition = null)
    {
        $this->vehicleDefinition = $vehicleDefinition;

        return $this;
    }

    /**
     * Get vehicleDefinition.
     *
     * @return \AppBundle\Entity\VehicleDefinition|null
     */
    public function getVehicleDefinition()
    {
        return $this->vehicleDefinition;
    }

    /**
     * Add vehiculePhysique.
     *
     * @param \AppBundle\Entity\VehiculePhysique $vehiculePhysique
     *
     * @return Version
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

    /**
     * Add option.
     *
     * @param \AppBundle\Entity\VehicleOption $option
     *
     * @return Version
     */
    public function addOption(\AppBundle\Entity\VehicleOption $option)
    {
        $this->options[] = $option;

        return $this;
    }

    /**
     * Remove option.
     *
     * @param \AppBundle\Entity\VehicleOption $option
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeOption(\AppBundle\Entity\VehicleOption $option)
    {
        return $this->options->removeElement($option);
    }

    /**
     * Get options.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Set vehicleDef.
     *
     * @param \AppBundle\Entity\VehicleDefinition|null $vehicleDef
     *
     * @return Version
     */
    public function setVehicleDef(\AppBundle\Entity\VehicleDefinition $vehicleDef = null)
    {
        $this->vehicleDef = $vehicleDef;

        return $this;
    }

    /**
     * Get vehicleDef.
     *
     * @return \AppBundle\Entity\VehicleDefinition|null
     */
    public function getVehicleDef()
    {
        return $this->vehicleDef;
    }
}
