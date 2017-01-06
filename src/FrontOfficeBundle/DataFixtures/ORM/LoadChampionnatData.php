<?php
/**
 * Created by PhpStorm.
 * User: Vivien
 * Date: 04/01/2017
 * Time: 00:22
 */

// src/FrontOfficeBundle/DataFixtures/ORM/LoadChampionnatData.php
namespace FrontOfficeBundle\Bundle\DataFixtures\ORM;
use FrontOfficeBundle\Entity\Championnat;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadChampionnatData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $champ = new Championnat();
        $champ->setNom("Top 14");
        $champ->setDescription("Le Championnat de France de Rugby a XV de premiere division");
        $champ->addEquipe($this->getReference('Bayonne'));
        $champ->addEquipe($this->getReference('Bordeaux-begles'));
        $champ->addEquipe($this->getReference('Brive'));
        $champ->addEquipe($this->getReference('Castres'));
        $champ->addEquipe($this->getReference('Clermont'));
        $champ->addEquipe($this->getReference('Grenoble'));
        $champ->addEquipe($this->getReference('LyonOU'));
        $champ->addEquipe($this->getReference('Montpellier'));
        $champ->addEquipe($this->getReference('Pau'));
        $champ->addEquipe($this->getReference('Racing_92'));
        $champ->addEquipe($this->getReference('Stade_Francais'));
        $champ->addEquipe($this->getReference('Stade_Rochelais'));
        $champ->addEquipe($this->getReference('Toulon'));
        $champ->addEquipe($this->getReference('Toulouse'));

        $champ2 = new Championnat();
        $champ2->setNom("PRO D2 ");
        $champ2->setDescription("Le Championnat de France de Rugby a XV de deuxieme division");

        $champ3 = new Championnat();
        $champ3->setNom("Champions Cup ");
        $champ3->setDescription("Le Championnat européen de Rugby a XV ");

        $manager->persist($champ);
        $manager->persist($champ2);
        $manager->persist($champ3);
        $manager->flush();

        $this->addReference('champ', $champ);
        $this->addReference('champ2', $champ2);
        $this->addReference('champ3', $champ3);
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 2;
    }

}