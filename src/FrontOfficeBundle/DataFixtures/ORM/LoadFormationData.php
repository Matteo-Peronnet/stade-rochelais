<?php
/**
 * Created by PhpStorm.
 * User: Vivien
 * Date: 04/01/2017
 * Time: 00:37
 */

// src/FrontOfficeBundle/DataFixtures/ORM/LoadFormationData.php
namespace FrontOfficeBundle\Bundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use FrontOfficeBundle\Entity\Formation;

class LoadFormationData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $formationBay = new Formation();
        $formationBay->setEquipe($this->getReference('Bayonne'));
        $formationBay->setNom("Equipe Type Bayonne");
        
        $formationBB = new Formation();
        $formationBB->setEquipe($this->getReference('Bordeaux-Begles'));
        $formationBB->setNom("Equipe Type Bordeaux-Begles");
        
        $formationBri = new Formation();
        $formationBri->setEquipe($this->getReference('Brive'));
        $formationBri->setNom("Equipe Type Brive");
        
        $formationCas = new Formation();
        $formationCas->setEquipe($this->getReference('Castres'));
        $formationCas->setNom("Equipe Type Castres");
        
        $formationCle = new Formation();
        $formationCle->setEquipe($this->getReference('Clermont'));
        $formationCle->setNom("Equipe Type Clermont");
        
        $formationGre = new Formation();
        $formationGre->setEquipe($this->getReference('Grenoble'));
        $formationGre->setNom("Equipe Type Grenoble");
        
        $formationLyo = new Formation();
        $formationLyo->setEquipe($this->getReference('LyonOU'));
        $formationLyo->setNom("Equipe Type LyonOU");
        
        $formationMon = new Formation();
        $formationMon->setEquipe($this->getReference('Montpellier'));
        $formationMon->setNom("Equipe Type Montpellier");
        
        $formationPau = new Formation();
        $formationPau->setEquipe($this->getReference('Pau'));
        $formationPau->setNom("Equipe Type Pau");
        
        $formationRac = new Formation();
        $formationRac->setEquipe($this->getReference('Racing 92'));
        $formationRac->setNom("Equipe Type Racing 92");
        
        $formationSFr = new Formation();
        $formationSFr->setEquipe($this->getReference('Stade Français'));
        $formationSFr->setNom("Equipe Type Stade Français");
        
        $formationSRo = new Formation();
        $formationSRo->setEquipe($this->getReference('Stade Rochelais'));
        $formationSRo->setNom("Equipe Type Stade Rochelais");
        
        $formationTon = new Formation();
        $formationTon->setEquipe($this->getReference('Toulon'));
        $formationTon->setNom("Equipe Type Toulon");
        
        $formationTos = new Formation();
        $formationTos->setEquipe($this->getReference('Toulouse'));
        $formationTos->setNom("Equipe Type Toulouse");
        
        $this->addReference($formationBay->getNom(),$formationBay);
        $this->addReference($formationBB->getNom(),$formationBB);
        $this->addReference($formationBri->getNom(),$formationBri);
        $this->addReference($formationCas->getNom(),$formationCas);
        $this->addReference($formationCle->getNom(),$formationCle);
        $this->addReference($formationGre->getNom(),$formationGre);
        $this->addReference($formationLyo->getNom(),$formationLyo);
        $this->addReference($formationMon->getNom(),$formationMon);
        $this->addReference($formationPau->getNom(),$formationPau);
        $this->addReference($formationRac->getNom(),$formationRac);
        $this->addReference($formationSFr->getNom(),$formationSFr);
        $this->addReference($formationSRo->getNom(),$formationSRo);
        $this->addReference($formationTon->getNom(),$formationTon);
        $this->addReference($formationTos->getNom(),$formationTos);
        
        $manager->persist($formationBay);
        $manager->persist($formationBB);
        $manager->persist($formationBri);
        $manager->persist($formationCas);
        $manager->persist($formationCle);
        $manager->persist($formationGre);
        $manager->persist($formationLyo);
        $manager->persist($formationMon);
        $manager->persist($formationPau);
        $manager->persist($formationRac);
        $manager->persist($formationSFr);
        $manager->persist($formationSRo);
        $manager->persist($formationTon);
        $manager->persist($formationTos);

        $manager->flush();



    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 4;
    }

}