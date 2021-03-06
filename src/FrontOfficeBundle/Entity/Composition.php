<?php

namespace FrontOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Composition
 *
 * @ORM\Table(name="composition")
 * @ORM\Entity(repositoryClass="FrontOfficeBundle\Repository\CompositionRepository")
 */
class Composition
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
     * @var Joueur
     * @ORM\ManyToOne(targetEntity="FrontOfficeBundle\Entity\Joueur")
     * @ORM\JoinColumn(name="joueur_id", referencedColumnName="id")
     */
    private $joueur;

    /**
     * @var Position
     * @ORM\ManyToOne(targetEntity="FrontOfficeBundle\Entity\Position")
     * @ORM\JoinColumn(name="position_id", referencedColumnName="id")
     */
    private $position;

    /**
     * @var Formation
     * @ORM\ManyToOne(targetEntity="FrontOfficeBundle\Entity\Formation")
     * @ORM\JoinColumn(name="formation_id", referencedColumnName="id")
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
     * Set joueur
     *
     * @param string $joueur
     *
     * @return Composition
     */
    public function setJoueur($joueur)
    {
        $this->joueur = $joueur;

        return $this;
    }

    /**
     * Get joueur
     *
     * @return string
     */
    public function getJoueur()
    {
        return $this->joueur;
    }

    /**
     * Set position
     *
     * @param \FrontOfficeBundle\Entity\Position $position
     *
     * @return Composition
     */
    public function setPosition(\FrontOfficeBundle\Entity\Position $position = null)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return \FrontOfficeBundle\Entity\Position
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set formation
     *
     * @param \FrontOfficeBundle\Entity\Formation $formation
     *
     * @return Composition
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
