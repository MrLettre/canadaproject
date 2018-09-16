<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VehiclePhyStatut
 *
 * @ORM\Table(name="vehicle_phy_statut")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\VehiclePhyStatutRepository")
 */
class VehiclePhyStatut
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
     * @ORM\Column(name="disponible", type="integer", nullable=true)
     */
    private $disponible;

    /**
     * @var int
     *
     * @ORM\Column(name="vendu", type="integer", nullable=true)
     */
    private $vendu;

    /**
     * @var int
     *
     * @ORM\Column(name="enEssai", type="integer", nullable=true)
     */
    private $enEssai;

    /**
     * @var int
     *
     * @ORM\Column(name="retireParLeVendeur", type="integer", nullable=true)
     */
    private $retireParLeVendeur;


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
     * Set disponible
     *
     * @param integer $disponible
     *
     * @return VehiclePhyStatut
     */
    public function setDisponible($disponible)
    {
        $this->disponible = $disponible;

        return $this;
    }

    /**
     * Get disponible
     *
     * @return int
     */
    public function getDisponible()
    {
        return $this->disponible;
    }

    /**
     * Set vendu
     *
     * @param integer $vendu
     *
     * @return VehiclePhyStatut
     */
    public function setVendu($vendu)
    {
        $this->vendu = $vendu;

        return $this;
    }

    /**
     * Get vendu
     *
     * @return int
     */
    public function getVendu()
    {
        return $this->vendu;
    }

    /**
     * Set enEssai
     *
     * @param integer $enEssai
     *
     * @return VehiclePhyStatut
     */
    public function setEnEssai($enEssai)
    {
        $this->enEssai = $enEssai;

        return $this;
    }

    /**
     * Get enEssai
     *
     * @return int
     */
    public function getEnEssai()
    {
        return $this->enEssai;
    }

    /**
     * Set retireParLeVendeur
     *
     * @param integer $retireParLeVendeur
     *
     * @return VehiclePhyStatut
     */
    public function setRetireParLeVendeur($retireParLeVendeur)
    {
        $this->retireParLeVendeur = $retireParLeVendeur;

        return $this;
    }

    /**
     * Get retireParLeVendeur
     *
     * @return int
     */
    public function getRetireParLeVendeur()
    {
        return $this->retireParLeVendeur;
    }
}

