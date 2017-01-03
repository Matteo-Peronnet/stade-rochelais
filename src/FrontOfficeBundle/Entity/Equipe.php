<?php

namespace FrontOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Equipe
 *
 * @ORM\Table(name="equipe")
 * @ORM\Entity(repositoryClass="FrontOfficeBundle\Repository\EquipeRepository")
 */
class Equipe
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
     * @ORM\ManyToMany(targetEntity="FrontOfficeBundle\Entity\Championnat", cascade={"persist"},inversedBy="equipe")
     */
    private $championnat;

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
}
