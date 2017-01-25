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
     * @ORM\OneToOne(targetEntity="OC\FrontOfficeBundle\Entity\Equipe", cascade={"persist", "remove"})
     */
    private $blason;

    /**
     * @var string
     *
     * @ORM\Column(name="Stade", type="string", length=255)
     */
    private $stade;

    //On ajoute cet attribut pour y stocker le nom du fichier temporairement
    private $tempFilename;

    private $file;

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
     * @ORM\OneToMany(targetEntity="FrontOfficeBundle\Entity\Formation", cascade={"persist"}, mappedBy="equipe")
     */
    private $formation;

    /**
     * @var couleur
     *
     * @ORM\Column(name="Couleur", type="string", length=8)
     * @ORM\OneToOne(targetEntity="OC\FrontOfficeBundle\Entity\Equipe", cascade={"persist", "remove"})
     */
    private $couleur = "#000000";

    /**
     * @var Entraineur
     * @ORM\OneToOne(targetEntity="FrontOfficeBundle\Entity\Entraineur")
     */
    private $entraineur;



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
     *
     *
     *
     *
     */
//    public function setFile(UploadedFile $file)
//    {
//        $this->file =$file;
//        //On vérifie si on avait deja un fichier pour cette entité
//        if(null !==$this->blason)
//        {
//            //On sauvegarde l'extension du fichier pour le supprimer plus tard
//            $this->tempFilename = $this->blason;
//
//            //On reinitialise les valeurs de l'attribut blason
//            $this->blason = null;
//        }
//    }


    /**
     *
     *
     *
     *
     */
    public function preUpload()
    {
        // Si jamais il n'y a pas de fichier (champ facultatif)
        if (null ==$this->file)
        {
            return;
        }

        // Le nom du fichier est son id, on doit juste stocker également son extension
        // Pour faire propre, on devrait renommer cet attribut en "extention", plutot que "blason"
        $this->blason = $this->file->guessExtention();

    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        // Si jamais il n'y a pas de fichier (champ facultatif)
        if (null ==$this->file)
        {
            return;
        }

        //Si on avait un ancien fichier, on le supprime
        if (null !== $this->tempFilename)
        {
            $oldFile = $this->getUploadDir().'/'.$this->tempFilename;
            if(file_exists($oldFile))
            {
                unlink($oldFile);
            }
        }

        //On déplace le fichier envoyé dans le répertoire de notre choix
        $this->file->move(
            $this->getUploadDir(),
            $this->blason
        );
    }




    /**
     * @ORM\PreRemove()
     */
    public function preRemoveUpload()
    {
       //On sauvegarde temporairement le nom du fichier
        $this->tempFilename = $this->getUploadDir().'/'.$this->blason;
    }

    /**
     * @ORM\PostRemove
     */
    public function removeUpload()
    {
        // En postRemove, on utilise notre nom sauvegardé
        if(file_exists($this->tempFilename))
        {
            //On supprime le fichier
            unlink($this->tempFilename);
        }
    }

    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @return mixed
     */
    public function getTempFilename()
    {
        return $this->tempFilename;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $tempFilename
     */
    public function setTempFilename($tempFilename)
    {
        $this->tempFilename = $tempFilename;
    }


    public function getUploadDir()
    {
        return'img/Logo/';
    }

    /**
     *
     *
     *
     *
     */
    public function getWebPath()
    {
        return $this->getUploadDir().$this->getBlason();
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

    /**
     * Add formation
     *
     * @param \FrontOfficeBundle\Entity\Formation $formation
     *
     * @return Equipe
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
     * Set couleur
     *
     * @param string $couleur
     *
     * @return Equipe
     */
    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;

        return $this;
    }

    /**
     * Get couleur
     *
     * @return string
     */
    public function getCouleur()
    {
        return $this->couleur;
    }

    /**
     * Set entraineur
     *
     * @param \FrontOfficeBundle\Entity\Entraineur $entraineur
     *
     * @return Equipe
     */
    public function setEntraineur(\FrontOfficeBundle\Entity\Entraineur $entraineur = null)
    {
        $this->entraineur = $entraineur;

        return $this;
    }

    /**
     * Get entraineur
     *
     * @return \FrontOfficeBundle\Entity\Entraineur
     */
    public function getEntraineur()
    {
        return $this->entraineur;
    }
    
    
}
