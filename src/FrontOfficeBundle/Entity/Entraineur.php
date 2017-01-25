<?php

namespace FrontOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entraineur
 *
 * @ORM\Table(name="entraineur")
 * @ORM\Entity(repositoryClass="FrontOfficeBundle\Repository\EntraineurRepository")
 */
class Entraineur
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
     * @ORM\Column(name="nomprenom", type="string", length=255, unique=true)
     */
    private $nomprenom;


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
     * Set nomprenom
     *
     * @param string $nomprenom
     *
     * @return Entraineur
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
}

