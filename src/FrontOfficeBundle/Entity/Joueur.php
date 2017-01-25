<?php

namespace FrontOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;



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
     * @ORM\Column(name="nomprenom", type="string", length=255)
     */
    private $nomprenom;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=255)
     */
    private $photo;

    /**
     * @var Equipe
     * @ORM\ManyToOne(targetEntity="FrontOfficeBundle\Entity\Equipe",cascade={"persist"}, inversedBy="joueur")
     * @ORM\JoinColumn(name="equipe_id", referencedColumnName="id")
     */
    private $equipe;

    /**
     * @var Position
     * @ORM\ManyToMany(targetEntity="FrontOfficeBundle\Entity\Position",cascade={"persist"}, inversedBy="joueur")
     * @ORM\JoinColumn(name="position_id", referencedColumnName="id")
     */
    private $position;

    /**
     * @var int
     *
     * @ORM\Column(name="age", type="integer")
     */
    private $age;

    /**
     * @var string
     *
     * @ORM\Column(name="datenaissance", type="string", length=255)
     */
    private $datenaissance;

    /**
     * @var int
     *
     * @ORM\Column(name="poids", type="integer")
     */
    private $poids;

    /**
     * @var int
     *
     * @ORM\Column(name="taille", type="integer")
     */
    private $taille;

    protected $file_upload_csv_joueur;

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
    public function getFileUploadCsvJoueur()
    {
        return $this->file_upload_csv_joueur;
    }

    /**
     * @param mixed $file_upload_csv_joueur
     */
    public function setFileUploadCsvJoueur($file_upload_csv_joueur)
    {
        $this->file_upload_csv_joueur = $file_upload_csv_joueur;
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

    /**
     * Set nomprenom
     *
     * @param string $nomprenom
     *
     * @return Joueur
     */
    public function setNomprenom($nomprenom)
    {
        $this->nomprenom = $nomprenom;

        return $this;
    }

    /**
     * Get nomprenom
     *
     * @return string
     */
    public function getNomprenom()
    {
        return $this->nomprenom;
    }

    /**
     * Set age
     *
     * @param integer $age
     *
     * @return Joueur
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return integer
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set datenaissance
     *
     * @param string $datenaissance
     *
     * @return Joueur
     */
    public function setDatenaissance($datenaissance)
    {
        $this->datenaissance = $datenaissance;

        return $this;
    }

    /**
     * Get datenaissance
     *
     * @return string
     */
    public function getDatenaissance()
    {
        return $this->datenaissance;
    }

    /**
     * Set poids
     *
     * @param integer $poids
     *
     * @return Joueur
     */
    public function setPoids($poids)
    {
        $this->poids = $poids;

        return $this;
    }

    /**
     * Get poids
     *
     * @return integer
     */
    public function getPoids()
    {
        return $this->poids;
    }

    /**
     * Set taille
     *
     * @param integer $taille
     *
     * @return Joueur
     */
    public function setTaille($taille)
    {
        $this->taille = $taille;

        return $this;
    }

    /**
     * Get taille
     *
     * @return integer
     */
    public function getTaille()
    {
        return $this->taille;
    }

    /**
     * Get position
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param Position $position
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }
}
