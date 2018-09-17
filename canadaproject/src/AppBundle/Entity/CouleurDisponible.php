<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * CouleurDisponible
 *
 * @ORM\Table(name="couleur_disponible")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CouleurDisponibleRepository")
 * @Vich\Uploadable
 */
class CouleurDisponible
{
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Version", inversedBy="couleurs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $version;

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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @Vich\UploadableField(mapping="photosVehiculeCouleursDispo_images", fileNameProperty="imageName")
     *
     * @var File
     * @Assert\File(
     *     maxSize = "5M",
     *     maxSizeMessage="Votre fichier est trop volumineux, veuillez choisir un fichier plus petit",
     *     mimeTypes={"imageName/jpg", "imageName/jpeg", "imageName/png"},
     *     mimeTypesMessage = "Veuillez télécharger un fichier au format .jpg ou .png"
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
     * @return CouleurDisponible
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
     * Set version.
     *
     * @param \AppBundle\Entity\Version $version
     *
     * @return CouleurDisponible
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
}
