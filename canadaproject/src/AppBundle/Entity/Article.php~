<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Article
 *
 * @ORM\Table(name="article")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ArticleRepository")
 * @Vich\Uploadable
 */
class Article
{
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
     * @ORM\Column(name="sujet", type="string", length=30)
     */
    private $sujet;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=100)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="resume", type="text")
     */
    private $resume;

    /**
     * @var string
     *
     * @ORM\Column(name="article", type="text")
     */
    private $article;

    /**
     * @var string
     *
     * @ORM\Column(name="resumeImportant", type="string", length=320)
     */
    private $resumeImportant;

    /**
     * @Vich\UploadableField(mapping="photosArticle_images", fileNameProperty="imageName")
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
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set sujet.
     *
     * @param string $sujet
     *
     * @return Article
     */
    public function setSujet($sujet)
    {
        $this->sujet = $sujet;

        return $this;
    }

    /**
     * Get sujet.
     *
     * @return string
     */
    public function getSujet()
    {
        return $this->sujet;
    }

    /**
     * Set titre.
     *
     * @param string $titre
     *
     * @return Article
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre.
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set resume.
     *
     * @param string $resume
     *
     * @return Article
     */
    public function setResume($resume)
    {
        $this->resume = $resume;

        return $this;
    }

    /**
     * Get resume.
     *
     * @return string
     */
    public function getResume()
    {
        return $this->resume;
    }

    /**
     * Set article.
     *
     * @param string $article
     *
     * @return Article
     */
    public function setArticle($article)
    {
        $this->article = $article;

        return $this;
    }

    /**
     * Get article.
     *
     * @return string
     */
    public function getArticle()
    {
        return $this->article;
    }

    /**
     * Set resumeImportant.
     *
     * @param string $resumeImportant
     *
     * @return Article
     */
    public function setResumeImportant($resumeImportant)
    {
        $this->resumeImportant = $resumeImportant;

        return $this;
    }

    /**
     * Get resumeImportant.
     *
     * @return string
     */
    public function getResumeImportant()
    {
        return $this->resumeImportant;
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
        return $this->titre;
    }
}
