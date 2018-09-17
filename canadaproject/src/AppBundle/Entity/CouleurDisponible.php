<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CouleurDisponible
 *
 * @ORM\Table(name="couleur_disponible")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CouleurDisponibleRepository")
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
}
