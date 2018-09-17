<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Concession
 *
 * @ORM\Table(name="concession")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ConcessionRepository")
 */
class Concession
{
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\VehiculePhysique", mappedBy="concession")
     */
    private $vehiculePhysique;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GroupeConcessionnaire", inversedBy="concessions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $groupeConcessionnaire;

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
     * @ORM\Column(name="nom", type="string", length=255, unique=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="text")
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="codePostal", type="text")
     */
    private $codePostal;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255)
     */
    private $ville;

    /**
     * @var int
     *
     * @ORM\Column(name="tel", type="integer")
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=255)
     */
    private $mail;

    /**
     * @var string
     *
     * @ORM\Column(name="nomDuContact", type="string", length=255)
     */
    private $nomDuContact;

    /**
     * @var int
     *
     * @ORM\Column(name="actif", type="integer")
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
     * Set nom
     *
     * @param string $nom
     *
     * @return Concession
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Concession
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set codePostal
     *
     * @param string $codePostal
     *
     * @return Concession
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * Get codePostal
     *
     * @return string
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * Set actif
     *
     * @param integer $actif
     *
     * @return Concession
     */
    public function setActif($actif)
    {
        $this->actif = $actif;

        return $this;
    }

    /**
     * Get actif
     *
     * @return int
     */
    public function getActif()
    {
        return $this->actif;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Concession
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set tel
     *
     * @param integer $tel
     *
     * @return Concession
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return integer
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set mail
     *
     * @param string $mail
     *
     * @return Concession
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set nomDuContact
     *
     * @param string $nomDuContact
     *
     * @return Concession
     */
    public function setNomDuContact($nomDuContact)
    {
        $this->nomDuContact = $nomDuContact;

        return $this;
    }

    /**
     * Get nomDuContact
     *
     * @return string
     */
    public function getNomDuContact()
    {
        return $this->nomDuContact;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->vehiculePhysique = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add vehiculePhysique
     *
     * @param \AppBundle\Entity\VehiculePhysique $vehiculePhysique
     *
     * @return Concession
     */
    public function addVehiculePhysique(\AppBundle\Entity\VehiculePhysique $vehiculePhysique)
    {
        $this->vehiculePhysique[] = $vehiculePhysique;

        return $this;
    }

    /**
     * Remove vehiculePhysique
     *
     * @param \AppBundle\Entity\VehiculePhysique $vehiculePhysique
     */
    public function removeVehiculePhysique(\AppBundle\Entity\VehiculePhysique $vehiculePhysique)
    {
        $this->vehiculePhysique->removeElement($vehiculePhysique);
    }

    /**
     * Get vehiculePhysique
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVehiculePhysique()
    {
        return $this->vehiculePhysique;
    }

    /**
     * Set groupeConcessionnaire
     *
     * @param \AppBundle\Entity\GroupeConcessionnaire $groupeConcessionnaire
     *
     * @return Concession
     */
    public function setGroupeConcessionnaire(\AppBundle\Entity\GroupeConcessionnaire $groupeConcessionnaire)
    {
        $this->groupeConcessionnaire = $groupeConcessionnaire;

        return $this;
    }

    /**
     * Get groupeConcessionnaire
     *
     * @return \AppBundle\Entity\GroupeConcessionnaire
     */
    public function getGroupeConcessionnaire()
    {
        return $this->groupeConcessionnaire;
    }
}
