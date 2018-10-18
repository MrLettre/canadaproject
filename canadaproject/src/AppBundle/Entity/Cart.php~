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
     * @ORM\OneToOne(targetEntity=CartContent::class, cascade={"persist", "remove"}, inversedBy="cart")
     * @ORM\JoinColumn(name="cartContent", nullable=false)
     */
    protected $cartContent;

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
     * @ORM\Column(name="dateCreationPanier", type="datetime")
     */
    private $dateCreationPanier;

    /**
     * @var string
     *
     * @ORM\Column(name="referenceCart", type="string")
     */
    private $referenceCart;

    /**
     * @var int
     *
     * @ORM\Column(name="actif", type="boolean", options={"default":false})
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
     * Set dateCreationPanier.
     *
     * @param \DateTime $dateCreationPanier
     *
     * @return Cart
     */
    public function setDateCreationPanier($dateCreationPanier)
    {
        $this->dateCreationPanier = $dateCreationPanier;

        return $this;
    }

    /**
     * Get dateCreationPanier.
     *
     * @return \DateTime
     */
    public function getDateCreationPanier()
    {
        return $this->dateCreationPanier;
    }

    /**
     * Set referenceCart.
     *
     * @param string $referenceCart
     *
     * @return Cart
     */
    public function setReferenceCart($referenceCart)
    {
        $this->referenceCart = $referenceCart;

        return $this;
    }

    /**
     * Get referenceCart.
     *
     * @return string
     */
    public function getReferenceCart()
    {
        return $this->referenceCart;
    }

    /**
     * Set actif.
     *
     * @param bool $actif
     *
     * @return Cart
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
     * Set cartContent.
     *
     * @param \AppBundle\Entity\CartContent $cartContent
     *
     * @return Cart
     */
    public function setCartContent(\AppBundle\Entity\CartContent $cartContent)
    {
        $this->cartContent = $cartContent;

        return $this;
    }

    /**
     * Get cartContent.
     *
     * @return \AppBundle\Entity\CartContent
     */
    public function getCartContent()
    {
        return $this->cartContent;
    }
}
