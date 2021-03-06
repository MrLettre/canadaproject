<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CategorieOptions
 *
 * @ORM\Table(name="categorie_options")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CategorieOptionsRepository")
 */
class CategorieOptions
{
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\VehicleOption", mappedBy="categorieOption")
     */
    private $options;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=true)
     */
    private $nom;


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
     * Constructor
     */
    public function __construct()
    {
        $this->options = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add option.
     *
     * @param \AppBundle\Entity\VehicleOption $option
     *
     * @return CategorieOptions
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
     * Set categorieOption.
     *
     * @param string|null $categorieOption
     *
     * @return CategorieOptions
     */
    public function setCategorieOption($categorieOption = null)
    {
        $this->categorieOption = $categorieOption;

        return $this;
    }

    /**
     * Get categorieOption.
     *
     * @return string|null
     */
    public function getCategorieOption()
    {
        return $this->categorieOption;
    }

    /**
     * Set nom.
     *
     * @param string|null $nom
     *
     * @return CategorieOptions
     */
    public function setNom($nom = null)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom.
     *
     * @return string|null
     */
    public function getNom()
    {
        return $this->nom;
    }
}
