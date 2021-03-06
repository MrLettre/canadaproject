<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Concession
 *
 * @ORM\Table(name="concession")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ConcessionRepository")
 * @Vich\Uploadable
 */
class Concession
{
    /**
     * One Cart has One Customer.
     * @ORM\OneToOne(targetEntity="User", mappedBy="concession")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\VehiculePhysique", mappedBy="concession")
     */
    private $vehiculePhysiques;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\DemandeEssai", mappedBy="concession")
     */
    private $demandesEssais;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GroupeConcessionnaire", inversedBy="concessions")
     * @ORM\JoinColumn(nullable=true)
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
     * @ORM\Column(name="codeEntreprise", type="string", length=255)
     */
    private $codeEntreprise;

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
     * @ORM\Column(name="actif", type="boolean", options={"default":false})
     */
    private $actif;

    /**
     * @Vich\UploadableField(mapping="logoConcessions_images", fileNameProperty="imageName")
     *
     * @var File
     * @Assert\File(
     *     maxSize = "5M",
     *     maxSizeMessage="Votre fichier est trop volumineux, veuillez choisir un fichier plus petit",
     * )
     *
     */
    protected $imageFile;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $imageName;

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

    public function setImageFile($imageFile)
    {
        $this->imageFile = $imageFile;
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function setImageName($imageName)
    {
        $this->imageName = $imageName;
    }

    public function getImageName()
    {
        return $this->imageName;
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->nom;
    }

    /**
     * Get vehiculePhysiques.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVehiculePhysiques()
    {
        return $this->vehiculePhysiques;
    }

    /**
     * Add demandesEssai.
     *
     * @param \AppBundle\Entity\DemandeEssai $demandesEssai
     *
     * @return Concession
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
     * Set user.
     *
     * @param \AppBundle\Entity\User|null $user
     *
     * @return Concession
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

    /**
     * Set concession.
     *
     * @param \AppBundle\Entity\User|null $concession
     *
     * @return Concession
     */
    public function setConcession(\AppBundle\Entity\User $concession = null)
    {
        $this->concession = $concession;

        return $this;
    }

    /**
     * Get concession.
     *
     * @return \AppBundle\Entity\User|null
     */
    public function getConcession()
    {
        return $this->concession;
    }

    /**
     * Set codeEntreprise.
     *
     * @param string $codeEntreprise
     *
     * @return Concession
     */
    public function setCodeEntreprise($codeEntreprise)
    {
        $this->codeEntreprise = $codeEntreprise;

        return $this;
    }

    /**
     * Get codeEntreprise.
     *
     * @return string
     */
    public function getCodeEntreprise()
    {
        return $this->codeEntreprise;
    }
}
