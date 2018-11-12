<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Livraison
 *
 * @ORM\Table(name="livraison")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LivraisonRepository")
 */
class Livraison
{
    /**
     * One Cart has One Customer.
     * @ORM\OneToOne(targetEntity="Vente", mappedBy="livraison")
     */
    private $vente;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ModeDeLivraison", inversedBy="livraisons")
     * @ORM\JoinColumn(nullable=false)
     */
    private $modeDeLivraison;

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
     * @ORM\Column(name="reference", type="string", length=32, unique=true, nullable=true)
     */
    private $reference;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateHA", type="datetime", nullable=true)
     */
    private $dateHA;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateLivraisonPrevisionnelle", type="date", nullable=true)
     */
    private $dateLivraisonPrevisionnelle;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateLivraisonEffective", type="datetime", nullable=true)
     */
    private $dateLivraisonEffective;


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
     * Set reference.
     *
     * @param string $reference
     *
     * @return Livraison
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference.
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set dateHA.
     *
     * @param \DateTime $dateHA
     *
     * @return Livraison
     */
    public function setDateHA($dateHA)
    {
        $this->dateHA = $dateHA;

        return $this;
    }

    /**
     * Get dateHA.
     *
     * @return \DateTime
     */
    public function getDateHA()
    {
        return $this->dateHA;
    }

    /**
     * Set dateLivraisonPrevisionnelle.
     *
     * @param \DateTime $dateLivraisonPrevisionnelle
     *
     * @return Livraison
     */
    public function setDateLivraisonPrevisionnelle($dateLivraisonPrevisionnelle)
    {
        $this->dateLivraisonPrevisionnelle = $dateLivraisonPrevisionnelle;

        return $this;
    }

    /**
     * Get dateLivraisonPrevisionnelle.
     *
     * @return \DateTime
     */
    public function getDateLivraisonPrevisionnelle()
    {
        return $this->dateLivraisonPrevisionnelle;
    }

    /**
     * Set dateLivraisonEffective.
     *
     * @param \DateTime $dateLivraisonEffective
     *
     * @return Livraison
     */
    public function setDateLivraisonEffective($dateLivraisonEffective)
    {
        $this->dateLivraisonEffective = $dateLivraisonEffective;

        return $this;
    }

    /**
     * Get dateLivraisonEffective.
     *
     * @return \DateTime
     */
    public function getDateLivraisonEffective()
    {
        return $this->dateLivraisonEffective;
    }

    /**
     * Set vente.
     *
     * @param \AppBundle\Entity\Vente|null $vente
     *
     * @return Livraison
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

    /**
     * Set modeDeLivraison.
     *
     * @param \AppBundle\Entity\ModeDeLivraison $modeDeLivraison
     *
     * @return Livraison
     */
    public function setModeDeLivraison(\AppBundle\Entity\ModeDeLivraison $modeDeLivraison)
    {
        $this->modeDeLivraison = $modeDeLivraison;

        return $this;
    }

    /**
     * Get modeDeLivraison.
     *
     * @return \AppBundle\Entity\ModeDeLivraison
     */
    public function getModeDeLivraison()
    {
        return $this->modeDeLivraison;
    }
}
