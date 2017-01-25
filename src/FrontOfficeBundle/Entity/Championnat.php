<?php

namespace FrontOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Championnat
 *
 * @ORM\Table(name="championnat")
 * @ORM\Entity(repositoryClass="FrontOfficeBundle\Repository\ChampionnatRepository")
 */
class Championnat
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
     * @ORM\Column(name="Nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="text")
     */
    private $description;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="FrontOfficeBundle\Entity\Journee", cascade={"persist"},mappedBy="championnat")
     */
    private $journee;

    /**
     * @var equipe
     * @ORM\ManyToMany(targetEntity="FrontOfficeBundle\Entity\Equipe", cascade={"persist"}, inversedBy="championnat")
     */
    private $equipe;

    protected $submitFile;

    public function upload(UploadedFile $file)
    {
        $fileName = $file->getClientOriginalName();
        $dir = __DIR__.'../../../../web/uploads/csv/';
        $file->move($dir, $fileName);

        return $fileName;
    }

    /**
     * @return mixed
     */
    public function getsubmitFile()
    {
        return $this->submitFile;
    }

    /**
     * @param mixed $submitFile
     */
    public function setsubmitFile($submitFile)
    {
        $this->submitFile = $submitFile;
    }

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
     * @return Championnat
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
     * Set description
     *
     * @param string $description
     *
     * @return Championnat
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->journee = new \Doctrine\Common\Collections\ArrayCollection();
        $this->equipe = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add journee
     *
     * @param \FrontOfficeBundle\Entity\Journee $journee
     *
     * @return Championnat
     */
    public function addJournee(\FrontOfficeBundle\Entity\Journee $journee)
    {
        $this->journee[] = $journee;

        return $this;
    }

    /**
     * Remove journee
     *
     * @param \FrontOfficeBundle\Entity\Journee $journee
     */
    public function removeJournee(\FrontOfficeBundle\Entity\Journee $journee)
    {
        $this->journee->removeElement($journee);
    }

    /**
     * Get journee
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getJournee()
    {
        return $this->journee;
    }

    /**
     * Add equipe
     *
     * @param \FrontOfficeBundle\Entity\Equipe $equipe
     *
     * @return Championnat
     */
    public function addEquipe(\FrontOfficeBundle\Entity\Equipe $equipe)
    {
        $this->equipe[] = $equipe;

        return $this;
    }

    /**
     * Remove equipe
     *
     * @param \FrontOfficeBundle\Entity\Equipe $equipe
     */
    public function removeEquipe(\FrontOfficeBundle\Entity\Equipe $equipe)
    {
        $this->equipe->removeElement($equipe);
    }

    /**
     * Get equipe
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEquipe()
    {
        return $this->equipe;
    }

    /**
     * toString
     * @return string
     */
    public function __toString()
    {
        return (string) $this->getNom();
    }
}
