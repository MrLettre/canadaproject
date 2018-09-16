<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Version
 *
 * @ORM\Table(name="version")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\VersionRepository")
 */
class Version
{
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Model", inversedBy="versions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $model;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\BdV", inversedBy="versions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $bdv;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Transmission", inversedBy="versions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $transmission;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Energie", inversedBy="versions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $energie;

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
     * @var int
     *
     * @ORM\Column(name="actif", type="integer")
     */
    private $actif;

    /**
     * @var string
     *
     * @ORM\Column(name="puissanceTh", type="text")
     */
    private $puissanceTh;

    /**
     * @var string
     *
     * @ORM\Column(name="puissanceHy", type="text")
     */
    private $puissanceHy;

    /**
     * @var string
     *
     * @ORM\Column(name="puissanceEl", type="text")
     */
    private $puissanceEl;

    /**
     * @var string
     *
     * @ORM\Column(name="autonimieTh", type="text")
     */
    private $autonimieTh;

    /**
     * @var string
     *
     * @ORM\Column(name="autonomieHy", type="text")
     */
    private $autonomieHy;

    /**
     * @var string
     *
     * @ORM\Column(name="autonomieEl", type="text")
     */
    private $autonomieEl;


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
     * @return Version
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
     * Set actif
     *
     * @param integer $actif
     *
     * @return Version
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
     * Set puissanceTh
     *
     * @param string $puissanceTh
     *
     * @return Version
     */
    public function setPuissanceTh($puissanceTh)
    {
        $this->puissanceTh = $puissanceTh;

        return $this;
    }

    /**
     * Get puissanceTh
     *
     * @return string
     */
    public function getPuissanceTh()
    {
        return $this->puissanceTh;
    }

    /**
     * Set puissanceHy
     *
     * @param string $puissanceHy
     *
     * @return Version
     */
    public function setPuissanceHy($puissanceHy)
    {
        $this->puissanceHy = $puissanceHy;

        return $this;
    }

    /**
     * Get puissanceHy
     *
     * @return string
     */
    public function getPuissanceHy()
    {
        return $this->puissanceHy;
    }

    /**
     * Set puissanceEl
     *
     * @param string $puissanceEl
     *
     * @return Version
     */
    public function setPuissanceEl($puissanceEl)
    {
        $this->puissanceEl = $puissanceEl;

        return $this;
    }

    /**
     * Get puissanceEl
     *
     * @return string
     */
    public function getPuissanceEl()
    {
        return $this->puissanceEl;
    }

    /**
     * Set autonimieTh
     *
     * @param string $autonimieTh
     *
     * @return Version
     */
    public function setAutonimieTh($autonimieTh)
    {
        $this->autonimieTh = $autonimieTh;

        return $this;
    }

    /**
     * Get autonimieTh
     *
     * @return string
     */
    public function getAutonimieTh()
    {
        return $this->autonimieTh;
    }

    /**
     * Set autonomieHy
     *
     * @param string $autonomieHy
     *
     * @return Version
     */
    public function setAutonomieHy($autonomieHy)
    {
        $this->autonomieHy = $autonomieHy;

        return $this;
    }

    /**
     * Get autonomieHy
     *
     * @return string
     */
    public function getAutonomieHy()
    {
        return $this->autonomieHy;
    }

    /**
     * Set autonomieEl
     *
     * @param string $autonomieEl
     *
     * @return Version
     */
    public function setAutonomieEl($autonomieEl)
    {
        $this->autonomieEl = $autonomieEl;

        return $this;
    }

    /**
     * Get autonomieEl
     *
     * @return string
     */
    public function getAutonomieEl()
    {
        return $this->autonomieEl;
    }
}

