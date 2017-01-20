<?php
/**
 * Created by PhpStorm.
 * User: Vivien
 * Date: 04/01/2017
 * Time: 00:37
 */

// src/FrontOfficeBundle/DataFixtures/ORM/LoadPositionData.php
namespace FrontOfficeBundle\Bundle\DataFixtures\ORM;
use FrontOfficeBundle\Entity\Diffuseur;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use FrontOfficeBundle\Entity\Position;

class LoadPositionData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $pilier_gauche = new Position();
        $pilier_gauche->setNom("Pilier gauche");
        $pilier_gauche->setNumero(1);

        $talonneur = new Position();
        $talonneur->setNom("Talonneur");
        $talonneur->setNumero(2);

        $pilier_droit = new Position();
        $pilier_droit->setNom("Pilier droit");
        $pilier_droit->setNumero(3);

        $deuxieme_ligne_gauche = new Position();
        $deuxieme_ligne_gauche->setNom("Deuxieme ligne gauche");
        $deuxieme_ligne_gauche->setNumero(4);

        $deuxieme_ligne_droite = new Position();
        $deuxieme_ligne_droite->setNom("Deuxieme ligne droite");
        $deuxieme_ligne_droite->setNumero(5);

        $troisieme_ligne_gauche = new Position();
        $troisieme_ligne_gauche->setNom("Troisième ligne gauche");
        $troisieme_ligne_gauche->setNumero(6);

        $troisieme_ligne_droite = new Position();
        $troisieme_ligne_droite->setNom("Troisième ligne droite");
        $troisieme_ligne_droite->setNumero(7);

        $troisieme_ligne_centre = new Position();
        $troisieme_ligne_centre->setNom("Troisième ligne centre");
        $troisieme_ligne_centre->setNumero(8);

        $demi_melee = new Position();
        $demi_melee->setNom("Demi de melée");
        $demi_melee->setNumero(9);

        $demi_ouverture = new Position();
        $demi_ouverture->setNom("Demi d'ouverture");
        $demi_ouverture->setNumero(10);

        $trois_quart_aile_gauche = new Position();
        $trois_quart_aile_gauche->setNom("Trois quart aile gauche");
        $trois_quart_aile_gauche->setNumero(11);

        $trois_quart_centre_gauche = new Position();
        $trois_quart_centre_gauche->setNom("Trois quart centre gauche");
        $trois_quart_centre_gauche->setNumero(12);

        $trois_quart_centre_droit = new Position();
        $trois_quart_centre_droit->setNom("Trois quart centre droit");
        $trois_quart_centre_droit->setNumero(13);

        $trois_quart_aile_droit = new Position();
        $trois_quart_aile_droit->setNom("Trois quart aile droit");
        $trois_quart_aile_droit->setNumero(14);

        $arriere = new Position();
        $arriere->setNom("Arrière");
        $arriere->setNumero(15);

        $remplacant1 = new Position();
        $remplacant1->setNom("Remplaçant1");
        $remplacant1->setNumero(16);

        $remplacant2 = new Position();
        $remplacant2->setNom("Remplaçant2");
        $remplacant2->setNumero(17);

        $remplacant3 = new Position();
        $remplacant3->setNom("Remplaçant3");
        $remplacant3->setNumero(18);

        $remplacant4 = new Position();
        $remplacant4->setNom("Remplaçant4");
        $remplacant4->setNumero(19);

        $remplacant5 = new Position();
        $remplacant5->setNom("Remplaçant5");
        $remplacant5->setNumero(20);

        $remplacant6 = new Position();
        $remplacant6->setNom("Remplaçant6");
        $remplacant6->setNumero(21);

        $remplacant7 = new Position();
        $remplacant7->setNom("Remplaçant7");
        $remplacant7->setNumero(22);

        $manager->persist($pilier_droit);
        $this->addReference('Pilier droit',$pilier_droit);
        $manager->persist($pilier_gauche);
        $this->addReference('Pilier gauche',$pilier_gauche);
        $manager->persist($talonneur);
        $this->addReference('Talonneur',$talonneur);
        $manager->persist($deuxieme_ligne_gauche);
        $this->addReference('Deuxieme ligne gauche',$deuxieme_ligne_gauche);
        $manager->persist($deuxieme_ligne_droite);
        $this->addReference('Deuxieme ligne droite',$deuxieme_ligne_droite);
        $manager->persist($troisieme_ligne_gauche);
        $this->addReference('Troisième ligne gauche',$troisieme_ligne_gauche);
        $manager->persist($troisieme_ligne_droite);
        $this->addReference('Troisième ligne droite',$troisieme_ligne_droite);
        $manager->persist($troisieme_ligne_centre);
        $this->addReference('Troisième ligne centre',$troisieme_ligne_centre);
        $manager->persist($demi_melee);
        $this->addReference('Demi de mélée',$demi_melee);
        $manager->persist($demi_ouverture);
        $this->addReference('Demi d\'ouverture',$demi_ouverture);
        $manager->persist($trois_quart_aile_gauche);
        $this->addReference('Trois quart aile gauche',$trois_quart_aile_gauche);
        $manager->persist($trois_quart_centre_gauche);
        $this->addReference('Trois quart centre gauche',$trois_quart_centre_gauche);
        $manager->persist($trois_quart_centre_droit);
        $this->addReference('Trois quart centre droit',$trois_quart_centre_droit);
        $manager->persist($trois_quart_aile_droit);
        $this->addReference('Trois quart aile droit',$trois_quart_aile_droit);
        $manager->persist($arriere);
        $this->addReference('Arrière',$arriere);
        $manager->persist($remplacant1);
        $this->addReference('Remplacant1',$remplacant1);
        $manager->persist($remplacant2);
        $this->addReference('Remplacant2',$remplacant2);
        $manager->persist($remplacant3);
        $this->addReference('Remplacant3',$remplacant3);
        $manager->persist($remplacant4);
        $this->addReference('Remplacant4',$remplacant4);
        $manager->persist($remplacant5);
        $this->addReference('Remplacant5',$remplacant5);
        $manager->persist($remplacant6);
        $this->addReference('Remplacant6',$remplacant6);
        $manager->persist($remplacant7);
        $this->addReference('Remplacant7',$remplacant7);

        $manager->flush();



    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 5;
    }

}