<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DemandeEssai
 *
 * @ORM\Table(name="demande_essai")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DemandeEssaiRepository")
 */
class DemandeEssai
{
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Concession", inversedBy="demandesEssais")
     * @ORM\JoinColumn(nullable=true)
     */
    private $concession;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\VehiculePhysique", inversedBy="demandesEssais")
     * @ORM\JoinColumn(nullable=true)
     */
    private $vehiculePhysique;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="demandesEssais")
     * @ORM\JoinColumn(nullable=true)
     */
    private $user;


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
     * @ORM\Column(name="reference", type="string", length=30, unique=true)
     */
    private $reference;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDemande", type="datetime")
     */
    private $dateDemande;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateEssaiPlanning", type="datetime")
     */
    private $dateEssaiPlanning;

    /**
     * @var string|null
     *
     * @ORM\Column(name="commentaireClient", type="text", nullable=true)
     */
    private $commentaireClient;


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
     * @return DemandeEssai
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
     * Set dateDemande.
     *
     * @param \DateTime $dateDemande
     *
     * @return DemandeEssai
     */
    public function setDateDemande($dateDemande)
    {
        $this->dateDemande = $dateDemande;

        return $this;
    }

    /**
     * Get dateDemande.
     *
     * @return \DateTime
     */
    public function getDateDemande()
    {
        return $this->dateDemande;
    }

    /**
     * Set dateEssaiPlanning.
     *
     * @param \DateTime $dateEssaiPlanning
     *
     * @return DemandeEssai
     */
    public function setDateEssaiPlanning($dateEssaiPlanning)
    {
        $this->dateEssaiPlanning = $dateEssaiPlanning;

        return $this;
    }

    /**
     * Get dateEssaiPlanning.
     *
     * @return \DateTime
     */
    public function getDateEssaiPlanning()
    {
        return $this->dateEssaiPlanning;
    }

    /**
     * Set commentaireClient.
     *
     * @param string|null $commentaireClient
     *
     * @return DemandeEssai
     */
    public function setCommentaireClient($commentaireClient = null)
    {
        $this->commentaireClient = $commentaireClient;

        return $this;
    }

    /**
     * Get commentaireClient.
     *
     * @return string|null
     */
    public function getCommentaireClient()
    {
        return $this->commentaireClient;
    }

    /**
     * Set concession.
     *
     * @param \AppBundle\Entity\Concession|null $concession
     *
     * @return DemandeEssai
     */
    public function setConcession(\AppBundle\Entity\Concession $concession = null)
    {
        $this->concession = $concession;

        return $this;
    }

    /**
     * Get concession.
     *
     * @return \AppBundle\Entity\Concession|null
     */
    public function getConcession()
    {
        return $this->concession;
    }

    /**
     * Set vehiculePhysique.
     *
     * @param \AppBundle\Entity\VehiculePhysique|null $vehiculePhysique
     *
     * @return DemandeEssai
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
     * Set user.
     *
     * @param \AppBundle\Entity\User|null $user
     *
     * @return DemandeEssai
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user.
     *
     * @return \AppBundle\Entity\User|null
     */
    public function getUser()
    {
        return $this->user;
    }
}
