<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Marque
 *
 * @ORM\Table(name="marque")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MarqueRepository")
 * @Vich\Uploadable
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
     * @ORM\Column(name="actif", type="boolean", options={"default":false})
     */
    private $actif;

    /**
     * @Vich\UploadableField(mapping="logoMarques_images", fileNameProperty="imageName")
     *
     *
     * @Assert\File(
     *     maxSize = "5M",
     *     maxSizeMessage = "Votre fichier est trop volumineux, veuillez choisir un fichier plus petit",
     * )
     * @var File
     */
    protected $imageFile;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $imageName;

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
        $this->models = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Marque
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
     * @return Marque
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
     * Set imageFile.
     *
     * @param string $imageFile
     *
     * @return Marque
     */
    public function setImageFile($imageFile)
    {
        $this->imageFile = $imageFile;

        return $this;
    }

    /**
     * Get imageFile.
     *
     * @return string
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * Set imageName.
     *
     * @param string $imageName
     *
     * @return Marque
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;

        return $this;
    }

    /**
     * Get imageName.
     *
     * @return string
     */
    public function getImageName()
    {
        return $this->imageName;
    }

    /**
     * Add model.
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
     * Remove model.
     *
     * @param \AppBundle\Entity\Model $model
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeModel(\AppBundle\Entity\Model $model)
    {
        return $this->models->removeElement($model);
    }

        /**
     * Set model.
     *
     * @param string $model
     *
     * @return Marque
     */
    public function setModel($models)
    {
        $this->models = $models;

        return $this;
    }

    /**
     * Get models.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getModels()
    {
        return $this->models;
    }

    /**
     * Add vehiculeDefinition.
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
