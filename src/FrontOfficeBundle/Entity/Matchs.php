<?php

namespace FrontOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Matchs
 *
 * @ORM\Table(name="matchs")
 * @ORM\Entity(repositoryClass="FrontOfficeBundle\Repository\MatchsRepository")
 */
class Matchs
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
     * @var int
     *
     * @ORM\Column(name="ScoreDomicile", type="integer", nullable=true)
     */
    private $scoreDomicile;

    /**
     * @var int
     *
     * @ORM\Column(name="ScoreExterieur", type="integer", nullable=true)
     */
    private $scoreExterieur;

    /**
     * @ORM\ManyToOne(targetEntity="FrontOfficeBundle\Entity\Equipe")
     * @ORM\JoinColumn(nullable=false)
     */
    private $equipeDomicile;

    /**
     * @ORM\ManyToOne(targetEntity="FrontOfficeBundle\Entity\Equipe")
     * @ORM\JoinColumn(nullable=false)
     */
    private $equipeExterieur;

    /**
     * @var journee
     * @ORM\ManyToOne(targetEntity="FrontOfficeBundle\Entity\Journee", cascade={"persist"})
     * @ORM\JoinColumn(name="journee_id", referencedColumnName="id", nullable=false)
     */
    private $journee;

    /**
     * @var diffuseur
     * @ORM\ManyToOne(targetEntity="FrontOfficeBundle\Entity\Diffuseur",inversedBy="matchs", cascade={"persist"})
     * @ORM\JoinColumn(name="diffuseur_id", referencedColumnName="id", nullable=true)
     */
    private $diffuseur;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date", type="datetime")
     */
    private $date;

    /**
     * @var Arbitre
     * @ORM\OneToOne(targetEntity="FrontOfficeBundle\Entity\Arbitre")
     */
    private $arbitre;

    /**
     * @var Formation
     * @ORM\OneToMany(targetEntity="FrontOfficeBundle\Entity\Formation", cascade={"persist"}, mappedBy="Matchs")
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
     * Set scoreDomicile
     *
     * @param integer $scoreDomicile
     *
     * @return Matchs
     */
    public function setScoreDomicile($scoreDomicile)
    {
        $this->scoreDomicile = $scoreDomicile;

        return $this;
    }

    /**
     * Get scoreDomicile
     *
     * @return int
     */
    public function getScoreDomicile()
    {
        return $this->scoreDomicile;
    }

    /**
     * Set scoreExterieur
     *
     * @param integer $scoreExterieur
     *
     * @return Matchs
     */
    public function setScoreExterieur($scoreExterieur)
    {
        $this->scoreExterieur = $scoreExterieur;

        return $this;
    }

    /**
     * Get scoreExterieur
     *
     * @return int
     */
    public function getScoreExterieur()
    {
        return $this->scoreExterieur;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Matchs
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set equipeDomicile
     *
     * @param \FrontOfficeBundle\Entity\Equipe $equipeDomicile
     *
     * @return Matchs
     */
    public function setEquipeDomicile(\FrontOfficeBundle\Entity\Equipe $equipeDomicile)
    {
        $this->equipeDomicile = $equipeDomicile;

        return $this;
    }

    /**
     * Get equipeDomicile
     *
     * @return \FrontOfficeBundle\Entity\Equipe
     */
    public function getEquipeDomicile()
    {
        return $this->equipeDomicile;
    }

    /**
     * Set equipeExterieur
     *
     * @param \FrontOfficeBundle\Entity\Equipe $equipeExterieur
     *
     * @return Matchs
     */
    public function setEquipeExterieur(\FrontOfficeBundle\Entity\Equipe $equipeExterieur)
    {
        $this->equipeExterieur = $equipeExterieur;

        return $this;
    }

    /**
     * Get equipeExterieur
     *
     * @return \FrontOfficeBundle\Entity\Equipe
     */
    public function getEquipeExterieur()
    {
        return $this->equipeExterieur;
    }

    /**
     * Set journee
     *
     * @param \FrontOfficeBundle\Entity\Journee $journee
     *
     * @return Matchs
     */
    public function setJournee(\FrontOfficeBundle\Entity\Journee $journee = null)
    {
        $this->journee = $journee;

        return $this;
    }

    /**
     * Get journee
     *
     * @return \FrontOfficeBundle\Entity\Journee
     */
    public function getJournee()
    {
        return $this->journee;
    }

    /**
     * Set diffuseur
     *
     * @param \FrontOfficeBundle\Entity\Diffuseur $diffuseur
     *
     * @return Matchs
     */
    public function setDiffuseur(\FrontOfficeBundle\Entity\Diffuseur $diffuseur = null)
    {
        $this->diffuseur = $diffuseur;

        return $this;
    }

    /**
     * Get diffuseur
     *
     * @return \FrontOfficeBundle\Entity\Diffuseur
     */
    public function getDiffuseur()
    {
        return $this->diffuseur;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->diffuseur = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add diffuseur
     *
     * @param \FrontOfficeBundle\Entity\Diffuseur $diffuseur
     *
     * @return Matchs
     */
    public function addDiffuseur(\FrontOfficeBundle\Entity\Diffuseur $diffuseur)
    {
        $this->diffuseur[] = $diffuseur;

        return $this;
    }

    /**
     * Remove diffuseur
     *
     * @param \FrontOfficeBundle\Entity\Diffuseur $diffuseur
     */
    public function removeDiffuseur(\FrontOfficeBundle\Entity\Diffuseur $diffuseur)
    {
        $this->diffuseur->removeElement($diffuseur);
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }



    /**
     * Set arbitre
     *
     * @param \FrontOfficeBundle\Entity\Arbitre $arbitre
     *
     * @return Matchs
     */
    public function setArbitre(\FrontOfficeBundle\Entity\Arbitre $arbitre = null)
    {
        $this->arbitre = $arbitre;

        return $this;
    }

    /**
     * Get arbitre
     *
     * @return \FrontOfficeBundle\Entity\Arbitre
     */
    public function getArbitre()
    {
        return $this->arbitre;
    }

    /**
     * Add formation
     *
     * @param \FrontOfficeBundle\Entity\Formation $formation
     *
     * @return Matchs
     */
    public function addFormation(\FrontOfficeBundle\Entity\Formation $formation)
    {
        $this->formation[] = $formation;

        return $this;
    }

    /**
     * Remove formation
     *
     * @param \FrontOfficeBundle\Entity\Formation $formation
     */
    public function removeFormation(\FrontOfficeBundle\Entity\Formation $formation)
    {
        $this->formation->removeElement($formation);
    }

    /**
     * Get formation
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFormation()
    {
        return $this->formation;
    }
}
