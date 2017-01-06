<?php

namespace FrontOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FrontOfficeBundle\Entity\Championnat;
/**
 * Journee
 *
 * @ORM\Table(name="journee")
 * @ORM\Entity(repositoryClass="FrontOfficeBundle\Repository\JourneeRepository")
 */
class Journee
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
     * @ORM\ManyToOne(targetEntity="FrontOfficeBundle\Entity\Championnat", inversedBy="journee")
     * @ORM\JoinColumn(name="championnat_id", referencedColumnName="id")
     */
    private $championnat;

    /**
     * @var matchs
     * @ORM\OneToMany(targetEntity="FrontOfficeBundle\Entity\Matchs", cascade={"persist"},mappedBy="journee")
     */
    private $matchs;


    /**
     * @var integer
     *
     * @ORM\Column(name="numero", type="integer", nullable=false)
     */
    private $numero;


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
     * @return Journee
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
     * Constructor
     */
    public function __construct()
    {
        $this->matchs = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set championnat
     *
     * @param \FrontOfficeBundle\Entity\Championnat $championnat
     *
     * @return Journee
     */
    public function setChampionnat(\FrontOfficeBundle\Entity\Championnat $championnat = null)
    {
        $this->championnat = $championnat;

        return $this;
    }

    /**
     * Get championnat
     *
     * @return \FrontOfficeBundle\Entity\Championnat
     */
    public function getChampionnat()
    {
        return $this->championnat;
    }

    /**
     * Add match
     *
     * @param \FrontOfficeBundle\Entity\Matchs $match
     *
     * @return Journee
     */
    public function addMatch(\FrontOfficeBundle\Entity\Matchs $match)
    {
        $this->matchs[] = $match;

        return $this;
    }

    /**
     * Remove match
     *
     * @param \FrontOfficeBundle\Entity\Matchs $match
     */
    public function removeMatch(\FrontOfficeBundle\Entity\Matchs $match)
    {
        $this->matchs->removeElement($match);
    }

    /**
     * Get matchs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMatchs()
    {
        return $this->matchs;
    }

    /**
     * @return int
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param int $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

}
