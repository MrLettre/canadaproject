<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Cart
 *
 * @ORM\Table(name="cart")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CartRepository")
 */
class Cart
{
    /**
     * Many Users have Many Groups.
     * @ORM\ManyToMany(targetEntity="VehiculePhysique", inversedBy="carts")
     * @ORM\JoinTable(name="VehPhy_carts")
     */
    private $vehiculePhysiques;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Vente", inversedBy="carts")
     * @ORM\JoinColumn(nullable=true)
     */
    private $vente;

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
     * @ORM\Column(name="dateMiseAuPanier", type="datetime")
     */
    private $dateMiseAuPanier;

    public function __construct()
    {
        $this->vehiculePhysiques = new ArrayCollection();
    }


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
     * @return Collection
     */
    public function getVehiculePhysiques(): Collection
    {
        return $this->vehiculePhysiques;
    }

    /**
     * Set dateMiseAuPanier
     *
     * @param \DateTime $dateMiseAuPanier
     *
     * @return Cart
     */
    public function setDateMiseAuPanier($dateMiseAuPanier)
    {
        $this->dateMiseAuPanier = $dateMiseAuPanier;

        return $this;
    }

    /**
     * Get dateMiseAuPanier
     *
     * @return \DateTime
     */
    public function getDateMiseAuPanier()
    {
        return $this->dateMiseAuPanier;
    }

    /**
     * Set vente
     *
     * @param \AppBundle\Entity\Vente $vente
     *
     * @return Cart
     */
    public function setVente(\AppBundle\Entity\Vente $vente)
    {
        $this->vente = $vente;

        return $this;
    }

    /**
     * Get vente
     *
     * @return \AppBundle\Entity\Vente
     */
    public function getVente()
    {
        return $this->vente;
    }

    /**
     * Add vehiculePhysique
     *
     * @param \AppBundle\Entity\VehiculePhysique $vehiculePhysique
     *
     * @return Cart
     */
    public function addVehiculePhysique(\AppBundle\Entity\VehiculePhysique $vehiculePhysique)
    {
        $this->vehiculePhysiques[] = $vehiculePhysique;

        return $this;
    }

    /**
     * Remove vehiculePhysique
     *
     * @param \AppBundle\Entity\VehiculePhysique $vehiculePhysique
     */
    public function removeVehiculePhysique(\AppBundle\Entity\VehiculePhysique $vehiculePhysique)
    {
        $this->vehiculePhysiques->removeElement($vehiculePhysique);
    }
}
