<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ModeDeLivraison
 *
 * @ORM\Table(name="mode_de_livraison")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ModeDeLivraisonRepository")
 */
class ModeDeLivraison
{
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Livraison", mappedBy="modeDeLivraison")
     * @ORM\JoinColumn(nullable=false)
     */
    private $livraisons;

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
     * @ORM\Column(name="reference", type="string", length=32, unique=true)
     */
    private $reference;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var int
     *
     * @ORM\Column(name="prix", type="integer")
     */
    private $prix;

    /**
     * @var int
     *
     * @ORM\Column(name="delaiMoyen", type="integer")
     */
    private $delaiMoyen;


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
     * @return ModeDeLivraison
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
     * Set nom.
     *
     * @param string $nom
     *
     * @return ModeDeLivraison
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom.
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prix.
     *
     * @param int $prix
     *
     * @return ModeDeLivraison
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix.
     *
     * @return int
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set delaiMoyen.
     *
     * @param int $delaiMoyen
     *
     * @return ModeDeLivraison
     */
    public function setDelaiMoyen($delaiMoyen)
    {
        $this->delaiMoyen = $delaiMoyen;

        return $this;
    }

    /**
     * Get delaiMoyen.
     *
     * @return int
     */
    public function getDelaiMoyen()
    {
        return $this->delaiMoyen;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->livraisons = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add livraison.
     *
     * @param \AppBundle\Entity\Livraison $livraison
     *
     * @return ModeDeLivraison
     */
    public function addLivraison(\AppBundle\Entity\Livraison $livraison)
    {
        $this->livraisons[] = $livraison;

        return $this;
    }

    /**
     * Remove livraison.
     *
     * @param \AppBundle\Entity\Livraison $livraison
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeLivraison(\AppBundle\Entity\Livraison $livraison)
    {
        return $this->livraisons->removeElement($livraison);
    }

    /**
     * Get livraisons.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLivraisons()
    {
        return $this->livraisons;
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->prix.'$ - '.$this->nom.' - '.'livraison sous '.$this->delaiMoyen.' jours';
    }
}
