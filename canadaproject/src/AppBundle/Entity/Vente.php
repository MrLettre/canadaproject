<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vente
 *
 * @ORM\Table(name="vente")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\VenteRepository")
 */
class Vente
{
    /**
     * @ORM\OneToOne(targetEntity=CartContent::class, mappedBy="vente")
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
     * @var string
     *
     * @ORM\Column(name="referenceVente", type="string")
     */
    private $referenceVente;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateVente", type="datetime")
     */
    private $dateVente;


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
     * Set referenceVente.
     *
     * @param string $referenceVente
     *
     * @return Vente
     */
    public function setReferenceVente($referenceVente)
    {
        $this->referenceVente = $referenceVente;

        return $this;
    }

    /**
     * Get referenceVente.
     *
     * @return string
     */
    public function getReferenceVente()
    {
        return $this->referenceVente;
    }

    /**
     * Set dateVente.
     *
     * @param \DateTime $dateVente
     *
     * @return Vente
     */
    public function setDateVente($dateVente)
    {
        $this->dateVente = $dateVente;

        return $this;
    }

    /**
     * Get dateVente.
     *
     * @return \DateTime
     */
    public function getDateVente()
    {
        return $this->dateVente;
    }

    /**
     * Set cartContent.
     *
     * @param \AppBundle\Entity\CartContent $cartContent
     *
     * @return Vente
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
