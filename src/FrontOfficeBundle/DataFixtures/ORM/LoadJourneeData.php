<?php
/**
 * Created by PhpStorm.
 * User: Vivien
 * Date: 04/01/2017
 * Time: 09:21
 */

// src/FrontOfficeBundle/DataFixtures/ORM/LoadJourneeData.php
namespace FrontOfficeBundle\Bundle\DataFixtures\ORM;
use FrontOfficeBundle\Entity\Journee;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadJourneeData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $journee = new Journee();
        $journee->setNom("Journée 1");
        $journee->setChampionnat($this->getReference('champ'));

        $journee2 = new Journee();
        $journee2->setNom("Journée 2");
        $journee2->setChampionnat($this->getReference('champ'));


        $journee3 = new Journee();
        $journee3->setNom("Journée 3");
        $journee3->setChampionnat($this->getReference('champ'));


        $journee4 = new Journee();
        $journee4->setNom("Journée 4");
        $journee4->setChampionnat($this->getReference('champ'));


        $journee5 = new Journee();
        $journee5->setNom("Journée 5");
        $journee5->setChampionnat($this->getReference('champ'));


        $journee6 = new Journee();
        $journee6->setNom("Journée 6");
        $journee6->setChampionnat($this->getReference('champ'));


        $journee7 = new Journee();
        $journee7->setNom("Journée 7");
        $journee7->setChampionnat($this->getReference('champ'));


        $journee8 = new Journee();
        $journee8->setNom("Journée 8");
        $journee8->setChampionnat($this->getReference('champ'));


        $journee9 = new Journee();
        $journee9->setNom("Journée 9");
        $journee9->setChampionnat($this->getReference('champ'));


        $journee10 = new Journee();
        $journee10->setNom("Journée 10");
        $journee10->setChampionnat($this->getReference('champ'));


        $journee11 = new Journee();
        $journee11->setNom("Journée 11");
        $journee11->setChampionnat($this->getReference('champ'));


        $journee12 = new Journee();
        $journee12->setNom("Journée 12");
        $journee12->setChampionnat($this->getReference('champ'));


        $journee13 = new Journee();
        $journee13->setNom("Journée 13");
        $journee13->setChampionnat($this->getReference('champ'));


        $journee14 = new Journee();
        $journee14->setNom("Journée 14");
        $journee14->setChampionnat($this->getReference('champ'));


        $journee15 = new Journee();
        $journee15->setNom("Journée 15");
        $journee15->setChampionnat($this->getReference('champ'));


        $journee16 = new Journee();
        $journee16->setNom("Journée 16");
        $journee16->setChampionnat($this->getReference('champ'));


        $journee17 = new Journee();
        $journee17->setNom("Journée 17");
        $journee17->setChampionnat($this->getReference('champ'));


        $journee18 = new Journee();
        $journee18->setNom("Journée 18");
        $journee18->setChampionnat($this->getReference('champ'));


        $journee19 = new Journee();
        $journee19->setNom("Journée 19");
        $journee19->setChampionnat($this->getReference('champ'));


        $journee20 = new Journee();
        $journee20->setNom("Journée 20");
        $journee20->setChampionnat($this->getReference('champ'));


        $journee21 = new Journee();
        $journee21->setNom("Journée 21");
        $journee21->setChampionnat($this->getReference('champ'));


        $journee22 = new Journee();
        $journee22->setNom("Journée 22");
        $journee22->setChampionnat($this->getReference('champ'));


        $journee23 = new Journee();
        $journee23->setNom("Journée 23");
        $journee23->setChampionnat($this->getReference('champ'));


        $journee24 = new Journee();
        $journee24->setNom("Journée 24");
        $journee24->setChampionnat($this->getReference('champ'));


        $journee25 = new Journee();
        $journee25->setNom("Journée 25");
        $journee25->setChampionnat($this->getReference('champ'));


        $journee26 = new Journee();
        $journee26->setNom("Journée 26");
        $journee26->setChampionnat($this->getReference('champ'));


        $manager->persist($journee);
        $manager->persist($journee2);
        $manager->persist($journee3);
        $manager->persist($journee4);
        $manager->persist($journee5);
        $manager->persist($journee6);
        $manager->persist($journee7);
        $manager->persist($journee8);
        $manager->persist($journee9);
        $manager->persist($journee10);
        $manager->persist($journee11);
        $manager->persist($journee12);
        $manager->persist($journee13);
        $manager->persist($journee14);
        $manager->persist($journee15);
        $manager->persist($journee16);
        $manager->persist($journee17);
        $manager->persist($journee18);
        $manager->persist($journee19);
        $manager->persist($journee20);
        $manager->persist($journee21);
        $manager->persist($journee22);
        $manager->persist($journee23);
        $manager->persist($journee24);
        $manager->persist($journee25);
        $manager->persist($journee26);
        $manager->flush();

        $this->addReference('journee', $journee);
        $this->addReference('journee2', $journee2);
        $this->addReference('journee3', $journee3);
        $this->addReference('journee4', $journee4);
        $this->addReference('journee5', $journee5);
        $this->addReference('journee6', $journee6);
        $this->addReference('journee7', $journee7);
        $this->addReference('journee8', $journee8);
        $this->addReference('journee9', $journee9);
        $this->addReference('journee10', $journee10);
        $this->addReference('journee11', $journee11);
        $this->addReference('journee12', $journee12);
        $this->addReference('journee13', $journee13);
        $this->addReference('journee14', $journee14);
        $this->addReference('journee15', $journee15);
        $this->addReference('journee16', $journee16);
        $this->addReference('journee17', $journee17);
        $this->addReference('journee18', $journee18);
        $this->addReference('journee19', $journee19);
        $this->addReference('journee20', $journee20);
        $this->addReference('journee21', $journee21);
        $this->addReference('journee22', $journee22);
        $this->addReference('journee23', $journee23);
        $this->addReference('journee24', $journee24);
        $this->addReference('journee25', $journee25);
        $this->addReference('journee26', $journee26);
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 3;
    }

}