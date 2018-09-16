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
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="brouillon", type="integer", nullable=true)
     */
    private $brouillon;

    /**
     * @var int
     *
     * @ORM\Column(name="enAttenteDeValidation", type="integer", nullable=true)
     */
    private $enAttenteDeValidation;

    /**
     * @var int
     *
     * @ORM\Column(name="enLigne", type="integer", nullable=true)
     */
    private $enLigne;

    /**
     * @var int
     *
     * @ORM\Column(name="refuse", type="integer", nullable=true)
     */
    private $refuse;


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
     * Set brouillon
     *
     * @param integer $brouillon
     *
     * @return VehiclesValidationStatut
     */
    public function setBrouillon($brouillon)
    {
        $this->brouillon = $brouillon;

        return $this;
    }

    /**
     * Get brouillon
     *
     * @return int
     */
    public function getBrouillon()
    {
        return $this->brouillon;
    }

    /**
     * Set enAttenteDeValidation
     *
     * @param integer $enAttenteDeValidation
     *
     * @return VehiclesValidationStatut
     */
    public function setEnAttenteDeValidation($enAttenteDeValidation)
    {
        $this->enAttenteDeValidation = $enAttenteDeValidation;

        return $this;
    }

    /**
     * Get enAttenteDeValidation
     *
     * @return int
     */
    public function getEnAttenteDeValidation()
    {
        return $this->enAttenteDeValidation;
    }

    /**
     * Set enLigne
     *
     * @param integer $enLigne
     *
     * @return VehiclesValidationStatut
     */
    public function setEnLigne($enLigne)
    {
        $this->enLigne = $enLigne;

        return $this;
    }

    /**
     * Get enLigne
     *
     * @return int
     */
    public function getEnLigne()
    {
        return $this->enLigne;
    }

    /**
     * Set refuse
     *
     * @param integer $refuse
     *
     * @return VehiclesValidationStatut
     */
    public function setRefuse($refuse)
    {
        $this->refuse = $refuse;

        return $this;
    }

    /**
     * Get refuse
     *
     * @return int
     */
    public function getRefuse()
    {
        return $this->refuse;
    }
}

