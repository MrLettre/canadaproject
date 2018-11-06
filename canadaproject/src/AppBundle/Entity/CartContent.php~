<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CartContent
 *
 * @ORM\Table(name="cart_content")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CartContentRepository")
 */
class CartContent
{

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="cartContents")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\VehiculePhysique", inversedBy="cartContents")
     * @ORM\JoinColumn(nullable=true)
     */
    private $vehiculePhysique;

    /**
     * @ORM\OneToOne(targetEntity=Cart::class, cascade={"persist", "remove"}, inversedBy="cartContent")
     * @ORM\JoinColumn(name="cart", nullable=false)
     */
    protected $cart;

    /**
     * @ORM\OneToOne(targetEntity=Vente::class, cascade={"persist", "remove"}, inversedBy="cartContent")
     * @ORM\JoinColumn(name="Vente", nullable=true)
     */
    protected $vente;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateMiseAJourPanier", type="datetime", nullable=true)
     */
    private $dateMiseAJourPanier;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateMiseAuPanier", type="datetime")
     */
    private $dateMiseAuPanier;


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
     * Set dateMiseAJourPanier.
     *
     * @param \DateTime|null $dateMiseAJourPanier
     *
     * @return CartContent
     */
    public function setDateMiseAJourPanier($dateMiseAJourPanier = null)
    {
        $this->dateMiseAJourPanier = $dateMiseAJourPanier;

        return $this;
    }

    /**
     * Get dateMiseAJourPanier.
     *
     * @return \DateTime|null
     */
    public function getDateMiseAJourPanier()
    {
        return $this->dateMiseAJourPanier;
    }

    /**
     * Set dateMiseAuPanier.
     *
     * @param \DateTime $dateMiseAuPanier
     *
     * @return CartContent
     */
    public function setDateMiseAuPanier($dateMiseAuPanier)
    {
        $this->dateMiseAuPanier = $dateMiseAuPanier;

        return $this;
    }

    /**
     * Get dateMiseAuPanier.
     *
     * @return \DateTime
     */
    public function getDateMiseAuPanier()
    {
        return $this->dateMiseAuPanier;
    }

    /**
     * Set vehiculePhysique.
     *
     * @param \AppBundle\Entity\VehiculePhysique|null $vehiculePhysique
     *
     * @return CartContent
     */
    public function setVehiculePhysique(\AppBundle\Entity\VehiculePhysique $vehiculePhysique = null)
    {
        $this->vehiculePhysique = $vehiculePhysique;

        return $this;
    }

    /**
     * Get vehiculePhysique.
     *
     * @return \AppBundle\Entity\VehiculePhysique|null
     */
    public function getVehiculePhysique()
    {
        return $this->vehiculePhysique;
    }

    /**
     * Set cart.
     *
     * @param \AppBundle\Entity\Cart|null $cart
     *
     * @return CartContent
     */
    public function setCart(\AppBundle\Entity\Cart $cart = null)
    {
        $this->cart = $cart;

        return $this;
    }

    /**
     * Get cart.
     *
     * @return \AppBundle\Entity\Cart|null
     */
    public function getCart()
    {
        return $this->cart;
    }

    /**
     * Set vente.
     *
     * @param \AppBundle\Entity\Vente|null $vente
     *
     * @return CartContent
     */
    public function setVente(\AppBundle\Entity\Vente $vente = null)
    {
        $this->vente = $vente;

        return $this;
    }

    /**
     * Get vente.
     *
     * @return \AppBundle\Entity\Vente|null
     */
    public function getVente()
    {
        return $this->vente;
    }

    public function __toString()
    {
        return $this->dateMiseAuPanier;
    }


    /**
     * Set user.
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return CartContent
     */
    public function setUser(\AppBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user.
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
