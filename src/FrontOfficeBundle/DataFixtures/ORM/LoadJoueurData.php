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
use FrontOfficeBundle\Entity\Joueur;

class LoadJoueurData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        // http://www.rugbyrama.fr/rugby/

        /*   -------------------- Bayonne --------------------  */
        $bayonne_1 = new Joueur();
        $bayonne_1->setNom("Schuster");
        $bayonne_1->setPrenom("Jerome");
        $bayonne_1->setNumero(1);
        $bayonne_1->setTitulaire(1);
        $bayonne_1->setEquipe($this->getReference("Bayonne"));
        $bayonne_1->setPosition($this->getReference('pilier_droit'));
        $bayonne_1->setPhoto("/img/Equipes/Bayonne/".$bayonne_1->getPrenom().'_'.$bayonne_1->getNom().'.jpg');

        $bayonne_2 = new Joueur();
        $bayonne_2->setNom("Leiataua");
        $bayonne_2->setPrenom("Manu");
        $bayonne_2->setNumero(2);
        $bayonne_2->setTitulaire(1);
        $bayonne_2->setEquipe($this->getReference("Bayonne"));
        $bayonne_2->setPosition($this->getReference('pilier_gauche'));
        $bayonne_2->setPhoto("/img/Equipes/Bayonne/".$bayonne_2->getPrenom().'_'.$bayonne_2->getNom().'.jpg');

        $bayonne_3 = new Joueur();
        $bayonne_3->setNom("Cittadini");
        $bayonne_3->setPrenom("Lorenzo");
        $bayonne_3->setNumero(3);
        $bayonne_3->setTitulaire(1);
        $bayonne_3->setEquipe($this->getReference("Bayonne"));
        $bayonne_3->setPosition($this->getReference('talonneur'));
        $bayonne_3->setPhoto("/img/Equipes/Bayonne/".$bayonne_3->getPrenom().'_'.$bayonne_3->getNom().'.jpg');

        $bayonne_4 = new Joueur();
        $bayonne_4->setNom("van_Lill");
        $bayonne_4->setPrenom("Pieter-Jan");
        $bayonne_4->setNumero(4);
        $bayonne_4->setTitulaire(1);
        $bayonne_4->setEquipe($this->getReference("Bayonne"));
        $bayonne_4->setPosition($this->getReference('deuxieme_ligne_gauche'));
        $bayonne_4->setPhoto("/img/Equipes/Bayonne/".$bayonne_4->getPrenom().'_'.$bayonne_4->getNom().'.jpg');

        $bayonne_5 = new Joueur();
        $bayonne_5->setNom("Donnelly");
        $bayonne_5->setPrenom("Tom");
        $bayonne_5->setNumero(5);
        $bayonne_5->setTitulaire(1);
        $bayonne_5->setEquipe($this->getReference("Bayonne"));
        $bayonne_5->setPosition($this->getReference('deuxieme_ligne_droite'));
        $bayonne_5->setPhoto("/img/Equipes/Bayonne/".$bayonne_5->getPrenom().'_'.$bayonne_5->getNom().'.jpg');

        $bayonne_6 = new Joueur();
        $bayonne_6->setNom("Latimer");
        $bayonne_6->setPrenom("Tanerau");
        $bayonne_6->setNumero(6);
        $bayonne_6->setTitulaire(1);
        $bayonne_6->setEquipe($this->getReference("Bayonne"));
        $bayonne_6->setPosition($this->getReference('troisieme_ligne_gauche'));
        $bayonne_6->setPhoto("/img/Equipes/Bayonne/".$bayonne_6->getPrenom().'_'.$bayonne_6->getNom().'.jpg');

        $bayonne_7 = new Joueur();
        $bayonne_7->setNom("Chouzenoux");
        $bayonne_7->setPrenom("Baptiste");
        $bayonne_7->setNumero(7);
        $bayonne_7->setTitulaire(1);
        $bayonne_7->setEquipe($this->getReference("Bayonne"));
        $bayonne_7->setPosition($this->getReference('troisieme_ligne_droite'));
        $bayonne_7->setPhoto("/img/Equipes/Bayonne/".$bayonne_7->getPrenom().'_'.$bayonne_7->getNom().'.jpg');

        $bayonne_8 = new Joueur();
        $bayonne_8->setNom("Beattie");
        $bayonne_8->setPrenom("John");
        $bayonne_8->setNumero(8);
        $bayonne_8->setTitulaire(1);
        $bayonne_8->setEquipe($this->getReference("Bayonne"));
        $bayonne_8->setPosition($this->getReference('troisieme_ligne_centre'));
        $bayonne_8->setPhoto("/img/Equipes/Bayonne/".$bayonne_8->getPrenom().'_'.$bayonne_8->getNom().'.jpg');

        $bayonne_9 = new Joueur();
        $bayonne_9->setNom("Rouet");
        $bayonne_9->setPrenom("Guillaume");
        $bayonne_9->setNumero(9);
        $bayonne_9->setTitulaire(1);
        $bayonne_9->setEquipe($this->getReference("Bayonne"));
        $bayonne_9->setPosition($this->getReference('demi_melee'));
        $bayonne_9->setPhoto("/img/Equipes/Bayonne/".$bayonne_9->getPrenom().'_'.$bayonne_9->getNom().'.jpg');

        $bayonne_10 = new Joueur();
        $bayonne_10->setNom("Plessis");
        $bayonne_10->setPrenom("Willie");
        $bayonne_10->setNumero(10);
        $bayonne_10->setTitulaire(1);
        $bayonne_10->setEquipe($this->getReference("Bayonne"));
        $bayonne_10->setPosition($this->getReference('demi_ouverture'));
        $bayonne_10->setPhoto("/img/Equipes/Bayonne/".$bayonne_10->getPrenom().'_'.$bayonne_10->getNom().'.jpg');

        $bayonne_11 = new Joueur();
        $bayonne_11->setNom("Jane");
        $bayonne_11->setPrenom("Julien");
        $bayonne_11->setNumero(11);
        $bayonne_11->setTitulaire(1);
        $bayonne_11->setEquipe($this->getReference("Bayonne"));
        $bayonne_11->setPosition($this->getReference('trois_quart_aile_gauche'));
        $bayonne_11->setPhoto("/img/Equipes/Bayonne/".$bayonne_11->getPrenom().'_'.$bayonne_11->getNom().'.jpg');

        $bayonne_12 = new Joueur();
        $bayonne_12->setNom("Lacroix");
        $bayonne_12->setPrenom("Thibault");
        $bayonne_12->setNumero(12);
        $bayonne_12->setTitulaire(1);
        $bayonne_12->setEquipe($this->getReference("Bayonne"));
        $bayonne_12->setPosition($this->getReference('trois_quart_centre_gauche'));
        $bayonne_12->setPhoto("/img/Equipes/Bayonne/".$bayonne_12->getPrenom().'_'.$bayonne_12->getNom().'.jpg');

        $bayonne_13 = new Joueur();
        $bayonne_13->setNom("Lovobalavu");
        $bayonne_13->setPrenom("Gabiriele");
        $bayonne_13->setNumero(13);
        $bayonne_13->setTitulaire(1);
        $bayonne_13->setEquipe($this->getReference("Bayonne"));
        $bayonne_13->setPosition($this->getReference('trois_quart_centre_droit'));
        $bayonne_13->setPhoto("/img/Equipes/Bayonne/".$bayonne_13->getPrenom().'_'.$bayonne_13->getNom().'.jpg');

        $bayonne_14 = new Joueur();
        $bayonne_14->setNom("Laveau");
        $bayonne_14->setPrenom("Martin");
        $bayonne_14->setNumero(14);
        $bayonne_14->setTitulaire(1);
        $bayonne_14->setEquipe($this->getReference("Bayonne"));
        $bayonne_14->setPosition($this->getReference('trois_quart_aile_droit'));
        $bayonne_14->setPhoto("/img/Equipes/Bayonne/".$bayonne_14->getPrenom().'_'.$bayonne_14->getNom().'.jpg');

        $bayonne_15 = new Joueur();
        $bayonne_15->setNom("Thiery");
        $bayonne_15->setPrenom("Benjamin");
        $bayonne_15->setNumero(15);
        $bayonne_15->setTitulaire(1);
        $bayonne_15->setEquipe($this->getReference("Bayonne"));
        $bayonne_15->setPosition($this->getReference('arriere'));
        $bayonne_15->setPhoto("/img/Equipes/Bayonne/".$bayonne_15->getPrenom().'_'.$bayonne_15->getNom().'.jpg');

        $bayonne_19 = new Joueur();
        $bayonne_19->setNom("Marmouyet");
        $bayonne_19->setPrenom("Jean-Joseph");
        $bayonne_19->setNumero(19);
        $bayonne_19->setTitulaire(0);
        $bayonne_19->setEquipe($this->getReference("Bayonne"));
        $bayonne_19->setPosition($this->getReference('remplacant'));
        $bayonne_19->setPhoto("/img/Equipes/Bayonne/".$bayonne_19->getPrenom().'_'.$bayonne_19->getNom().'.jpg');

        $bayonne_22 = new Joueur();
        $bayonne_22->setNom("Martial");
        $bayonne_22->setPrenom("Romain");
        $bayonne_22->setNumero(22);
        $bayonne_22->setTitulaire(0);
        $bayonne_22->setEquipe($this->getReference("Bayonne"));
        $bayonne_22->setPosition($this->getReference('remplacant'));
        $bayonne_22->setPhoto("/img/Equipes/Bayonne/".$bayonne_22->getPrenom().'_'.$bayonne_22->getNom().'.jpg');

        $bayonne_21 = new Joueur();
        $bayonne_21->setNom("Lagarde");
        $bayonne_21->setPrenom("Raphael");
        $bayonne_21->setNumero(21);
        $bayonne_21->setTitulaire(0);
        $bayonne_21->setEquipe($this->getReference("Bayonne"));
        $bayonne_21->setPosition($this->getReference('remplacant'));
        $bayonne_21->setPhoto("/img/Equipes/Bayonne/".$bayonne_21->getPrenom().'_'.$bayonne_21->getNom().'.jpg');

        $bayonne_17 = new Joueur();
        $bayonne_17->setNom("Iguiniz");
        $bayonne_17->setPrenom("Aretz");
        $bayonne_17->setNumero(17);
        $bayonne_17->setTitulaire(0);
        $bayonne_17->setEquipe($this->getReference("Bayonne"));
        $bayonne_17->setPosition($this->getReference('remplacant'));
        $bayonne_17->setPhoto("/img/Equipes/Bayonne/".$bayonne_17->getPrenom().'_'.$bayonne_17->getNom().'.jpg');

        $bayonne_20 = new Joueur();
        $bayonne_20->setNom("Saubusse");
        $bayonne_20->setPrenom("Emmanuel");
        $bayonne_20->setNumero(20);
        $bayonne_20->setTitulaire(0);
        $bayonne_20->setEquipe($this->getReference("Bayonne"));
        $bayonne_20->setPosition($this->getReference('remplacant'));
        $bayonne_20->setPhoto("/img/Equipes/Bayonne/".$bayonne_20->getPrenom().'_'.$bayonne_20->getNom().'.jpg');


        /*   -------------------- Bordeaux-Begles --------------------  */

        $bordeaux_begles_1 = new Joueur();
        $bordeaux_begles_1->setNom("Kitshoff");
        $bordeaux_begles_1->setPrenom("Steven");
        $bordeaux_begles_1->setNumero(1);
        $bordeaux_begles_1->setTitulaire(1);
        $bordeaux_begles_1->setEquipe($this->getReference("Bordeaux-begles"));
        $bordeaux_begles_1->setPosition($this->getReference('pilier_droit'));
        $bordeaux_begles_1->setPhoto("/img/Equipes/Bordeaux-begles/".$bordeaux_begles_1->getPrenom().'_'.$bordeaux_begles_1->getNom().'.jpg');

        $bordeaux_begles_2 = new Joueur();
        $bordeaux_begles_2->setNom("Maynadier");
        $bordeaux_begles_2->setPrenom("Clement");
        $bordeaux_begles_2->setNumero(2);
        $bordeaux_begles_2->setTitulaire(1);
        $bordeaux_begles_2->setEquipe($this->getReference("Bordeaux-begles"));
        $bordeaux_begles_2->setPosition($this->getReference('pilier_gauche'));
        $bordeaux_begles_2->setPhoto("/img/Equipes/Bordeaux-begles/".$bordeaux_begles_2->getPrenom().'_'.$bordeaux_begles_2->getNom().'.jpg');

        $bordeaux_begles_3 = new Joueur();
        $bordeaux_begles_3->setNom("Cobilas");
        $bordeaux_begles_3->setPrenom("Vadim");
        $bordeaux_begles_3->setNumero(3);
        $bordeaux_begles_3->setTitulaire(1);
        $bordeaux_begles_3->setEquipe($this->getReference("Bordeaux-begles"));
        $bordeaux_begles_3->setPosition($this->getReference('talonneur'));
        $bordeaux_begles_3->setPhoto("/img/Equipes/Bordeaux-begles/".$bordeaux_begles_3->getPrenom().'_'.$bordeaux_begles_3->getNom().'.jpg');

        $bordeaux_begles_4 = new Joueur();
        $bordeaux_begles_4->setNom("Jones");
        $bordeaux_begles_4->setPrenom("Luke");
        $bordeaux_begles_4->setNumero(4);
        $bordeaux_begles_4->setTitulaire(1);
        $bordeaux_begles_4->setEquipe($this->getReference("Bordeaux-begles"));
        $bordeaux_begles_4->setPosition($this->getReference('deuxieme_ligne_gauche'));
        $bordeaux_begles_4->setPhoto("/img/Equipes/Bordeaux-begles/".$bordeaux_begles_4->getPrenom().'_'.$bordeaux_begles_4->getNom().'.jpg');

        $bordeaux_begles_5 = new Joueur();
        $bordeaux_begles_5->setNom("Cazeaux");
        $bordeaux_begles_5->setPrenom("Cyril");
        $bordeaux_begles_5->setNumero(5);
        $bordeaux_begles_5->setTitulaire(1);
        $bordeaux_begles_5->setEquipe($this->getReference("Bordeaux-begles"));
        $bordeaux_begles_5->setPosition($this->getReference('deuxieme_ligne_droite'));
        $bordeaux_begles_5->setPhoto("/img/Equipes/Bordeaux-begles/".$bordeaux_begles_5->getPrenom().'_'.$bordeaux_begles_5->getNom().'.jpg');

        $bordeaux_begles_6 = new Joueur();
        $bordeaux_begles_6->setNom("Braid");
        $bordeaux_begles_6->setPrenom("Luke");
        $bordeaux_begles_6->setNumero(6);
        $bordeaux_begles_6->setTitulaire(1);
        $bordeaux_begles_6->setEquipe($this->getReference("Bordeaux-begles"));
        $bordeaux_begles_6->setPosition($this->getReference('troisieme_ligne_gauche'));
        $bordeaux_begles_6->setPhoto("/img/Equipes/Bordeaux-begles/".$bordeaux_begles_6->getPrenom().'_'.$bordeaux_begles_6->getNom().'.jpg');

        $bordeaux_begles_7 = new Joueur();
        $bordeaux_begles_7->setNom("Chalmers");
        $bordeaux_begles_7->setPrenom("Hugh");
        $bordeaux_begles_7->setNumero(7);
        $bordeaux_begles_7->setTitulaire(1);
        $bordeaux_begles_7->setEquipe($this->getReference("Bordeaux-begles"));
        $bordeaux_begles_7->setPosition($this->getReference('troisieme_ligne_droite'));
        $bordeaux_begles_7->setPhoto("/img/Equipes/Bordeaux-begles/".$bordeaux_begles_7->getPrenom().'_'.$bordeaux_begles_7->getNom().'.jpg');

        $bordeaux_begles_8 = new Joueur();
        $bordeaux_begles_8->setNom("Goujon");
        $bordeaux_begles_8->setPrenom("Loann");
        $bordeaux_begles_8->setNumero(8);
        $bordeaux_begles_8->setTitulaire(1);
        $bordeaux_begles_8->setEquipe($this->getReference("Bordeaux-begles"));
        $bordeaux_begles_8->setPosition($this->getReference('troisieme_ligne_centre'));
        $bordeaux_begles_8->setPhoto("/img/Equipes/Bordeaux-begles/".$bordeaux_begles_8->getPrenom().'_'.$bordeaux_begles_8->getNom().'.jpg');

        $bordeaux_begles_9 = new Joueur();
        $bordeaux_begles_9->setNom("Lesgourgues");
        $bordeaux_begles_9->setPrenom("Yann");
        $bordeaux_begles_9->setNumero(9);
        $bordeaux_begles_9->setTitulaire(1);
        $bordeaux_begles_9->setEquipe($this->getReference("Bordeaux-begles"));
        $bordeaux_begles_9->setPosition($this->getReference('demi_melee'));
        $bordeaux_begles_9->setPhoto("/img/Equipes/Bordeaux-begles/".$bordeaux_begles_9->getPrenom().'_'.$bordeaux_begles_9->getNom().'.jpg');

        $bordeaux_begles_10 = new Joueur();
        $bordeaux_begles_10->setNom("Hickey");
        $bordeaux_begles_10->setPrenom("Simon");
        $bordeaux_begles_10->setNumero(10);
        $bordeaux_begles_10->setTitulaire(1);
        $bordeaux_begles_10->setEquipe($this->getReference("Bordeaux-begles"));
        $bordeaux_begles_10->setPosition($this->getReference('demi_ouverture'));
        $bordeaux_begles_10->setPhoto("/img/Equipes/Bordeaux-begles/".$bordeaux_begles_10->getPrenom().'_'.$bordeaux_begles_10->getNom().'.jpg');

        $bordeaux_begles_11 = new Joueur();
        $bordeaux_begles_11->setNom("Connor");
        $bordeaux_begles_11->setPrenom("Blair");
        $bordeaux_begles_11->setNumero(11);
        $bordeaux_begles_11->setTitulaire(1);
        $bordeaux_begles_11->setEquipe($this->getReference("Bordeaux-begles"));
        $bordeaux_begles_11->setPosition($this->getReference('trois_quart_aile_gauche'));
        $bordeaux_begles_11->setPhoto("/img/Equipes/Bordeaux-begles/".$bordeaux_begles_11->getPrenom().'_'.$bordeaux_begles_11->getNom().'.jpg');

        $bordeaux_begles_12 = new Joueur();
        $bordeaux_begles_12->setNom("Lonca");
        $bordeaux_begles_12->setPrenom("Romain");
        $bordeaux_begles_12->setNumero(12);
        $bordeaux_begles_12->setTitulaire(1);
        $bordeaux_begles_12->setEquipe($this->getReference("Bordeaux-begles"));
        $bordeaux_begles_12->setPosition($this->getReference('trois_quart_centre_gauche'));
        $bordeaux_begles_12->setPhoto("/img/Equipes/Bordeaux-begles/".$bordeaux_begles_12->getPrenom().'_'.$bordeaux_begles_12->getNom().'.jpg');

        $bordeaux_begles_13 = new Joueur();
        $bordeaux_begles_13->setNom("Spence");
        $bordeaux_begles_13->setPrenom("Jayden");
        $bordeaux_begles_13->setNumero(13);
        $bordeaux_begles_13->setTitulaire(1);
        $bordeaux_begles_13->setEquipe($this->getReference("Bordeaux-begles"));
        $bordeaux_begles_13->setPosition($this->getReference('trois_quart_centre_droit'));
        $bordeaux_begles_13->setPhoto("/img/Equipes/Bordeaux-begles/".$bordeaux_begles_13->getPrenom()."_".$bordeaux_begles_13->getNom().".jpg");

        $bordeaux_begles_14 = new Joueur();
        $bordeaux_begles_14->setNom("Dubie");
        $bordeaux_begles_14->setPrenom("Jean-Baptiste");
        $bordeaux_begles_14->setNumero(14);
        $bordeaux_begles_14->setTitulaire(1);
        $bordeaux_begles_14->setEquipe($this->getReference("Bordeaux-begles"));
        $bordeaux_begles_14->setPosition($this->getReference('trois_quart_aile_droit'));
        $bordeaux_begles_14->setPhoto("/img/Equipes/Bordeaux-begles/".$bordeaux_begles_14->getPrenom().'_'.$bordeaux_begles_14->getNom().'.jpg');

        $bordeaux_begles_15 = new Joueur();
        $bordeaux_begles_15->setNom("Buttin");
        $bordeaux_begles_15->setPrenom("Jean-Marcellin");
        $bordeaux_begles_15->setNumero(15);
        $bordeaux_begles_15->setTitulaire(1);
        $bordeaux_begles_15->setEquipe($this->getReference("Bordeaux-begles"));
        $bordeaux_begles_15->setPosition($this->getReference('arriere'));
        $bordeaux_begles_15->setPhoto("/img/Equipes/Bordeaux-begles/".$bordeaux_begles_15->getPrenom().'_'.$bordeaux_begles_15->getNom().'.jpg');


        $bordeaux_begles_22 = new Joueur();
        $bordeaux_begles_22->setNom("Ashley-Cooper");
        $bordeaux_begles_22->setPrenom("Adam");
        $bordeaux_begles_22->setNumero(22);
        $bordeaux_begles_22->setTitulaire(0);
        $bordeaux_begles_22->setEquipe($this->getReference("Bordeaux-begles"));
        $bordeaux_begles_22->setPosition($this->getReference('remplacant'));
        $bordeaux_begles_22->setPhoto("/img/Equipes/Bordeaux-begles/".$bordeaux_begles_22->getPrenom().'_'.$bordeaux_begles_22->getNom().'.jpg');

        $bordeaux_begles_21 = new Joueur();
        $bordeaux_begles_21->setNom("Madigan");
        $bordeaux_begles_21->setPrenom("Ian");
        $bordeaux_begles_21->setNumero(21);
        $bordeaux_begles_21->setTitulaire(0);
        $bordeaux_begles_21->setEquipe($this->getReference("Bordeaux-begles"));
        $bordeaux_begles_21->setPosition($this->getReference('remplacant'));
        $bordeaux_begles_21->setPhoto("/img/Equipes/Bordeaux-begles/".$bordeaux_begles_21->getPrenom().'_'.$bordeaux_begles_21->getNom().'.jpg');

        $bordeaux_begles_20 = new Joueur();
        $bordeaux_begles_20->setNom("Serin");
        $bordeaux_begles_20->setPrenom("Baptiste");
        $bordeaux_begles_20->setNumero(20);
        $bordeaux_begles_20->setTitulaire(0);
        $bordeaux_begles_20->setEquipe($this->getReference("Bordeaux-begles"));
        $bordeaux_begles_20->setPosition($this->getReference('remplacant'));
        $bordeaux_begles_20->setPhoto("/img/Equipes/Bordeaux-begles/".$bordeaux_begles_20->getPrenom().'_'.$bordeaux_begles_20->getNom().'.jpg');

        $bordeaux_begles_17 = new Joueur();
        $bordeaux_begles_17->setNom("Taofifenua");
        $bordeaux_begles_17->setPrenom("Sebastien");
        $bordeaux_begles_17->setNumero(17);
        $bordeaux_begles_17->setTitulaire(0);
        $bordeaux_begles_17->setEquipe($this->getReference("Bordeaux-begles"));
        $bordeaux_begles_17->setPosition($this->getReference('remplacant'));
        $bordeaux_begles_17->setPhoto("/img/Equipes/Bordeaux-begles/".$bordeaux_begles_17->getPrenom().'_'.$bordeaux_begles_17->getNom().'.jpg');

        $bordeaux_begles_23 = new Joueur();
        $bordeaux_begles_23->setNom("Clerc");
        $bordeaux_begles_23->setPrenom("Marc");
        $bordeaux_begles_23->setNumero(23);
        $bordeaux_begles_23->setTitulaire(0);
        $bordeaux_begles_23->setEquipe($this->getReference("Bordeaux-begles"));
        $bordeaux_begles_23->setPosition($this->getReference('remplacant'));
        $bordeaux_begles_23->setPhoto("/img/Equipes/Bordeaux-begles/".$bordeaux_begles_23->getPrenom().'_'.$bordeaux_begles_23->getNom().'.jpg');

        /*   -------------------- Brive --------------------  */


        /*   -------------------- Castres --------------------  */


        /*   -------------------- Clermont --------------------  */


        /*   -------------------- Grenoble --------------------  */


        /*   -------------------- LyonOU --------------------  */



        /*   -------------------- Montpellier --------------------  */



        /*   -------------------- Pau --------------------  */



        /*   -------------------- Racing 92 --------------------  */



        /*   -------------------- Stade Francais --------------------  */



        /*   -------------------- Stade Rochelais --------------------  */


        /*   -------------------- Toulon --------------------  */


        /*   -------------------- Toulouse --------------------  */

        $manager->persist($bayonne_1);
        $manager->persist($bayonne_2);
        $manager->persist($bayonne_3);
        $manager->persist($bayonne_4);
        $manager->persist($bayonne_5);
        $manager->persist($bayonne_6);
        $manager->persist($bayonne_7);
        $manager->persist($bayonne_8);
        $manager->persist($bayonne_9);
        $manager->persist($bayonne_10);
        $manager->persist($bayonne_11);
        $manager->persist($bayonne_12);
        $manager->persist($bayonne_13);
        $manager->persist($bayonne_14);
        $manager->persist($bayonne_15);
        $manager->persist($bayonne_19);
        $manager->persist($bayonne_17);
        $manager->persist($bayonne_21);
        $manager->persist($bayonne_20);
        $manager->persist($bayonne_22);

        $manager->persist($bordeaux_begles_1);
        $manager->persist($bordeaux_begles_2);
        $manager->persist($bordeaux_begles_3);
        $manager->persist($bordeaux_begles_4);
        $manager->persist($bordeaux_begles_5);
        $manager->persist($bordeaux_begles_6);
        $manager->persist($bordeaux_begles_7);
        $manager->persist($bordeaux_begles_8);
        $manager->persist($bordeaux_begles_9);
        $manager->persist($bordeaux_begles_10);
        $manager->persist($bordeaux_begles_11);
        $manager->persist($bordeaux_begles_12);
        $manager->persist($bordeaux_begles_13);
        $manager->persist($bordeaux_begles_14);
        $manager->persist($bordeaux_begles_15);
        $manager->persist($bordeaux_begles_17);
        $manager->persist($bordeaux_begles_21);
        $manager->persist($bordeaux_begles_20);
        $manager->persist($bordeaux_begles_22);
        $manager->persist($bordeaux_begles_23);

        $manager->flush();



    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 7;
    }

}