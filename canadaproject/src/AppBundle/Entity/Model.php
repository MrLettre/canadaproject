<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Model
 *
 * @ORM\Table(name="model")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ModelRepository")
 */
class Model
{
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Marque", inversedBy="models")
     * @ORM\JoinColumn(nullable=false)
     */
    private $marque;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Version", mappedBy="model")
     */
    private $versions;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TypeVehicule", inversedBy="models")
     * @ORM\JoinColumn(nullable=false)
     */
    private $typeVehicule;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\VehicleDefinition", mappedBy="model")
     */
    private $vehiculeDefinitions;

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
        $this->versions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->vehiculeDefinitions = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Model
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
     * @return Model
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
     * Set marque.
     *
     * @param \AppBundle\Entity\Marque $marque
     *
     * @return Model
     */
    public function setMarque(\AppBundle\Entity\Marque $marque)
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * Get marque.
     *
     * @return \AppBundle\Entity\Marque
     */
    public function getMarque()
    {
        return $this->marque;
    }

    /**
     * Add version.
     *
     * @param \AppBundle\Entity\Version $version
     *
     * @return Model
     */
    public function addVersion(\AppBundle\Entity\Version $version)
    {
        $this->versions[] = $version;

        return $this;
    }

    /**
     * Remove version.
     *
     * @param \AppBundle\Entity\Version $version
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeVersion(\AppBundle\Entity\Version $version)
    {
        return $this->versions->removeElement($version);
    }

    /**
     * Get versions.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVersions()
    {
        return $this->versions;
    }

    /**
     * Set typeVehicule.
     *
     * @param \AppBundle\Entity\TypeVehicule $typeVehicule
     *
     * @return Model
     */
    public function setTypeVehicule(\AppBundle\Entity\TypeVehicule $typeVehicule)
    {
        $this->typeVehicule = $typeVehicule;

        return $this;
    }

    /**
     * Get typeVehicule.
     *
     * @return \AppBundle\Entity\TypeVehicule
     */
    public function getTypeVehicule()
    {
        return $this->typeVehicule;
    }

    /**
     * Add vehiculeDefinition.
     *
     * @param \AppBundle\Entity\VehicleDefinition $vehiculeDefinition
     *
     * @return Model
     */
    public function addVehiculeDefinition(\AppBundle\Entity\VehicleDefinition $vehiculeDefinition)
    {
        $this->vehiculeDefinitions[] = $vehiculeDefinition;

        return $this;
    }

    /**
     * Remove vehiculeDefinition.
     *
     * @param \AppBundle\Entity\VehicleDefinition $vehiculeDefinition
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeVehiculeDefinition(\AppBundle\Entity\VehicleDefinition $vehiculeDefinition)
    {
        return $this->vehiculeDefinitions->removeElement($vehiculeDefinition);
    }

    /**
     * Get vehiculeDefinitions.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVehiculeDefinitions()
    {
        return $this->vehiculeDefinitions;
    }
}
