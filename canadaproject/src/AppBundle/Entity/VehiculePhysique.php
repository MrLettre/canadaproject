<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VehiculePhysique
 *
 * @ORM\Table(name="vehicule_physique")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\VehiculePhysiqueRepository")
 */
class VehiculePhysique
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
     * @var \DateTime
     *
     * @ORM\Column(name="dateMiseEnLigne", type="date", nullable=true)
     */
    private $dateMiseEnLigne;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDeVente", type="date", nullable=true)
     */
    private $dateDeVente;

    /**
     * @var int
     *
     * @ORM\Column(name="kilometrage", type="integer")
     */
    private $kilometrage;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDeMiseEnCirculation", type="date")
     */
    private $dateDeMiseEnCirculation;

    /**
     * @var int
     *
     * @ORM\Column(name="prixHT", type="integer")
     */
    private $prixHT;

    /**
     * @var int
     *
     * @ORM\Column(name="prixTTC", type="integer")
     */
    private $prixTTC;

    /**
     * @var int
     *
     * @ORM\Column(name="prixHA", type="integer")
     */
    private $prixHA;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptif", type="text")
     */
    private $descriptif;


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
     * Set dateMiseEnLigne
     *
     * @param \DateTime $dateMiseEnLigne
     *
     * @return VehiculePhysique
     */
    public function setDateMiseEnLigne($dateMiseEnLigne)
    {
        $this->dateMiseEnLigne = $dateMiseEnLigne;

        return $this;
    }

    /**
     * Get dateMiseEnLigne
     *
     * @return \DateTime
     */
    public function getDateMiseEnLigne()
    {
        return $this->dateMiseEnLigne;
    }

    /**
     * Set dateDeVente
     *
     * @param \DateTime $dateDeVente
     *
     * @return VehiculePhysique
     */
    public function setDateDeVente($dateDeVente)
    {
        $this->dateDeVente = $dateDeVente;

        return $this;
    }

    /**
     * Get dateDeVente
     *
     * @return \DateTime
     */
    public function getDateDeVente()
    {
        return $this->dateDeVente;
    }

    /**
     * Set kilometrage
     *
     * @param integer $kilometrage
     *
     * @return VehiculePhysique
     */
    public function setKilometrage($kilometrage)
    {
        $this->kilometrage = $kilometrage;

        return $this;
    }

    /**
     * Get kilometrage
     *
     * @return int
     */
    public function getKilometrage()
    {
        return $this->kilometrage;
    }

    /**
     * Set dateDeMiseEnCirculation
     *
     * @param \DateTime $dateDeMiseEnCirculation
     *
     * @return VehiculePhysique
     */
    public function setDateDeMiseEnCirculation($dateDeMiseEnCirculation)
    {
        $this->dateDeMiseEnCirculation = $dateDeMiseEnCirculation;

        return $this;
    }

    /**
     * Get dateDeMiseEnCirculation
     *
     * @return \DateTime
     */
    public function getDateDeMiseEnCirculation()
    {
        return $this->dateDeMiseEnCirculation;
    }

    /**
     * Set prixHT
     *
     * @param integer $prixHT
     *
     * @return VehiculePhysique
     */
    public function setPrixHT($prixHT)
    {
        $this->prixHT = $prixHT;

        return $this;
    }

    /**
     * Get prixHT
     *
     * @return int
     */
    public function getPrixHT()
    {
        return $this->prixHT;
    }

    /**
     * Set prixTTC
     *
     * @param integer $prixTTC
     *
     * @return VehiculePhysique
     */
    public function setPrixTTC($prixTTC)
    {
        $this->prixTTC = $prixTTC;

        return $this;
    }

    /**
     * Get prixTTC
     *
     * @return int
     */
    public function getPrixTTC()
    {
        return $this->prixTTC;
    }

    /**
     * Set prixHA
     *
     * @param integer $prixHA
     *
     * @return VehiculePhysique
     */
    public function setPrixHA($prixHA)
    {
        $this->prixHA = $prixHA;

        return $this;
    }

    /**
     * Get prixHA
     *
     * @return int
     */
    public function getPrixHA()
    {
        return $this->prixHA;
    }

    /**
     * Set descriptif
     *
     * @param string $descriptif
     *
     * @return VehiculePhysique
     */
    public function setDescriptif($descriptif)
    {
        $this->descriptif = $descriptif;

        return $this;
    }

    /**
     * Get descriptif
     *
     * @return string
     */
    public function getDescriptif()
    {
        return $this->descriptif;
    }
}

