<?php

namespace FrontOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Formation
 *
 * @ORM\Table(name="formation")
 * @ORM\Entity(repositoryClass="FrontOfficeBundle\Repository\FormationRepository")
 */
class Formation
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
     * @ORM\ManyToOne(targetEntity="FrontOfficeBundle\Entity\Joueur", inversedBy="formation")
     * @ORM\JoinColumn(name="joueur_id", referencedColumnName="id")
     */
    private $joueur;
    
    /**
     * @var Position
     * @ORM\ManyToOne(targetEntity="FrontOfficeBundle\Entity\Position", inversedBy="formation")
     * @ORM\JoinColumn(name="position_id", referencedColumnName="id")
     */
    private $position;

    /**
     * @var Equipe
     * @ORM\ManyToOne(targetEntity="FrontOfficeBundle\Entity\Equipe", inversedBy="formation")
     * @ORM\JoinColumn(name="equipe_id", referencedColumnName="id")
     */
    private $equipe;

    /**
     * @var Matchs
     * @ORM\ManyToOne(targetEntity="FrontOfficeBundle\Entity\Matchs", inversedBy="formation")
     * @ORM\JoinColumn(name="matchs_id", referencedColumnName="id")
     */
    private $matchs;


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
     * @param \FrontOfficeBundle\Entity\Joueur $joueur
     *
     * @return Formation
     */
    public function setJoueur(\FrontOfficeBundle\Entity\Joueur $joueur = null)
    {
        $this->joueur = $joueur;

        return $this;
    }

    /**
     * Get joueur
     *
     * @return \FrontOfficeBundle\Entity\Joueur
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
     * @return Formation
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
     * Set equipe
     *
     * @param \FrontOfficeBundle\Entity\Equipe $equipe
     *
     * @return Formation
     */
    public function setEquipe(\FrontOfficeBundle\Entity\Equipe $equipe = null)
    {
        $this->equipe = $equipe;

        return $this;
    }

    /**
     * Get equipe
     *
     * @return \FrontOfficeBundle\Entity\Equipe
     */
    public function getEquipe()
    {
        return $this->equipe;
    }

    /**
     * Set matchs
     *
     * @param \FrontOfficeBundle\Entity\Matchs $matchs
     *
     * @return Formation
     */
    public function setMatchs(\FrontOfficeBundle\Entity\Matchs $matchs = null)
    {
        $this->matchs = $matchs;

        return $this;
    }

    /**
     * Get matchs
     *
     * @return \FrontOfficeBundle\Entity\Matchs
     */
    public function getMatchs()
    {
        return $this->matchs;
    }
}
