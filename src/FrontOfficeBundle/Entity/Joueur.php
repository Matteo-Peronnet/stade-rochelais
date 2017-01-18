<?php

namespace FrontOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Joueur
 *
 * @ORM\Table(name="joueur")
 * @ORM\Entity(repositoryClass="FrontOfficeBundle\Repository\JoueurRepository")
 */
class Joueur
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
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=255)
     */
    private $photo;

    /**
     * @var bool
     *
     * @ORM\Column(name="titulaire", type="boolean")
     */
    private $titulaire;

    /**
     * @var integer
     *
     * @ORM\Column(name="numero", type="integer", length=255)
     */
    private $numero;

    /**
     * @var Equipe
     * @ORM\ManyToOne(targetEntity="FrontOfficeBundle\Entity\Equipe", inversedBy="joueur")
     * @ORM\JoinColumn(name="equipe_id", referencedColumnName="id")
     */
    private $equipe;

    /**
     * @var Position
     * @ORM\ManyToMany(targetEntity="FrontOfficeBundle\Entity\Position", inversedBy="joueur")
     * @ORM\JoinColumn(name="position_id", referencedColumnName="id")
     */
    private $position;

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
     * @return Joueur
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
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Joueur
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set photo
     *
     * @param string $photo
     *
     * @return Joueur
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Set titulaire
     *
     * @param boolean $titulaire
     *
     * @return Joueur
     */
    public function setTitulaire($titulaire)
    {
        $this->titulaire = $titulaire;

        return $this;
    }

    /**
     * Get titulaire
     *
     * @return bool
     */
    public function getTitulaire()
    {
        return $this->titulaire;
    }

    /**
     * Set numero
     *
     * @param string $numero
     *
     * @return Joueur
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
     * Set equipe
     *
     * @param \FrontOfficeBundle\Entity\Equipe $equipe
     *
     * @return Joueur
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
     * Set position
     *
     * @param \FrontOfficeBundle\Entity\Position $position
     *
     * @return Joueur
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
     * Constructor
     */
    public function __construct()
    {
        $this->position = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add position
     *
     * @param \FrontOfficeBundle\Entity\Position $position
     *
     * @return Joueur
     */
    public function addPosition(\FrontOfficeBundle\Entity\Position $position)
    {
        $this->position[] = $position;

        return $this;
    }

    /**
     * Remove position
     *
     * @param \FrontOfficeBundle\Entity\Position $position
     */
    public function removePosition(\FrontOfficeBundle\Entity\Position $position)
    {
        $this->position->removeElement($position);
    }
}
