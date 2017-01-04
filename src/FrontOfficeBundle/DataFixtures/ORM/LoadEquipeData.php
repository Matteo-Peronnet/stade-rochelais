<?php
/**
 * Created by PhpStorm.
 * User: Vivien
 * Date: 04/01/2017
 * Time: 08:24
 */

// src/FrontOfficeBundle/DataFixtures/ORM/LoadEquipeData.php
namespace FrontOfficeBundle\Bundle\DataFixtures\ORM;
use FrontOfficeBundle\Entity\Equipe;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadEquipe extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $bayonne = new Equipe();
        $bayonne->setNom("Bayonne");
        $bayonne->setBlason("img/Logo/Bayonne.png");
        $bayonne->setStade("Jean-Dauger");

        $bordeaux_begles = new Equipe();
        $bordeaux_begles->setNom("Bordeaux-Begles");
        $bordeaux_begles->setBlason("img/Logo/Bordeaux-Begles.png");
        $bordeaux_begles->setStade("André-Moga");

        $brive = new Equipe();
        $brive->setNom("Brive");
        $brive->setBlason("img/Logo/Brive.png");
        $brive->setStade("Amédée Domenech");

        $castres = new Equipe();
        $castres->setNom("Castres");
        $castres->setBlason("img/Logo/Castres.png");
        $castres->setStade("Jean Pierre-Antoine");

        $clermont = new Equipe();
        $clermont->setNom("Clermont");
        $clermont->setBlason("img/Logo/Clermont.png");
        $clermont->setStade("Parc des Sports Marcel Michelin");

        $grenoble = new Equipe();
        $grenoble->setNom("Grenoble");
        $grenoble->setBlason("img/Logo/Grenoble.png");
        $grenoble->setStade("Des Alpes");

        $lyonOU = new Equipe();
        $lyonOU->setNom("LyonOU");
        $lyonOU->setBlason("img/Logo/LyonOU.png");
        $lyonOU->setStade("Gerland");

        $montpellier = new Equipe();
        $montpellier->setNom("Montpellier");
        $montpellier->setBlason("img/Logo/Montpellier.png");
        $montpellier->setStade("Altrad Stadium");

        $pau = new Equipe();
        $pau->setNom("Pau");
        $pau->setBlason("img/Logo/Pau.png");
        $pau->setStade("du Hameau");

        $racing_92 = new Equipe();
        $racing_92->setNom("Racing 92");
        $racing_92->setBlason("img/Logo/Racing_92.png");
        $racing_92->setStade("Yves Du Manoir");

        $stade_francais = new Equipe();
        $stade_francais->setNom("Stade Francais");
        $stade_francais->setBlason("img/Logo/Stade_Francais.png");
        $stade_francais->setStade("Jean Bouin");

        $stade_rochelais = new Equipe();
        $stade_rochelais->setNom("Stade Rochelais");
        $stade_rochelais->setBlason("img/Logo/Stade_Rochelais.png");
        $stade_rochelais->setStade("Marcel Deflandre");

        $toulon = new Equipe();
        $toulon->setNom("Toulon");
        $toulon->setBlason("img/Logo/Toulon.png");
        $toulon->setStade("Mayol");

        $toulouse = new Equipe();
        $toulouse->setNom("Toulouse");
        $toulouse->setBlason("img/Logo/Toulouse.png");
        $toulouse->setStade("Ernest Wallon");



        $manager->persist($bayonne);
        $manager->persist($bordeaux_begles);
        $manager->persist($brive);
        $manager->persist($castres);
        $manager->persist($clermont);
        $manager->persist($grenoble);
        $manager->persist($lyonOU);
        $manager->persist($montpellier);
        $manager->persist($pau);
        $manager->persist($racing_92);
        $manager->persist($stade_francais);
        $manager->persist($stade_rochelais);
        $manager->persist($toulon);
        $manager->persist($toulouse);
        $manager->flush();

        $this->addReference('Bayonne', $bayonne);
        $this->addReference('Bordeaux-begles', $bordeaux_begles);
        $this->addReference('Brive', $brive);
        $this->addReference('Castres', $castres);
        $this->addReference('Clermont', $clermont);
        $this->addReference('Grenoble', $grenoble);
        $this->addReference('LyonOU', $lyonOU);
        $this->addReference('Montpellier', $montpellier);
        $this->addReference('Pau', $pau);
        $this->addReference('Racing_92', $racing_92);
        $this->addReference('Stade_Francais', $stade_francais);
        $this->addReference('Stade_Rochelais', $stade_rochelais);
        $this->addReference('Toulon', $toulon);
        $this->addReference('Toulouse', $toulouse);
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 1;
    }

}