<?php

namespace FrontOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;


/**
 * Diffuseur
 *
 * @ORM\Table(name="diffuseur")
 * @ORM\Entity(repositoryClass="FrontOfficeBundle\Repository\DiffuseurRepository")
 */
class Diffuseur
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
     * @ORM\Column(name="Logo", type="string", length=255)
     */
    private $logo;

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
     * @return Diffuseur
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
     * Set logo
     *
     * @param string $logo
     *
     * @return Diffuseur
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return string
     */
    public function getLogo()
    {
        return $this->logo;
    }

    protected $file_upload_logo_diffuseur;

    public function upload(UploadedFile $file)
    {
        $fileName = $file->getClientOriginalName();
        $dir = __DIR__.'../../../../web/uploads/Diffuseur';
        $file->move($dir, $fileName);

        return $fileName;
    }

    /**
     * @return mixed
     */
    public function getFileUploadLogoDiffuseur()
    {
        return $this->file_upload_logo_diffuseur;
    }

    /**
     * @param mixed $file_upload_logo_diffuseur
     */
    public function setFileUploadLogoDiffuseur($file_upload_logo_diffuseur)
    {
        $this->file_upload_logo_diffuseur = $file_upload_logo_diffuseur;
    }
}
