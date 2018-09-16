<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cart
 *
 * @ORM\Table(name="cart")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CartRepository")
 */
class Cart
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
     * @ORM\Column(name="dateMiseAuPanier", type="datetime")
     */
    private $dateMiseAuPanier;


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
}

