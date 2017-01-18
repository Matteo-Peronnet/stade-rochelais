<?php

namespace FrontOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Equipe
 *
 * @ORM\Table(name="equipe")
 * @ORM\Entity(repositoryClass="FrontOfficeBundle\Repository\EquipeRepository")
 */
class Equipe implements \JsonSerializable
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
     * @ORM\Column(name="Blason", type="string", length=255)
     */
    private $blason;

    /**
     * @var string
     *
     * @ORM\Column(name="Stade", type="string", length=255)
     */
    private $stade;

    /**
     * @var championnat
     * @ORM\ManyToMany(targetEntity="FrontOfficeBundle\Entity\Championnat", cascade={"persist"},mappedBy="equipe")
     */
    private $championnat;

    /**
     * @var Joueur
     * @ORM\OneToMany(targetEntity="FrontOfficeBundle\Entity\Joueur", cascade={"persist"},mappedBy="equipe")
     */
    private $joueur;

    /**
     * @var Formation
     * @ORM\OneToOne(targetEntity="FrontOfficeBundle\Entity\Formation", cascade={"persist"})
     */
    private $formation;


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
     * @return Equipe
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
     * Set blason
     *
     * @param string $blason
     *
     * @return Equipe
     */
    public function setBlason($blason)
    {
        $this->blason = $blason;

        return $this;
    }

    /**
     * Get blason
     *
     * @return string
     */
    public function getBlason()
    {
        return $this->blason;
    }

    /**
     * Set stade
     *
     * @param string $stade
     *
     * @return Equipe
     */
    public function setStade($stade)
    {
        $this->stade = $stade;

        return $this;
    }

    /**
     * Get stade
     *
     * @return string
     */
    public function getStade()
    {
        return $this->stade;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->championnat = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add championnat
     *
     * @param \FrontOfficeBundle\Entity\Championnat $championnat
     *
     * @return Equipe
     */
    public function addChampionnat(\FrontOfficeBundle\Entity\Championnat $championnat)
    {
        $this->championnat[] = $championnat;

        return $this;
    }

    /**
     * Remove championnat
     *
     * @param \FrontOfficeBundle\Entity\Championnat $championnat
     */
    public function removeChampionnat(\FrontOfficeBundle\Entity\Championnat $championnat)
    {
        $this->championnat->removeElement($championnat);
    }

    /**
     * Get championnat
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChampionnat()
    {
        return $this->championnat;
    }
    /**
     * toString
     * @return string
     */
    public function __toString()
    {
        return (string) $this->getNom();
    }

    /**
     * @param championnat $championnat
     */
    public function setChampionnat($championnat)
    {
        $this->championnat = $championnat;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    function jsonSerialize()
    {
        return [
            "id"=>$this->getId(),
            "nom"=>$this->getNom(),
        ];
    }

    /**
     * Add joueur
     *
     * @param \FrontOfficeBundle\Entity\Joueur $joueur
     *
     * @return Equipe
     */
    public function addJoueur(\FrontOfficeBundle\Entity\Joueur $joueur)
    {
        $this->joueur[] = $joueur;

        return $this;
    }

    /**
     * Remove joueur
     *
     * @param \FrontOfficeBundle\Entity\Joueur $joueur
     */
    public function removeJoueur(\FrontOfficeBundle\Entity\Joueur $joueur)
    {
        $this->joueur->removeElement($joueur);
    }

    /**
     * Get joueur
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getJoueur()
    {
        return $this->joueur;
    }

    /**
     * Set formation
     *
     * @param \FrontOfficeBundle\Entity\Formation $formation
     *
     * @return Equipe
     */
    public function setFormation(\FrontOfficeBundle\Entity\Formation $formation = null)
    {
        $this->formation = $formation;

        return $this;
    }

    /**
     * Get formation
     *
     * @return \FrontOfficeBundle\Entity\Formation
     */
    public function getFormation()
    {
        return $this->formation;
    }
}
