<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Recherche
 *
 * @ORM\Table(name="recherche")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RechercheRepository")
 */
class Recherche
{
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
     * @ORM\Column(name="marque", type="string", length=255, nullable=true)
     */
    private $marque;

    /**
     * @var string|null
     *
     * @ORM\Column(name="model", type="string", length=255, nullable=true)
     */
    private $model;

    /**
     * @var string|null
     *
     * @ORM\Column(name="version", type="string", length=255, nullable=true)
     */
    private $version;

    /**
     * @var int|null
     *
     * @ORM\Column(name="prixMax", type="integer", nullable=true)
     */
    private $prixMax;

    /**
     * @var int|null
     *
     * @ORM\Column(name="prixMin", type="integer", nullable=true)
     */
    private $prixMin;

    /**
     * @var int|null
     *
     * @ORM\Column(name="dateDeMiseEnCirculationMax", type="integer", nullable=true)
     */
    private $dateDeMiseEnCirculationMax;

    /**
     * @var int|null
     *
     * @ORM\Column(name="dateDeMiseEnCirculationMin", type="integer", nullable=true)
     */
    private $dateDeMiseEnCirculationMin;

    /**
     * @var int|null
     *
     * @ORM\Column(name="kilometeMax", type="integer", nullable=true)
     */
    private $kilometeMax;

    /**
     * @var int|null
     *
     * @ORM\Column(name="kilometreMin", type="integer", nullable=true)
     */
    private $kilometreMin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="energie", type="string", length=255, nullable=true)
     */
    private $energie;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Bdv", type="string", length=255, nullable=true)
     */
    private $bdv;


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
     * Set marque.
     *
     * @param string|null $marque
     *
     * @return Recherche
     */
    public function setMarque($marque = null)
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * Get marque.
     *
     * @return string|null
     */
    public function getMarque()
    {
        return $this->marque;
    }

    /**
     * Set model.
     *
     * @param string|null $model
     *
     * @return Recherche
     */
    public function setModel($model = null)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model.
     *
     * @return string|null
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set version.
     *
     * @param string|null $version
     *
     * @return Recherche
     */
    public function setVersion($version = null)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Get version.
     *
     * @return string|null
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set prixMax.
     *
     * @param int|null $prixMax
     *
     * @return Recherche
     */
    public function setPrixMax($prixMax = null)
    {
        $this->prixMax = $prixMax;

        return $this;
    }

    /**
     * Get prixMax.
     *
     * @return int|null
     */
    public function getPrixMax()
    {
        return $this->prixMax;
    }

    /**
     * Set prixMin.
     *
     * @param int|null $prixMin
     *
     * @return Recherche
     */
    public function setPrixMin($prixMin = null)
    {
        $this->prixMin = $prixMin;

        return $this;
    }

    /**
     * Get prixMin.
     *
     * @return int|null
     */
    public function getPrixMin()
    {
        return $this->prixMin;
    }

    /**
     * Set dateDeMiseEnCirculationMax.
     *
     * @param \DateTime|null $dateDeMiseEnCirculationMax
     *
     * @return Recherche
     */
    public function setDateDeMiseEnCirculationMax($dateDeMiseEnCirculationMax = null)
    {
        $this->dateDeMiseEnCirculationMax = $dateDeMiseEnCirculationMax;

        return $this;
    }

    /**
     * Get dateDeMiseEnCirculationMax.
     *
     * @return \DateTime|null
     */
    public function getDateDeMiseEnCirculationMax()
    {
        return $this->dateDeMiseEnCirculationMax;
    }

    /**
     * Set dateDeMiseEnCirculationMin.
     *
     * @param \DateTime|null $dateDeMiseEnCirculationMin
     *
     * @return Recherche
     */
    public function setDateDeMiseEnCirculationMin($dateDeMiseEnCirculationMin = null)
    {
        $this->dateDeMiseEnCirculationMin = $dateDeMiseEnCirculationMin;

        return $this;
    }

    /**
     * Get dateDeMiseEnCirculationMin.
     *
     * @return \DateTime|null
     */
    public function getDateDeMiseEnCirculationMin()
    {
        return $this->dateDeMiseEnCirculationMin;
    }

    /**
     * Set kilometeMax.
     *
     * @param int|null $kilometeMax
     *
     * @return Recherche
     */
    public function setKilometeMax($kilometeMax = null)
    {
        $this->kilometeMax = $kilometeMax;

        return $this;
    }

    /**
     * Get kilometeMax.
     *
     * @return int|null
     */
    public function getKilometeMax()
    {
        return $this->kilometeMax;
    }

    /**
     * Set kilometreMin.
     *
     * @param int|null $kilometreMin
     *
     * @return Recherche
     */
    public function setKilometreMin($kilometreMin = null)
    {
        $this->kilometreMin = $kilometreMin;

        return $this;
    }

    /**
     * Get kilometreMin.
     *
     * @return int|null
     */
    public function getKilometreMin()
    {
        return $this->kilometreMin;
    }

    /**
     * Set energie.
     *
     * @param string|null $energie
     *
     * @return Recherche
     */
    public function setEnergie($energie = null)
    {
        $this->energie = $energie;

        return $this;
    }

    /**
     * Get energie.
     *
     * @return string|null
     */
    public function getEnergie()
    {
        return $this->energie;
    }

    /**
     * Set bdv.
     *
     * @param string|null $bdv
     *
     * @return Recherche
     */
    public function setBdv($bdv = null)
    {
        $this->bdv = $bdv;

        return $this;
    }

    /**
     * Get bdv.
     *
     * @return string|null
     */
    public function getBdv()
    {
        return $this->bdv;
    }
}
