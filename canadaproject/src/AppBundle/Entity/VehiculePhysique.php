<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\Collection;


/**
 * VehiculePhysique
 *
 * @ORM\Table(name="vehicule_physique")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\VehiculePhysiqueRepository")
 * @Vich\Uploadable
 */
class VehiculePhysique
{
    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\VehicleOption", cascade={"persist", "remove"})
     */
    private $options;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\DemandeEssai", mappedBy="vehiculePhysique")
     */
    private $demandesEssais;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\CartContent", mappedBy="vehiculePhysique")
     */
    private $cartContents;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Version", inversedBy="vehiculePhysiques")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank()
     */
    private $version;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\VehiclesValidationStatut", inversedBy="vehiculePhysiques")
     * @ORM\JoinColumn(nullable=true)
     */
    private $validationStatut;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Region", inversedBy="vehiculePhysiques")
     * @ORM\JoinColumn(nullable=true)
     */
    private $region;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Concession", inversedBy="vehiculePhysiques")
     * @ORM\JoinColumn(nullable=true)
     */
    private $concession;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\VehiclePhyStatut", inversedBy="vehiculePhysiques")
     * @ORM\JoinColumn(nullable=true)
     */
    private $vehiclePhyStatut;

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
     * @ORM\Column(name="referenceVehPhy", type="string", nullable=true)
     */
    private $referenceVehPhy;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateMiseEnLigne", type="date", nullable=true)
     */
    private $dateMiseEnLigne;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDeVente", type="date", nullable=true)
     */
    private $dateDeVente;

    /**
     * @var int
     *
     * @ORM\Column(name="kilometrage", type="integer")
     */
    private $kilometrage;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDeMiseEnCirculation", type="date")
     */
    private $dateDeMiseEnCirculation;

    /**
     * @var int
     *
     * @ORM\Column(name="prixHT", type="integer")
     */
    private $prixHT;

    /**
     * @var int
     *
     * @ORM\Column(name="prixTTC", type="integer")
     */
    private $prixTTC;

    /**
     * @var int
     *
     * @ORM\Column(name="prixHA", type="integer")
     */
    private $prixHA;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptif", type="text")
     */
    private $descriptif;

    /**
     * @var int
     *
     * @ORM\Column(name="hasCarfax", type="boolean", options={"default":false})
     */
    private $hasCarfax;

    /**
     * @var string
     *
     * @ORM\Column(name="codeVIN", type="string", nullable=true)
     */
    private $codeVIN;


    /**
     * @Vich\UploadableField(mapping="photosVehiculePhysique_images", fileNameProperty="imageName")
     *
     * @var File
     * @Assert\File(
     *     maxSize = "5M",
     *     maxSizeMessage="Votre fichier est trop volumineux, veuillez choisir un fichier plus petit"
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
     * Set dateMiseEnLigne
     *
     * @param \DateTime $dateMiseEnLigne
     *
     * @return VehiculePhysique
     */
    public function setDateMiseEnLigne($dateMiseEnLigne)
    {
        $this->dateMiseEnLigne = $dateMiseEnLigne;

        return $this;
    }

    /**
     * Get dateMiseEnLigne
     *
     * @return \DateTime
     */
    public function getDateMiseEnLigne()
    {
        return $this->dateMiseEnLigne;
    }

    /**
     * Set dateDeVente
     *
     * @param \DateTime $dateDeVente
     *
     * @return VehiculePhysique
     */
    public function setDateDeVente($dateDeVente)
    {
        $this->dateDeVente = $dateDeVente;

        return $this;
    }

    /**
     * Get dateDeVente
     *
     * @return \DateTime
     */
    public function getDateDeVente()
    {
        return $this->dateDeVente;
    }

    /**
     * Set kilometrage
     *
     * @param integer $kilometrage
     *
     * @return VehiculePhysique
     */
    public function setKilometrage($kilometrage)
    {
        $this->kilometrage = $kilometrage;

        return $this;
    }

    /**
     * Get kilometrage
     *
     * @return int
     */
    public function getKilometrage()
    {
        return $this->kilometrage;
    }

    /**
     * Set dateDeMiseEnCirculation
     *
     * @param \DateTime $dateDeMiseEnCirculation
     *
     * @return VehiculePhysique
     */
    public function setDateDeMiseEnCirculation($dateDeMiseEnCirculation)
    {
        $this->dateDeMiseEnCirculation = $dateDeMiseEnCirculation;

        return $this;
    }

    /**
     * Get dateDeMiseEnCirculation
     *
     * @return \DateTime
     */
    public function getDateDeMiseEnCirculation()
    {
        return $this->dateDeMiseEnCirculation;
    }

    /**
     * Set prixHT
     *
     * @param integer $prixHT
     *
     * @return VehiculePhysique
     */
    public function setPrixHT($prixHT)
    {
        $this->prixHT = $prixHT;

        return $this;
    }

    /**
     * Get prixHT
     *
     * @return int
     */
    public function getPrixHT()
    {
        return $this->prixHT;
    }

    /**
     * Set prixTTC
     *
     * @param integer $prixTTC
     *
     * @return VehiculePhysique
     */
    public function setPrixTTC($prixTTC)
    {
        $this->prixTTC = $prixTTC;

        return $this;
    }

    /**
     * Get prixTTC
     *
     * @return int
     */
    public function getPrixTTC()
    {
        return $this->prixTTC;
    }

    /**
     * Set prixHA
     *
     * @param integer $prixHA
     *
     * @return VehiculePhysique
     */
    public function setPrixHA($prixHA)
    {
        $this->prixHA = $prixHA;

        return $this;
    }

    /**
     * Get prixHA
     *
     * @return int
     */
    public function getPrixHA()
    {
        return $this->prixHA;
    }

    /**
     * Set descriptif
     *
     * @param string $descriptif
     *
     * @return VehiculePhysique
     */
    public function setDescriptif($descriptif)
    {
        $this->descriptif = $descriptif;

        return $this;
    }

    /**
     * Get descriptif
     *
     * @return string
     */
    public function getDescriptif()
    {
        return $this->descriptif;
    }

    /**
     * Add option
     *
     * @param \AppBundle\Entity\VehicleOption $option
     *
     * @return VehiculePhysique
     */
    public function addOption(\AppBundle\Entity\VehicleOption $option)
    {
        $this->options[] = $option;

        return $this;
    }

    /**
     * Remove option
     *
     * @param \AppBundle\Entity\VehicleOption $option
     */
    public function removeOption(\AppBundle\Entity\VehicleOption $option)
    {
        $this->options->removeElement($option);
    }

    /**
     * Get options
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Set vehiculeDef
     *
     * @param \AppBundle\Entity\VehicleDefinition $vehiculeDef
     *
     * @return VehiculePhysique
     */
    public function setVehiculeDef(\AppBundle\Entity\VehicleDefinition $vehiculeDef)
    {
        $this->vehiculeDef = $vehiculeDef;

        return $this;
    }

    /**
     * Get vehiculeDef
     *
     * @return \AppBundle\Entity\VehicleDefinition
     */
    public function getVehiculeDef()
    {
        return $this->vehiculeDef;
    }

    /**
     * Set validationStatut
     *
     * @param \AppBundle\Entity\VehiclesValidationStatut $validationStatut
     *
     * @return VehiculePhysique
     */
    public function setValidationStatut(\AppBundle\Entity\VehiclesValidationStatut $validationStatut)
    {
        $this->validationStatut = $validationStatut;

        return $this;
    }

    /**
     * Get validationStatut
     *
     * @return \AppBundle\Entity\VehiclesValidationStatut
     */
    public function getValidationStatut()
    {
        return $this->validationStatut;
    }

    /**
     * Set region
     *
     * @param \AppBundle\Entity\Region $region
     *
     * @return VehiculePhysique
     */
    public function setRegion(\AppBundle\Entity\Region $region)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Get region
     *
     * @return \AppBundle\Entity\Region
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Set concession
     *
     * @param \AppBundle\Entity\Concession $concession
     *
     * @return VehiculePhysique
     */
    public function setConcession(\AppBundle\Entity\Concession $concession)
    {
        $this->concession = $concession;

        return $this;
    }

    /**
     * Get concession
     *
     * @return \AppBundle\Entity\Concession
     */
    public function getConcession()
    {
        return $this->concession;
    }

    /**
     * Set vehiclePhyStatut
     *
     * @param \AppBundle\Entity\VehiclePhyStatut $vehiclePhyStatut
     *
     * @return VehiculePhysique
     */
    public function setVehiclePhyStatut(\AppBundle\Entity\VehiclePhyStatut $vehiclePhyStatut)
    {
        $this->vehiclePhyStatut = $vehiclePhyStatut;

        return $this;
    }

    /**
     * Get vehiclePhyStatut
     *
     * @return \AppBundle\Entity\VehiclePhyStatut
     */
    public function getVehiclePhyStatut()
    {
        return $this->vehiclePhyStatut;
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

    /**
     * Set version.
     *
     * @param \AppBundle\Entity\Version $version
     *
     * @return VehiculePhysique
     */
    public function setVersion(\AppBundle\Entity\Version $version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Get version.
     *
     * @return \AppBundle\Entity\Version
     */
    public function getVersion()
    {
        return $this->version;
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->referenceVehPhy;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cartContents = new \Doctrine\Common\Collections\ArrayCollection();
        $this->options = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add cartContent.
     *
     * @param \AppBundle\Entity\CartContent $cartContent
     *
     * @return VehiculePhysique
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
     * Add demandesEssai.
     *
     * @param \AppBundle\Entity\DemandeEssai $demandesEssai
     *
     * @return VehiculePhysique
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
     * Set referenceVehPhy.
     *
     * @param string|null $referenceVehPhy
     *
     * @return VehiculePhysique
     */
    public function setReferenceVehPhy($referenceVehPhy = null)
    {
        $this->referenceVehPhy = $referenceVehPhy;

        return $this;
    }

    /**
     * Get referenceVehPhy.
     *
     * @return string|null
     */
    public function getReferenceVehPhy()
    {
        return $this->referenceVehPhy;
    }

    /**
     * Set hasCarfax.
     *
     * @param bool $hasCarfax
     *
     * @return VehiculePhysique
     */
    public function setHasCarfax($hasCarfax)
    {
        $this->hasCarfax = $hasCarfax;

        return $this;
    }

    /**
     * Get hasCarfax.
     *
     * @return bool
     */
    public function getHasCarfax()
    {
        return $this->hasCarfax;
    }

    /**
     * Set codeVIN.
     *
     * @param string|null $codeVIN
     *
     * @return VehiculePhysique
     */
    public function setCodeVIN($codeVIN = null)
    {
        $this->codeVIN = $codeVIN;

        return $this;
    }

    /**
     * Get codeVIN.
     *
     * @return string|null
     */
    public function getCodeVIN()
    {
        return $this->codeVIN;
    }
}
