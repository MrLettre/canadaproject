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
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Version", mappedBy="vehicleDefinition")
     */
    protected $version;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\VehicleOption", mappedBy="vehiculeDef")
     */
    private $options;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Marque", inversedBy="vehiculeDefinitions")
     * @ORM\JoinColumn(nullable=true)
     */
    private $marque;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Model", inversedBy="vehiculeDefinitions")
     * @ORM\JoinColumn(nullable=true)
     */
    private $model;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TypeVehicule", inversedBy="vehiculeDefinitions")
     * @ORM\JoinColumn(nullable=true)
     */
    private $typeVehicule;

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
        $this->options = new \Doctrine\Common\Collections\ArrayCollection();
        $this->vehiculePhysiques = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return VehicleDefinition
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
     * Set version.
     *
     * @param \AppBundle\Entity\Version|null $version
     *
     * @return VehicleDefinition
     */
    public function setVersion(\AppBundle\Entity\Version $version = null)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Get version.
     *
     * @return \AppBundle\Entity\Version|null
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Add option.
     *
     * @param \AppBundle\Entity\VehicleOption $option
     *
     * @return VehicleDefinition
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
     * Add vehiculePhysique.
     *
     * @param \AppBundle\Entity\VehiculePhysique $vehiculePhysique
     *
     * @return VehicleDefinition
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
     * Set marque.
     *
     * @param \AppBundle\Entity\Marque|null $marque
     *
     * @return VehicleDefinition
     */
    public function setMarque(\AppBundle\Entity\Marque $marque = null)
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * Get marque.
     *
     * @return \AppBundle\Entity\Marque|null
     */
    public function getMarque()
    {
        return $this->marque;
    }

    /**
     * Set model.
     *
     * @param \AppBundle\Entity\Model|null $model
     *
     * @return VehicleDefinition
     */
    public function setModel(\AppBundle\Entity\Model $model = null)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model.
     *
     * @return \AppBundle\Entity\Model|null
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set typeVehicule.
     *
     * @param \AppBundle\Entity\TypeVehicule|null $typeVehicule
     *
     * @return VehicleDefinition
     */
    public function setTypeVehicule(\AppBundle\Entity\TypeVehicule $typeVehicule = null)
    {
        $this->typeVehicule = $typeVehicule;

        return $this;
    }

    /**
     * Get typeVehicule.
     *
     * @return \AppBundle\Entity\TypeVehicule|null
     */
    public function getTypeVehicule()
    {
        return $this->typeVehicule;
    }
}
