<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Marque
 *
 * @ORM\Table(name="marque")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MarqueRepository")
 */
class Marque
{
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Model", mappedBy="marque")
     */
    private $models;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\VehicleDefinition", mappedBy="marque")
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
     * @return Marque
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
     * @return Marque
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
     * Constructor
     */
    public function __construct()
    {
        $this->models = new \Doctrine\Common\Collections\ArrayCollection();
        $this->vehiculeDefinitions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add model
     *
     * @param \AppBundle\Entity\Model $model
     *
     * @return Marque
     */
    public function addModel(\AppBundle\Entity\Model $model)
    {
        $this->models[] = $model;

        return $this;
    }

    /**
     * Remove model
     *
     * @param \AppBundle\Entity\Model $model
     */
    public function removeModel(\AppBundle\Entity\Model $model)
    {
        $this->models->removeElement($model);
    }

    /**
     * Get models
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getModels()
    {
        return $this->models;
    }

    /**
     * Add vehiculeDefinition
     *
     * @param \AppBundle\Entity\VehicleDefinition $vehiculeDefinition
     *
     * @return Marque
     */
    public function addVehiculeDefinition(\AppBundle\Entity\VehicleDefinition $vehiculeDefinition)
    {
        $this->vehiculeDefinitions[] = $vehiculeDefinition;

        return $this;
    }

    /**
     * Remove vehiculeDefinition
     *
     * @param \AppBundle\Entity\VehicleDefinition $vehiculeDefinition
     */
    public function removeVehiculeDefinition(\AppBundle\Entity\VehicleDefinition $vehiculeDefinition)
    {
        $this->vehiculeDefinitions->removeElement($vehiculeDefinition);
    }

    /**
     * Get vehiculeDefinitions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVehiculeDefinitions()
    {
        return $this->vehiculeDefinitions;
    }
}
