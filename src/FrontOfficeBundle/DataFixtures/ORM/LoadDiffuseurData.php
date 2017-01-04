<?php
/**
 * Created by PhpStorm.
 * User: Vivien
 * Date: 04/01/2017
 * Time: 00:37
 */

// src/FrontOfficeBundle/DataFixtures/ORM/LoadDiffuseurData.php
namespace FrontOfficeBundle\Bundle\DataFixtures\ORM;
use FrontOfficeBundle\Entity\Diffuseur;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadDiffuseurData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $diffuseur = new Diffuseur();
        $diffuseur->setNom("SFR");
        $diffuseur->setLogo("img/sponsors/sfr-sport.png");

        $diffuseur2 = new Diffuseur();
        $diffuseur2->setNom("Canal + ");
        $diffuseur2->setLogo("img/sponsors/canal+sport.png");

        $manager->persist($diffuseur);
        $manager->persist($diffuseur2);
        $manager->flush();

        $this->addReference('diffuseur', $diffuseur);
        $this->addReference('diffuseur2', $diffuseur2);
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 4;
    }

}