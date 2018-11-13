<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="`user`")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User extends BaseUser
{

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\CartContent", mappedBy="user")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cartContents;


    /**
 * One User has One Concession.
 * @ORM\OneToOne(targetEntity="Concession", inversedBy="user")
 * @ORM\JoinColumn(name="concession_id", referencedColumnName="id")
 */
    private $concession;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\DemandeEssai", mappedBy="user")
     */
    private $demandesEssais;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="societe", type="string", length=45, nullable=true)
     */
    private $societe;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=32, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=32, nullable=true)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="codePostal", type="string", length=32, nullable=true)
     */
    private $codePostal;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=50, nullable=true)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="numeroTelephone", type="string", length=32, nullable=true)
     */
    private $numeroTelephone;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateNaissance", type="date", nullable=true)
     */
    private $dateNaissance;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreationProfil", type="datetime", nullable=true)
     */
    private $dateCreationProfil;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isClient", type="boolean", options={"default":false})
     */
    private $isClient;

    /**
     * @var string
     *
     * @ORM\Column(name="referenceClient", type="string", length=32, nullable=true)
     */
    private $referenceClient;

    public function __construct()
    {
        parent::__construct();
    }

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
     * Set nom.
     *
     * @param string $nom
     *
     * @return User
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
     * Set prenom.
     *
     * @param string $prenom
     *
     * @return User
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom.
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set numeroTelephone.
     *
     * @param string $numeroTelephone
     *
     * @return User
     */
    public function setNumeroTelephone($numeroTelephone)
    {
        $this->numeroTelephone = $numeroTelephone;

        return $this;
    }

    /**
     * Get numeroTelephone.
     *
     * @return string
     */
    public function getNumeroTelephone()
    {
        return $this->numeroTelephone;
    }

    /**
     * Set dateNaissance.
     *
     * @param \DateTime $dateNaissance
     *
     * @return User
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get dateNaissance.
     *
     * @return \DateTime
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set dateCreationProfil.
     *
     * @param \DateTime $dateCreationProfil
     *
     * @return User
     */
    public function setDateCreationProfil($dateCreationProfil)
    {
        $this->dateCreationProfil = $dateCreationProfil;

        return $this;
    }

    /**
     * Get dateCreationProfil.
     *
     * @return \DateTime
     */
    public function getDateCreationProfil()
    {
        return $this->dateCreationProfil;
    }

    /**
     * Set adresse.
     *
     * @param string|null $adresse
     *
     * @return User
     */
    public function setAdresse($adresse = null)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse.
     *
     * @return string|null
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set codePostal.
     *
     * @param string|null $codePostal
     *
     * @return User
     */
    public function setCodePostal($codePostal = null)
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * Get codePostal.
     *
     * @return string|null
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * Set ville.
     *
     * @param string|null $ville
     *
     * @return User
     */
    public function setVille($ville = null)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville.
     *
     * @return string|null
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set societe.
     *
     * @param string|null $societe
     *
     * @return User
     */
    public function setSociete($societe = null)
    {
        $this->societe = $societe;

        return $this;
    }

    /**
     * Get societe.
     *
     * @return string|null
     */
    public function getSociete()
    {
        return $this->societe;
    }

    /**
     * Add concession.
     *
     * @param \AppBundle\Entity\Concession $concession
     *
     * @return User
     */
    public function addConcession(\AppBundle\Entity\Concession $concession)
    {
        $this->concessions[] = $concession;

        return $this;
    }

    /**
     * Remove concession.
     *
     * @param \AppBundle\Entity\Concession $concession
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeConcession(\AppBundle\Entity\Concession $concession)
    {
        return $this->concessions->removeElement($concession);
    }

    /**
     * Get concessions.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getConcessions()
    {
        return $this->concessions;
    }

    /**
     * Add demandesEssai.
     *
     * @param \AppBundle\Entity\DemandeEssai $demandesEssai
     *
     * @return User
     */
    public function addDemandesEssai(\AppBundle\Entity\DemandeEssai $demandesEssai)
    {
        $this->demandesEssais[] = $demandesEssai;

        return $this;
    }

    /**
     * Remove demandesEssai.
     *
     * @param \AppBundle\Entity\DemandeEssai $demandesEssai
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeDemandesEssai(\AppBundle\Entity\DemandeEssai $demandesEssai)
    {
        return $this->demandesEssais->removeElement($demandesEssai);
    }

    /**
     * Get demandesEssais.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDemandesEssais()
    {
        return $this->demandesEssais;
    }

    /**
     * Set concession.
     *
     * @param \AppBundle\Entity\Concession|null $concession
     *
     * @return User
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
     * Add cartContent.
     *
     * @param \AppBundle\Entity\CartContent $cartContent
     *
     * @return User
     */
    public function addCartContent(\AppBundle\Entity\CartContent $cartContent)
    {
        $this->cartContents[] = $cartContent;

        return $this;
    }

    /**
     * Remove cartContent.
     *
     * @param \AppBundle\Entity\CartContent $cartContent
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeCartContent(\AppBundle\Entity\CartContent $cartContent)
    {
        return $this->cartContents->removeElement($cartContent);
    }

    /**
     * Get cartContents.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCartContents()
    {
        return $this->cartContents;
    }

    /**
     * Set isClient.
     *
     * @param bool $isClient
     *
     * @return User
     */
    public function setIsClient($isClient)
    {
        $this->isClient = $isClient;

        return $this;
    }

    /**
     * Get isClient.
     *
     * @return bool
     */
    public function getIsClient()
    {
        return $this->isClient;
    }

    /**
     * Set referenceClient.
     *
     * @param string|null $referenceClient
     *
     * @return User
     */
    public function setReferenceClient($referenceClient = null)
    {
        $this->referenceClient = $referenceClient;

        return $this;
    }

    /**
     * Get referenceClient.
     *
     * @return string|null
     */
    public function getReferenceClient()
    {
        return $this->referenceClient;
    }
}
