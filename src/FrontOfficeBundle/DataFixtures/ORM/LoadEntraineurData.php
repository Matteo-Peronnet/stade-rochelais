<?php
/**
 * Created by PhpStorm.
 * User: Vivien
 * Date: 04/01/2017
 * Time: 08:24
 */

// src/FrontOfficeBundle/DataFixtures/ORM/LoadEntraineurData.php
namespace FrontOfficeBundle\Bundle\DataFixtures\ORM;
use FrontOfficeBundle\Entity\Entraineur;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadEntraineurData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $entrBayonne = new Entraineur();
        $entrBayonne->setNomprenom("Vincent Etcheto");

        $entrBordBegles = new Entraineur();
        $entrBordBegles->setNomprenom("Jacques Brunel");

        $entrBrive = new Entraineur();
        $entrBrive->setNomprenom("Philippe Carbonneau");

        $entrCastres = new Entraineur();
        $entrCastres->setNomprenom("Frédéric Charrier");

        $entrClermont = new Entraineur();
        $entrClermont->setNomprenom("Franck Azéma");

        $entrGrenoble = new Entraineur();
        $entrGrenoble->setNomprenom("Aaron Dundon");

        $entrLyonOU = new Entraineur();
        $entrLyonOU->setNomprenom("Sébastien Bruno");

        $entrMontpellier = new Entraineur();
        $entrMontpellier->setNomprenom("Abdelatif Benazzi");

        $entrPau = new Entraineur();
        $entrPau->setNomprenom("Carl Hayman");

        $entrRacing_92 = new Entraineur();
        $entrRacing_92->setNomprenom("Laurent Labit ");

        $entrStdFrancais = new Entraineur();
        $entrStdFrancais->setNomprenom("Greg Cooper");

        $entrStdRochelais = new Entraineur();
        $entrStdRochelais->setNomprenom("Patrice Collazo");

        $entrToulon = new Entraineur();
        $entrToulon->setNomprenom("Bernard Dal Maso");

        $entrToulouse = new Entraineur();
        $entrToulouse->setNomprenom("Jean-Baptiste Elissalde");
        
        $manager->persist($entrBayonne);
        $manager->persist($entrBordBegles);
        $manager->persist($entrBrive);
        $manager->persist($entrCastres);
        $manager->persist($entrClermont);
        $manager->persist($entrGrenoble);
        $manager->persist($entrLyonOU);
        $manager->persist($entrMontpellier);
        $manager->persist($entrPau);
        $manager->persist($entrRacing_92);
        $manager->persist($entrStdFrancais);
        $manager->persist($entrStdRochelais);
        $manager->persist($entrToulon);
        $manager->persist($entrToulouse);
        $manager->flush();

        $this->addReference('Entraineur Bayonne', $entrBayonne);
        $this->addReference('Entraineur Bordeaux-Begles', $entrBordBegles);
        $this->addReference('Entraineur Brive', $entrBrive);
        $this->addReference('Entraineur Castres', $entrCastres);
        $this->addReference('Entraineur Clermont', $entrClermont);
        $this->addReference('Entraineur Grenoble', $entrGrenoble);
        $this->addReference('Entraineur LyonOU', $entrLyonOU);
        $this->addReference('Entraineur Montpellier', $entrMontpellier);
        $this->addReference('Entraineur Pau', $entrPau);
        $this->addReference('Entraineur Racing 92', $entrRacing_92);
        $this->addReference('Entraineur Stade Français', $entrStdFrancais);
        $this->addReference('Entraineur Stade Rochelais', $entrStdRochelais);
        $this->addReference('Entraineur Toulon', $entrToulon);
        $this->addReference('Entraineur Toulouse', $entrToulouse);
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 1;
    }

}