<?php

namespace FrontOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Position
 *
 * @ORM\Table(name="position")
 * @ORM\Entity(repositoryClass="FrontOfficeBundle\Repository\PositionRepository")
 */
class Position
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="numero", type="string", length=255)
     */
    private $numero;

    /**
     * @var Joueur
     * @ORM\OneToMany(targetEntity="FrontOfficeBundle\Entity\Joueur", cascade={"persist"},mappedBy="position")
     */
    private $joueur;

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
     * @return Position
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
     * Set numero
     *
     * @param string $numero
     *
     * @return Position
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return string
     */
    public function getNumero()
    {
        return $this->numero;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->joueur = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add joueur
     *
     * @param \FrontOfficeBundle\Entity\Joueur $joueur
     *
     * @return Position
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
}
