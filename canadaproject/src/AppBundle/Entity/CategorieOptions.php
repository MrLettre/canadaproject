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
     * @ORM\Column(name="exterieurEtChassis", type="string", length=255, nullable=true)
     */
    private $exterieurEtChassis;

    /**
     * @var string|null
     *
     * @ORM\Column(name="interieur", type="string", length=255, nullable=true)
     */
    private $interieur;

    /**
     * @var string|null
     *
     * @ORM\Column(name="securite", type="string", length=255, nullable=true)
     */
    private $securite;

    /**
     * @var string|null
     *
     * @ORM\Column(name="autre", type="string", length=255, nullable=true)
     */
    private $autre;


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
     * Set exterieurEtChassis.
     *
     * @param string|null $exterieurEtChassis
     *
     * @return CategorieOptions
     */
    public function setExterieurEtChassis($exterieurEtChassis = null)
    {
        $this->exterieurEtChassis = $exterieurEtChassis;

        return $this;
    }

    /**
     * Get exterieurEtChassis.
     *
     * @return string|null
     */
    public function getExterieurEtChassis()
    {
        return $this->exterieurEtChassis;
    }

    /**
     * Set interieur.
     *
     * @param string|null $interieur
     *
     * @return CategorieOptions
     */
    public function setInterieur($interieur = null)
    {
        $this->interieur = $interieur;

        return $this;
    }

    /**
     * Get interieur.
     *
     * @return string|null
     */
    public function getInterieur()
    {
        return $this->interieur;
    }

    /**
     * Set s�ecurite.
     *
     * @param string|null $s�ecurite
     *
     * @return CategorieOptions
     */
    public function setS�ecurite($s�ecurite = null)
    {
        $this->s�ecurite = $s�ecurite;

        return $this;
    }

    /**
     * Get s�ecurite.
     *
     * @return string|null
     */
    public function getS�ecurite()
    {
        return $this->s�ecurite;
    }

    /**
     * Set autre.
     *
     * @param string|null $autre
     *
     * @return CategorieOptions
     */
    public function setAutre($autre = null)
    {
        $this->autre = $autre;

        return $this;
    }

    /**
     * Get autre.
     *
     * @return string|null
     */
    public function getAutre()
    {
        return $this->autre;
    }

    /**
     * Set securite.
     *
     * @param string|null $securite
     *
     * @return CategorieOptions
     */
    public function setSecurite($securite = null)
    {
        $this->securite = $securite;

        return $this;
    }

    /**
     * Get securite.
     *
     * @return string|null
     */
    public function getSecurite()
    {
        return $this->securite;
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
}
