<?php
/**
 * Created by PhpStorm.
 * User: Vivien
 * Date: 04/01/2017
 * Time: 09:29
 */

// src/FrontOfficeBundle/DataFixtures/ORM/LoadMatchData.php
namespace FrontOfficeBundle\Bundle\DataFixtures\ORM;
use FrontOfficeBundle\Entity\Matchs;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadMatchData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // ------------------------ JOURNEE 1 -------------------------
        $match1_1 = new Matchs();
        $match1_1->setEquipeDomicile($this->getReference('LyonOU'));
        $match1_1->setEquipeExterieur($this->getReference('Brive'));
        $match1_1->setJournee($this->getReference('journee'));
        $match1_1->setScoreDomicile(15);
        $match1_1->setScoreExterieur(15);
        $match1_1->setDate(new \DateTime('2016/08/20 20:45'));
        $match1_1->setDiffuseur($this->getReference('diffuseur'));

        $match1_2 = new Matchs();
        $match1_2->setEquipeDomicile($this->getReference('Stade_Francais'));
        $match1_2->setEquipeExterieur($this->getReference('Grenoble'));
        $match1_2->setJournee($this->getReference('journee'));
        $match1_2->setScoreDomicile(54);
        $match1_2->setScoreExterieur(20);
        $match1_2->setDate(new \DateTime('2016/08/20 20:45'));
        $match1_2->setDiffuseur($this->getReference('diffuseur'));

        $match1_3 = new Matchs();
        $match1_3->setEquipeDomicile($this->getReference('Stade_Rochelais'));
        $match1_3->setEquipeExterieur($this->getReference('Clermont'));
        $match1_3->setJournee($this->getReference('journee'));
        $match1_3->setScoreDomicile(30);
        $match1_3->setScoreExterieur(30);
        $match1_3->setDate(new \DateTime('2016/08/20 20:45'));
        $match1_3->setDiffuseur($this->getReference('diffuseur'));

        $match1_4 = new Matchs();
        $match1_4->setEquipeDomicile($this->getReference('Castres'));
        $match1_4->setEquipeExterieur($this->getReference('Pau'));
        $match1_4->setJournee($this->getReference('journee'));
        $match1_4->setScoreDomicile(28);
        $match1_4->setScoreExterieur(11);
        $match1_4->setDate(new \DateTime('2016/08/20 20:45'));
        $match1_4->setDiffuseur($this->getReference('diffuseur'));

        $match1_5 = new Matchs();
        $match1_5->setEquipeDomicile($this->getReference('Bordeaux-begles'));
        $match1_5->setEquipeExterieur($this->getReference('Racing_92'));
        $match1_5->setJournee($this->getReference('journee'));
        $match1_5->setScoreDomicile(15);
        $match1_5->setScoreExterieur(9);
        $match1_5->setDate(new \DateTime('2016/08/20 20:45'));
        $match1_5->setDiffuseur($this->getReference('diffuseur'));

        $match1_6 = new Matchs();
        $match1_6->setEquipeDomicile($this->getReference('Toulouse'));
        $match1_6->setEquipeExterieur($this->getReference('Montpellier'));
        $match1_6->setJournee($this->getReference('journee'));
        $match1_6->setScoreDomicile(20);
        $match1_6->setScoreExterieur(12);
        $match1_6->setDate(new \DateTime('2016/08/20 20:45'));
        $match1_6->setDiffuseur($this->getReference('diffuseur'));

        $match1_7 = new Matchs();
        $match1_7->setEquipeDomicile($this->getReference('Bayonne'));
        $match1_7->setEquipeExterieur($this->getReference('Toulon'));
        $match1_7->setJournee($this->getReference('journee'));
        $match1_7->setScoreDomicile(28);
        $match1_7->setScoreExterieur(23);
        $match1_7->setDate(new \DateTime('2016/08/21 18:15'));
        $match1_7->setDiffuseur($this->getReference('diffuseur'));

        // ------------------------ JOURNEE 2 -------------------------
        $match2_1 = new Matchs();
        $match2_1->setEquipeDomicile($this->getReference('Pau'));
        $match2_1->setEquipeExterieur($this->getReference('Toulon'));
        $match2_1->setJournee($this->getReference('journee2'));
        $match2_1->setScoreDomicile(18);
        $match2_1->setScoreExterieur(22);
        $match2_1->setDate(new \DateTime('2016/08/27 14:45'));
        $match2_1->setDiffuseur($this->getReference('diffuseur'));

        $match2_2 = new Matchs();
        $match2_2->setEquipeDomicile($this->getReference('Bayonne'));
        $match2_2->setEquipeExterieur($this->getReference('Castres'));
        $match2_2->setJournee($this->getReference('journee2'));
        $match2_2->setScoreDomicile(12);
        $match2_2->setScoreExterieur(12);
        $match2_2->setDate(new \DateTime('2016/08/27 18:30'));
        $match2_2->setDiffuseur($this->getReference('diffuseur'));

        $match2_3 = new Matchs();
        $match2_3->setEquipeDomicile($this->getReference('Grenoble'));
        $match2_3->setEquipeExterieur($this->getReference('Stade_Rochelais'));
        $match2_3->setJournee($this->getReference('journee2'));
        $match2_3->setScoreDomicile(19);
        $match2_3->setScoreExterieur(22);
        $match2_3->setDate(new \DateTime('2016/08/27 18:30'));
        $match2_3->setDiffuseur($this->getReference('diffuseur'));

        $match2_4 = new Matchs();
        $match2_4->setEquipeDomicile($this->getReference('Brive'));
        $match2_4->setEquipeExterieur($this->getReference('Stade_Francais'));
        $match2_4->setJournee($this->getReference('journee2'));
        $match2_4->setScoreDomicile(28);
        $match2_4->setScoreExterieur(20);
        $match2_4->setDate(new \DateTime('2016/08/27 18:30'));
        $match2_4->setDiffuseur($this->getReference('diffuseur'));

        $match2_5 = new Matchs();
        $match2_5->setEquipeDomicile($this->getReference('Racing_92'));
        $match2_5->setEquipeExterieur($this->getReference('LyonOU'));
        $match2_5->setJournee($this->getReference('journee2'));
        $match2_5->setScoreDomicile(29);
        $match2_5->setScoreExterieur(16);
        $match2_5->setDate(new \DateTime('2016/08/27 18:30'));
        $match2_5->setDiffuseur($this->getReference('diffuseur'));

        $match2_6 = new Matchs();
        $match2_6->setEquipeDomicile($this->getReference('Toulouse'));
        $match2_6->setEquipeExterieur($this->getReference('Bordeaux-begles'));
        $match2_6->setJournee($this->getReference('journee2'));
        $match2_6->setScoreDomicile(22);
        $match2_6->setScoreExterieur(17);
        $match2_6->setDate(new \DateTime('2016/08/27 20:45'));
        $match2_6->setDiffuseur($this->getReference('diffuseur'));

        $match2_7 = new Matchs();
        $match2_7->setEquipeDomicile($this->getReference('Montpellier'));
        $match2_7->setEquipeExterieur($this->getReference('Clermont'));
        $match2_7->setJournee($this->getReference('journee2'));
        $match2_7->setScoreDomicile(22);
        $match2_7->setScoreExterieur(26);
        $match2_7->setDate(new \DateTime('2016/08/28 16:15'));
        $match2_7->setDiffuseur($this->getReference('diffuseur'));

        // ------------------------ JOURNEE 3 -------------------------
        $match3_1 = new Matchs();
        $match3_1->setEquipeDomicile($this->getReference('Stade_Francais'));
        $match3_1->setEquipeExterieur($this->getReference('Clermont'));
        $match3_1->setJournee($this->getReference('journee3'));
        $match3_1->setScoreDomicile(30);
        $match3_1->setScoreExterieur(30);
        $match3_1->setDate(new \DateTime('2016/09/03 14:45'));
        $match3_1->setDiffuseur($this->getReference('diffuseur'));

        $match3_2 = new Matchs();
        $match3_2->setEquipeDomicile($this->getReference('LyonOU'));
        $match3_2->setEquipeExterieur($this->getReference('Grenoble'));
        $match3_2->setJournee($this->getReference('journee3'));
        $match3_2->setScoreDomicile(32);
        $match3_2->setScoreExterieur(13);
        $match3_2->setDate(new \DateTime('2016/09/03 18:30'));
        $match3_2->setDiffuseur($this->getReference('diffuseur'));

        $match3_3 = new Matchs();
        $match3_3->setEquipeDomicile($this->getReference('Castres'));
        $match3_3->setEquipeExterieur($this->getReference('Stade_Rochelais'));
        $match3_3->setJournee($this->getReference('journee3'));
        $match3_3->setScoreDomicile(18);
        $match3_3->setScoreExterieur(26);
        $match3_3->setDate(new \DateTime('2016/09/03 18:30'));
        $match3_3->setDiffuseur($this->getReference('diffuseur'));

        $match3_4 = new Matchs();
        $match3_4->setEquipeDomicile($this->getReference('Pau'));
        $match3_4->setEquipeExterieur($this->getReference('Bayonne'));
        $match3_4->setJournee($this->getReference('journee3'));
        $match3_4->setScoreDomicile(25);
        $match3_4->setScoreExterieur(9);
        $match3_4->setDate(new \DateTime('2016/09/03 18:30'));
        $match3_4->setDiffuseur($this->getReference('diffuseur'));

        $match3_5 = new Matchs();
        $match3_5->setEquipeDomicile($this->getReference('Toulon'));
        $match3_5->setEquipeExterieur($this->getReference('Brive'));
        $match3_5->setJournee($this->getReference('journee3'));
        $match3_5->setScoreDomicile(21);
        $match3_5->setScoreExterieur(25);
        $match3_5->setDate(new \DateTime('2016/09/03 20:45'));
        $match3_5->setDiffuseur($this->getReference('diffuseur'));

        $match3_6 = new Matchs();
        $match3_6->setEquipeDomicile($this->getReference('Bordeaux-begles'));
        $match3_6->setEquipeExterieur($this->getReference('Montpellier'));
        $match3_6->setJournee($this->getReference('journee3'));
        $match3_6->setScoreDomicile(15);
        $match3_6->setScoreExterieur(32);
        $match3_6->setDate(new \DateTime('2016/09/04 16:15'));
        $match3_6->setDiffuseur($this->getReference('diffuseur'));

        $match3_7 = new Matchs();
        $match3_7->setEquipeDomicile($this->getReference('Racing_92'));
        $match3_7->setEquipeExterieur($this->getReference('Toulouse'));
        $match3_7->setJournee($this->getReference('journee3'));
        $match3_7->setScoreDomicile(28);
        $match3_7->setScoreExterieur(14);
        $match3_7->setDate(new \DateTime('2016/09/04 21:00'));
        $match3_7->setDiffuseur($this->getReference('diffuseur'));
        // ------------------------ JOURNEE 4 -------------------------
        $match4_1 = new Matchs();
        $match4_1->setEquipeDomicile($this->getReference('Stade_Francais'));
        $match4_1->setEquipeExterieur($this->getReference('Castres'));
        $match4_1->setJournee($this->getReference('journee4'));
        $match4_1->setScoreDomicile(29);
        $match4_1->setScoreExterieur(25);
        $match4_1->setDate(new \DateTime('2016/09/10 14:45'));
        $match4_1->setDiffuseur($this->getReference('diffuseur'));

        $match4_2 = new Matchs();
        $match4_2->setEquipeDomicile($this->getReference('Montpellier'));
        $match4_2->setEquipeExterieur($this->getReference('Pau'));
        $match4_2->setJournee($this->getReference('journee4'));
        $match4_2->setScoreDomicile(41);
        $match4_2->setScoreExterieur(13);
        $match4_2->setDate(new \DateTime('2016/09/10 18:30'));
        $match4_2->setDiffuseur($this->getReference('diffuseur'));

        $match4_3 = new Matchs();
        $match4_3->setEquipeDomicile($this->getReference('Bordeaux-begles'));
        $match4_3->setEquipeExterieur($this->getReference('Bayonne'));
        $match4_3->setJournee($this->getReference('journee4'));
        $match4_3->setScoreDomicile(40);
        $match4_3->setScoreExterieur(20);
        $match4_3->setDate(new \DateTime('2016/09/10 18:30'));
        $match4_3->setDiffuseur($this->getReference('diffuseur'));

        $match4_4 = new Matchs();
        $match4_4->setEquipeDomicile($this->getReference('Stade_Rochelais'));
        $match4_4->setEquipeExterieur($this->getReference('LyonOU'));
        $match4_4->setJournee($this->getReference('journee4'));
        $match4_4->setScoreDomicile(43);
        $match4_4->setScoreExterieur(18);
        $match4_4->setDate(new \DateTime('2016/09/10 18:30'));
        $match4_4->setDiffuseur($this->getReference('diffuseur'));

        $match4_5 = new Matchs();
        $match4_5->setEquipeDomicile($this->getReference('Clermont'));
        $match4_5->setEquipeExterieur($this->getReference('Racing_92'));
        $match4_5->setJournee($this->getReference('journee4'));
        $match4_5->setScoreDomicile(47);
        $match4_5->setScoreExterieur(10);
        $match4_5->setDate(new \DateTime('2016/09/10 20:45'));
        $match4_5->setDiffuseur($this->getReference('diffuseur'));

        $match4_6 = new Matchs();
        $match4_6->setEquipeDomicile($this->getReference('Grenoble'));
        $match4_6->setEquipeExterieur($this->getReference('Brive'));
        $match4_6->setJournee($this->getReference('journee4'));
        $match4_6->setScoreDomicile(36);
        $match4_6->setScoreExterieur(23);
        $match4_6->setDate(new \DateTime('2016/09/11 12:30'));
        $match4_6->setDiffuseur($this->getReference('diffuseur'));

        $match4_7 = new Matchs();
        $match4_7->setEquipeDomicile($this->getReference('Toulouse'));
        $match4_7->setEquipeExterieur($this->getReference('Toulon'));
        $match4_7->setJournee($this->getReference('journee4'));
        $match4_7->setScoreDomicile(15);
        $match4_7->setScoreExterieur(32);
        $match4_7->setDate(new \DateTime('2016/09/11 16:15'));
        $match4_7->setDiffuseur($this->getReference('diffuseur'));

        // ------------------------ JOURNEE 5 -------------------------
        $match5_1 = new Matchs();
        $match5_1->setEquipeDomicile($this->getReference('LyonOU'));
        $match5_1->setEquipeExterieur($this->getReference('Toulouse'));
        $match5_1->setJournee($this->getReference('journee5'));
        $match5_1->setScoreDomicile(25);
        $match5_1->setScoreExterieur(20);
        $match5_1->setDate(new \DateTime('2016/09/17 14:45'));
        $match5_1->setDiffuseur($this->getReference('diffuseur'));

        $match5_2 = new Matchs();
        $match5_2->setEquipeDomicile($this->getReference('Brive'));
        $match5_2->setEquipeExterieur($this->getReference('Stade_Rochelais'));
        $match5_2->setJournee($this->getReference('journee5'));
        $match5_2->setScoreDomicile(29);
        $match5_2->setScoreExterieur(28);
        $match5_2->setDate(new \DateTime('2016/09/17 18:30'));
        $match5_2->setDiffuseur($this->getReference('diffuseur'));

        $match5_3 = new Matchs();
        $match5_3->setEquipeDomicile($this->getReference('Pau'));
        $match5_3->setEquipeExterieur($this->getReference('Stade_Francais'));
        $match5_3->setJournee($this->getReference('journee5'));
        $match5_3->setScoreDomicile(23);
        $match5_3->setScoreExterieur(6);
        $match5_3->setDate(new \DateTime('2016/09/17 18:30'));
        $match5_3->setDiffuseur($this->getReference('diffuseur'));

        $match5_4 = new Matchs();
        $match5_4->setEquipeDomicile($this->getReference('Bayonne'));
        $match5_4->setEquipeExterieur($this->getReference('Montpellier'));
        $match5_4->setJournee($this->getReference('journee5'));
        $match5_4->setScoreDomicile(9);
        $match5_4->setScoreExterieur(21);
        $match5_4->setDate(new \DateTime('2016/09/17 18:30'));
        $match5_4->setDiffuseur($this->getReference('diffuseur'));

        $match5_5 = new Matchs();
        $match5_5->setEquipeDomicile($this->getReference('Clermont'));
        $match5_5->setEquipeExterieur($this->getReference('Bordeaux-begles'));
        $match5_5->setJournee($this->getReference('journee5'));
        $match5_5->setScoreDomicile(40);
        $match5_5->setScoreExterieur(16);
        $match5_5->setDate(new \DateTime('2016/09/17 20:45'));
        $match5_5->setDiffuseur($this->getReference('diffuseur'));

        $match5_6 = new Matchs();
        $match5_6->setEquipeDomicile($this->getReference('Castres'));
        $match5_6->setEquipeExterieur($this->getReference('Grenoble'));
        $match5_6->setJournee($this->getReference('journee5'));
        $match5_6->setScoreDomicile(46);
        $match5_6->setScoreExterieur(9);
        $match5_6->setDate(new \DateTime('2016/09/18 12:30'));
        $match5_6->setDiffuseur($this->getReference('diffuseur'));

        $match5_7 = new Matchs();
        $match5_7->setEquipeDomicile($this->getReference('Racing_92'));
        $match5_7->setEquipeExterieur($this->getReference('Toulon'));
        $match5_7->setJournee($this->getReference('journee5'));
        $match5_7->setScoreDomicile(41);
        $match5_7->setScoreExterieur(30);
        $match5_7->setDate(new \DateTime('2016/09/18 16:15'));
        $match5_7->setDiffuseur($this->getReference('diffuseur'));

        // ------------------------ JOURNEE 6 -------------------------
        $match6_1 = new Matchs();
        $match6_1->setEquipeDomicile($this->getReference('Castres'));
        $match6_1->setEquipeExterieur($this->getReference('Racing_92'));
        $match6_1->setJournee($this->getReference('journee6'));
        $match6_1->setScoreDomicile(31);
        $match6_1->setScoreExterieur(23);
        $match6_1->setDate(new \DateTime('2016/09/24 14:45'));
        $match6_1->setDiffuseur($this->getReference('diffuseur'));

        $match6_2 = new Matchs();
        $match6_2->setEquipeDomicile($this->getReference('Grenoble'));
        $match6_2->setEquipeExterieur($this->getReference('Pau'));
        $match6_2->setJournee($this->getReference('journee6'));
        $match6_2->setScoreDomicile(38);
        $match6_2->setScoreExterieur(39);
        $match6_2->setDate(new \DateTime('2016/09/24 18:30'));
        $match6_2->setDiffuseur($this->getReference('diffuseur'));

        $match6_3 = new Matchs();
        $match6_3->setEquipeDomicile($this->getReference('Stade_Rochelais'));
        $match6_3->setEquipeExterieur($this->getReference('Bayonne'));
        $match6_3->setJournee($this->getReference('journee6'));
        $match6_3->setScoreDomicile(34);
        $match6_3->setScoreExterieur(17);
        $match6_3->setDate(new \DateTime('2016/09/24 18:30'));
        $match6_3->setDiffuseur($this->getReference('diffuseur'));

        $match6_4 = new Matchs();
        $match6_4->setEquipeDomicile($this->getReference('Bordeaux-begles'));
        $match6_4->setEquipeExterieur($this->getReference('LyonOU'));
        $match6_4->setJournee($this->getReference('journee6'));
        $match6_4->setScoreDomicile(32);
        $match6_4->setScoreExterieur(10);
        $match6_4->setDate(new \DateTime('2016/09/24 18:30'));
        $match6_4->setDiffuseur($this->getReference('diffuseur'));

        $match6_5 = new Matchs();
        $match6_5->setEquipeDomicile($this->getReference('Toulouse'));
        $match6_5->setEquipeExterieur($this->getReference('Stade_Francais'));
        $match6_5->setJournee($this->getReference('journee6'));
        $match6_5->setScoreDomicile(23);
        $match6_5->setScoreExterieur(18);
        $match6_5->setDate(new \DateTime('2016/09/24 20:45'));
        $match6_5->setDiffuseur($this->getReference('diffuseur'));

        $match6_6 = new Matchs();
        $match6_6->setEquipeDomicile($this->getReference('Montpellier'));
        $match6_6->setEquipeExterieur($this->getReference('Brive'));
        $match6_6->setJournee($this->getReference('journee6'));
        $match6_6->setScoreDomicile(42);
        $match6_6->setScoreExterieur(13);
        $match6_6->setDate(new \DateTime('2016/09/25 12:30'));
        $match6_6->setDiffuseur($this->getReference('diffuseur'));

        $match6_7 = new Matchs();
        $match6_7->setEquipeDomicile($this->getReference('Toulon'));
        $match6_7->setEquipeExterieur($this->getReference('Clermont'));
        $match6_7->setJournee($this->getReference('journee6'));
        $match6_7->setScoreDomicile(23);
        $match6_7->setScoreExterieur(21);
        $match6_7->setDate(new \DateTime('2016/09/25 16:15'));
        $match6_7->setDiffuseur($this->getReference('diffuseur'));
        // ------------------------ JOURNEE 7 -------------------------
        $match7_1 = new Matchs();
        $match7_1->setEquipeDomicile($this->getReference('Clermont'));
        $match7_1->setEquipeExterieur($this->getReference('Castres'));
        $match7_1->setJournee($this->getReference('journee7'));
        $match7_1->setScoreDomicile(29);
        $match7_1->setScoreExterieur(19);
        $match7_1->setDate(new \DateTime('2016/10/01 14:45'));
        $match7_1->setDiffuseur($this->getReference('diffuseur'));

        $match7_2 = new Matchs();
        $match7_2->setEquipeDomicile($this->getReference('Toulouse'));
        $match7_2->setEquipeExterieur($this->getReference('Grenoble'));
        $match7_2->setJournee($this->getReference('journee7'));
        $match7_2->setScoreDomicile(31);
        $match7_2->setScoreExterieur(3);
        $match7_2->setDate(new \DateTime('2016/10/01 18:30'));
        $match7_2->setDiffuseur($this->getReference('diffuseur'));

        $match7_3 = new Matchs();
        $match7_3->setEquipeDomicile($this->getReference('Bayonne'));
        $match7_3->setEquipeExterieur($this->getReference('LyonOU'));
        $match7_3->setJournee($this->getReference('journee7'));
        $match7_3->setScoreDomicile(22);
        $match7_3->setScoreExterieur(22);
        $match7_3->setDate(new \DateTime('2016/10/01 18:30'));
        $match7_3->setDiffuseur($this->getReference('diffuseur'));

        $match7_4 = new Matchs();
        $match7_4->setEquipeDomicile($this->getReference('Pau'));
        $match7_4->setEquipeExterieur($this->getReference('Bordeaux-begles'));
        $match7_4->setJournee($this->getReference('journee7'));
        $match7_4->setScoreDomicile(28);
        $match7_4->setScoreExterieur(30);
        $match7_4->setDate(new \DateTime('2016/10/01 18:30'));
        $match7_4->setDiffuseur($this->getReference('diffuseur'));

        $match7_5 = new Matchs();
        $match7_5->setEquipeDomicile($this->getReference('Brive'));
        $match7_5->setEquipeExterieur($this->getReference('Racing_92'));
        $match7_5->setJournee($this->getReference('journee7'));
        $match7_5->setScoreDomicile(25);
        $match7_5->setScoreExterieur(16);
        $match7_5->setDate(new \DateTime('2016/10/01 20:45'));
        $match7_5->setDiffuseur($this->getReference('diffuseur'));

        $match7_6 = new Matchs();
        $match7_6->setEquipeDomicile($this->getReference('Stade_Francais'));
        $match7_6->setEquipeExterieur($this->getReference('Stade_Rochelais'));
        $match7_6->setJournee($this->getReference('journee7'));
        $match7_6->setScoreDomicile(31);
        $match7_6->setScoreExterieur(26);
        $match7_6->setDate(new \DateTime('2016/10/02 12:30'));
        $match7_6->setDiffuseur($this->getReference('diffuseur'));

        $match7_7 = new Matchs();
        $match7_7->setEquipeDomicile($this->getReference('Toulon'));
        $match7_7->setEquipeExterieur($this->getReference('Montpellier'));
        $match7_7->setJournee($this->getReference('journee7'));
        $match7_7->setScoreDomicile(28);
        $match7_7->setScoreExterieur(6);
        $match7_7->setDate(new \DateTime('2016/10/02 16:15'));
        $match7_7->setDiffuseur($this->getReference('diffuseur'));

        // ------------------------ JOURNEE 8 -------------------------
        $match8_1 = new Matchs();
        $match8_1->setEquipeDomicile($this->getReference('Racing_92'));
        $match8_1->setEquipeExterieur($this->getReference('Stade_Francais'));
        $match8_1->setJournee($this->getReference('journee8'));
        $match8_1->setScoreDomicile(29);
        $match8_1->setScoreExterieur(22);
        $match8_1->setDate(new \DateTime('2016/10/08 14:45'));
        $match8_1->setDiffuseur($this->getReference('diffuseur'));

        $match8_2 = new Matchs();
        $match8_2->setEquipeDomicile($this->getReference('Bordeaux-begles'));
        $match8_2->setEquipeExterieur($this->getReference('Brive'));
        $match8_2->setJournee($this->getReference('journee8'));
        $match8_2->setScoreDomicile(27);
        $match8_2->setScoreExterieur(25);
        $match8_2->setDate(new \DateTime('2016/10/08 18:30'));
        $match8_2->setDiffuseur($this->getReference('diffuseur'));

        $match8_3 = new Matchs();
        $match8_3->setEquipeDomicile($this->getReference('Montpellier'));
        $match8_3->setEquipeExterieur($this->getReference('Castres'));
        $match8_3->setJournee($this->getReference('journee8'));
        $match8_3->setScoreDomicile(28);
        $match8_3->setScoreExterieur(19);
        $match8_3->setDate(new \DateTime('2016/10/08 18:30'));
        $match8_3->setDiffuseur($this->getReference('diffuseur'));

        $match8_4 = new Matchs();
        $match8_4->setEquipeDomicile($this->getReference('Grenoble'));
        $match8_4->setEquipeExterieur($this->getReference('Bayonne'));
        $match8_4->setJournee($this->getReference('journee8'));
        $match8_4->setScoreDomicile(44);
        $match8_4->setScoreExterieur(16);
        $match8_4->setDate(new \DateTime('2016/10/08 18:30'));
        $match8_4->setDiffuseur($this->getReference('diffuseur'));

        $match8_5 = new Matchs();
        $match8_5->setEquipeDomicile($this->getReference('Stade_Rochelais'));
        $match8_5->setEquipeExterieur($this->getReference('Toulon'));
        $match8_5->setJournee($this->getReference('journee8'));
        $match8_5->setScoreDomicile(17);
        $match8_5->setScoreExterieur(17);
        $match8_5->setDate(new \DateTime('2016/10/08 20:45'));
        $match8_5->setDiffuseur($this->getReference('diffuseur'));

        $match8_6 = new Matchs();
        $match8_6->setEquipeDomicile($this->getReference('LyonOU'));
        $match8_6->setEquipeExterieur($this->getReference('Pau'));
        $match8_6->setJournee($this->getReference('journee8'));
        $match8_6->setScoreDomicile(27);
        $match8_6->setScoreExterieur(22);
        $match8_6->setDate(new \DateTime('2016/10/09 12:30'));
        $match8_6->setDiffuseur($this->getReference('diffuseur'));

        $match8_7 = new Matchs();
        $match8_7->setEquipeDomicile($this->getReference('Clermont'));
        $match8_7->setEquipeExterieur($this->getReference('Toulouse'));
        $match8_7->setJournee($this->getReference('journee8'));
        $match8_7->setScoreDomicile(29);
        $match8_7->setScoreExterieur(25);
        $match8_7->setDate(new \DateTime('2016/10/09 16:15'));
        $match8_7->setDiffuseur($this->getReference('diffuseur'));
        // ------------------------ JOURNEE 9 -------------------------
        $match9_1 = new Matchs();
        $match9_1->setEquipeDomicile($this->getReference('Pau'));
        $match9_1->setEquipeExterieur($this->getReference('Toulouse'));
        $match9_1->setJournee($this->getReference('journee9'));
        $match9_1->setScoreDomicile(20);
        $match9_1->setScoreExterieur(24);
        $match9_1->setDate(new \DateTime('2016/10/29 14:45'));
        $match9_1->setDiffuseur($this->getReference('diffuseur'));

        $match9_2 = new Matchs();
        $match9_2->setEquipeDomicile($this->getReference('Toulon'));
        $match9_2->setEquipeExterieur($this->getReference('Grenoble'));
        $match9_2->setJournee($this->getReference('journee9'));
        $match9_2->setScoreDomicile(42);
        $match9_2->setScoreExterieur(12);
        $match9_2->setDate(new \DateTime('2016/10/29 18:30'));
        $match9_2->setDiffuseur($this->getReference('diffuseur'));

        $match9_3 = new Matchs();
        $match9_3->setEquipeDomicile($this->getReference('Montpellier'));
        $match9_3->setEquipeExterieur($this->getReference('Stade_Rochelais'));
        $match9_3->setJournee($this->getReference('journee9'));
        $match9_3->setScoreDomicile(12);
        $match9_3->setScoreExterieur(11);
        $match9_3->setDate(new \DateTime('2016/10/29 18:30'));
        $match9_3->setDiffuseur($this->getReference('diffuseur'));

        $match9_4 = new Matchs();
        $match9_4->setEquipeDomicile($this->getReference('Stade_Francais'));
        $match9_4->setEquipeExterieur($this->getReference('LyonOU'));
        $match9_4->setJournee($this->getReference('journee9'));
        $match9_4->setScoreDomicile(25);
        $match9_4->setScoreExterieur(19);
        $match9_4->setDate(new \DateTime('2016/10/29 18:30'));
        $match9_4->setDiffuseur($this->getReference('diffuseur'));

        $match9_5 = new Matchs();
        $match9_5->setEquipeDomicile($this->getReference('Bayonne'));
        $match9_5->setEquipeExterieur($this->getReference('Racing_92'));
        $match9_5->setJournee($this->getReference('journee9'));
        $match9_5->setScoreDomicile(3);
        $match9_5->setScoreExterieur(16);
        $match9_5->setDate(new \DateTime('2016/10/29 20:45'));
        $match9_5->setDiffuseur($this->getReference('diffuseur'));

        $match9_6 = new Matchs();
        $match9_6->setEquipeDomicile($this->getReference('Castres'));
        $match9_6->setEquipeExterieur($this->getReference('Bordeaux-begles'));
        $match9_6->setJournee($this->getReference('journee9'));
        $match9_6->setScoreDomicile(33);
        $match9_6->setScoreExterieur(27);
        $match9_6->setDate(new \DateTime('2016/10/30 12:30'));
        $match9_6->setDiffuseur($this->getReference('diffuseur'));

        $match9_7 = new Matchs();
        $match9_7->setEquipeDomicile($this->getReference('Brive'));
        $match9_7->setEquipeExterieur($this->getReference('Clermont'));
        $match9_7->setJournee($this->getReference('journee9'));
        $match9_7->setScoreDomicile(16);
        $match9_7->setScoreExterieur(40);
        $match9_7->setDate(new \DateTime('2016/10/30 16:15'));
        $match9_7->setDiffuseur($this->getReference('diffuseur'));
        // ------------------------ JOURNEE 10 -------------------------

        // ------------------------ JOURNEE 11 -------------------------
        $match11_1 = new Matchs();
        $match11_1->setEquipeDomicile($this->getReference('Pau'));
        $match11_1->setEquipeExterieur($this->getReference('Racing_92'));
        $match11_1->setJournee($this->getReference('journee11'));
        $match11_1->setScoreDomicile(26);
        $match11_1->setScoreExterieur(17);
        $match11_1->setDate(new \DateTime('2016/11/12 14:45'));
        $match11_1->setDiffuseur($this->getReference('diffuseur'));

        $match11_2 = new Matchs();
        $match11_2->setEquipeDomicile($this->getReference('Castres'));
        $match11_2->setEquipeExterieur($this->getReference('Brive'));
        $match11_2->setJournee($this->getReference('journee11'));
        $match11_2->setScoreDomicile(32);
        $match11_2->setScoreExterieur(13);
        $match11_2->setDate(new \DateTime('2016/11/12 20:15'));
        $match11_2->setDiffuseur($this->getReference('diffuseur'));

        $match11_3 = new Matchs();
        $match11_3->setEquipeDomicile($this->getReference('Montpellier'));
        $match11_3->setEquipeExterieur($this->getReference('LyonOU'));
        $match11_3->setJournee($this->getReference('journee11'));
        $match11_3->setScoreDomicile(25);
        $match11_3->setScoreExterieur(20);
        $match11_3->setDate(new \DateTime('2016/11/12 20:15'));
        $match11_3->setDiffuseur($this->getReference('diffuseur'));

        $match11_4 = new Matchs();
        $match11_4->setEquipeDomicile($this->getReference('Grenoble'));
        $match11_4->setEquipeExterieur($this->getReference('Bordeaux-begles'));
        $match11_4->setJournee($this->getReference('journee11'));
        $match11_4->setScoreDomicile(22);
        $match11_4->setScoreExterieur(24);
        $match11_4->setDate(new \DateTime('2016/11/12 20:15'));
        $match11_4->setDiffuseur($this->getReference('diffuseur'));

        $match11_5 = new Matchs();
        $match11_5->setEquipeDomicile($this->getReference('Bayonne'));
        $match11_5->setEquipeExterieur($this->getReference('Clermont'));
        $match11_5->setJournee($this->getReference('journee11'));
        $match11_5->setScoreDomicile(22);
        $match11_5->setScoreExterieur(14);
        $match11_5->setDate(new \DateTime('2016/11/12 20:45'));
        $match11_5->setDiffuseur($this->getReference('diffuseur'));

        $match11_6 = new Matchs();
        $match11_6->setEquipeDomicile($this->getReference('Stade_Rochelais'));
        $match11_6->setEquipeExterieur($this->getReference('Toulouse'));
        $match11_6->setJournee($this->getReference('journee11'));
        $match11_6->setScoreDomicile(25);
        $match11_6->setScoreExterieur(19);
        $match11_6->setDate(new \DateTime('2016/11/13 14:50'));
        $match11_6->setDiffuseur($this->getReference('diffuseur'));

        $match11_7 = new Matchs();
        $match11_7->setEquipeDomicile($this->getReference('Toulon'));
        $match11_7->setEquipeExterieur($this->getReference('Stade_Francais'));
        $match11_7->setJournee($this->getReference('journee11'));
        $match11_7->setScoreDomicile(31);
        $match11_7->setScoreExterieur(12);
        $match11_7->setDate(new \DateTime('2016/11/13 21:00'));
        $match11_7->setDiffuseur($this->getReference('diffuseur'));
        // ------------------------ JOURNEE 12 -------------------------
        $match12_1 = new Matchs();
        $match12_1->setEquipeDomicile($this->getReference('Castres'));
        $match12_1->setEquipeExterieur($this->getReference('Toulon'));
        $match12_1->setJournee($this->getReference('journee12'));
        $match12_1->setScoreDomicile(34);
        $match12_1->setScoreExterieur(17);
        $match12_1->setDate(new \DateTime('2016/11/19 14:45'));
        $match12_1->setDiffuseur($this->getReference('diffuseur'));

        $match12_2 = new Matchs();
        $match12_2->setEquipeDomicile($this->getReference('Racing_92'));
        $match12_2->setEquipeExterieur($this->getReference('Grenoble'));
        $match12_2->setJournee($this->getReference('journee12'));
        $match12_2->setScoreDomicile(29);
        $match12_2->setScoreExterieur(24);
        $match12_2->setDate(new \DateTime('2016/11/19 17:00'));
        $match12_2->setDiffuseur($this->getReference('diffuseur'));

        $match12_3 = new Matchs();
        $match12_3->setEquipeDomicile($this->getReference('Bordeaux-begles'));
        $match12_3->setEquipeExterieur($this->getReference('Stade_Rochelais'));
        $match12_3->setJournee($this->getReference('journee12'));
        $match12_3->setScoreDomicile(26);
        $match12_3->setScoreExterieur(0);
        $match12_3->setDate(new \DateTime('2016/11/19 17:00'));
        $match12_3->setDiffuseur($this->getReference('diffuseur'));

        $match12_4 = new Matchs();
        $match12_4->setEquipeDomicile($this->getReference('Brive'));
        $match12_4->setEquipeExterieur($this->getReference('Pau'));
        $match12_4->setJournee($this->getReference('journee12'));
        $match12_4->setScoreDomicile(38);
        $match12_4->setScoreExterieur(25);
        $match12_4->setDate(new \DateTime('2016/11/19 17:00'));
        $match12_4->setDiffuseur($this->getReference('diffuseur'));

        $match12_5 = new Matchs();
        $match12_5->setEquipeDomicile($this->getReference('Clermont'));
        $match12_5->setEquipeExterieur($this->getReference('LyonOU'));
        $match12_5->setJournee($this->getReference('journee12'));
        $match12_5->setScoreDomicile(16);
        $match12_5->setScoreExterieur(13);
        $match12_5->setDate(new \DateTime('2016/11/19 17:00'));
        $match12_5->setDiffuseur($this->getReference('diffuseur'));

        $match12_6 = new Matchs();
        $match12_6->setEquipeDomicile($this->getReference('Stade_Francais'));
        $match12_6->setEquipeExterieur($this->getReference('Montpellier'));
        $match12_6->setJournee($this->getReference('journee12'));
        $match12_6->setScoreDomicile(21);
        $match12_6->setScoreExterieur(17);
        $match12_6->setDate(new \DateTime('2016/11/20 12:30'));
        $match12_6->setDiffuseur($this->getReference('diffuseur'));

        $match12_7 = new Matchs();
        $match12_7->setEquipeDomicile($this->getReference('Bayonne'));
        $match12_7->setEquipeExterieur($this->getReference('Toulouse'));
        $match12_7->setJournee($this->getReference('journee12'));
        $match12_7->setScoreDomicile(16);
        $match12_7->setScoreExterieur(13);
        $match12_7->setDate(new \DateTime('2016/11/20 16:15'));
        $match12_7->setDiffuseur($this->getReference('diffuseur'));
        // ------------------------ JOURNEE 13 -------------------------

        // ------------------------ JOURNEE 14 -------------------------

        // ------------------------ JOURNEE 15 -------------------------
        $match15_1 = new Matchs();
        $match15_1->setEquipeDomicile($this->getReference('LyonOU'));
        $match15_1->setEquipeExterieur($this->getReference('Bordeaux-begles'));
        $match15_1->setJournee($this->getReference('journee15'));
        $match15_1->setScoreDomicile(19);
        $match15_1->setScoreExterieur(16);
        $match15_1->setDate(new \DateTime('2016/12/30 20:45'));
        $match15_1->setDiffuseur($this->getReference('diffuseur'));

        $match15_2 = new Matchs();
        $match15_2->setEquipeDomicile($this->getReference('Pau'));
        $match15_2->setEquipeExterieur($this->getReference('Montpellier'));
        $match15_2->setJournee($this->getReference('journee15'));
        $match15_2->setScoreDomicile(32);
        $match15_2->setScoreExterieur(27);
        $match15_2->setDate(new \DateTime('2016/12/31 13:00'));
        $match15_2->setDiffuseur($this->getReference('diffuseur'));

        $match15_3 = new Matchs();
        $match15_3->setEquipeDomicile($this->getReference('Stade_Francais'));
        $match15_3->setEquipeExterieur($this->getReference('Brive'));
        $match15_3->setJournee($this->getReference('journee15'));
        $match15_3->setScoreDomicile(12);
        $match15_3->setScoreExterieur(10);
        $match15_3->setDate(new \DateTime('2016/12/31 15:00'));
        $match15_3->setDiffuseur($this->getReference('diffuseur'));

        $match15_4 = new Matchs();
        $match15_4->setEquipeDomicile($this->getReference('Castres'));
        $match15_4->setEquipeExterieur($this->getReference('Bayonne'));
        $match15_4->setJournee($this->getReference('journee15'));
        $match15_4->setScoreDomicile(47);
        $match15_4->setScoreExterieur(18);
        $match15_4->setDate(new \DateTime('2016/12/31 15:00'));
        $match15_4->setDiffuseur($this->getReference('diffuseur'));

        $match15_5 = new Matchs();
        $match15_5->setEquipeDomicile($this->getReference('Toulouse'));
        $match15_5->setEquipeExterieur($this->getReference('Clermont'));
        $match15_5->setJournee($this->getReference('journee15'));
        $match15_5->setScoreDomicile(26);
        $match15_5->setScoreExterieur(20);
        $match15_5->setDate(new \DateTime('2016/12/31 17:00'));
        $match15_5->setDiffuseur($this->getReference('diffuseur'));

        $match15_6 = new Matchs();
        $match15_6->setEquipeDomicile($this->getReference('Stade_Rochelais'));
        $match15_6->setEquipeExterieur($this->getReference('Grenoble'));
        $match15_6->setJournee($this->getReference('journee15'));
        $match15_6->setScoreDomicile(40);
        $match15_6->setScoreExterieur(3);
        $match15_6->setDate(new \DateTime('2017/01/01 16:15'));
        $match15_6->setDiffuseur($this->getReference('diffuseur'));

        $match15_7 = new Matchs();
        $match15_7->setEquipeDomicile($this->getReference('Toulon'));
        $match15_7->setEquipeExterieur($this->getReference('Racing_92'));
        $match15_7->setJournee($this->getReference('journee15'));
        $match15_7->setScoreDomicile(17);
        $match15_7->setScoreExterieur(11);
        $match15_7->setDate(new \DateTime('2017/01/01 20:45'));
        $match15_7->setDiffuseur($this->getReference('diffuseur'));


        $manager->persist($match1_1);
        $manager->persist($match1_2);
        $manager->persist($match1_3);
        $manager->persist($match1_4);
        $manager->persist($match1_5);
        $manager->persist($match1_6);
        $manager->persist($match1_7);

        $manager->persist($match2_1);
        $manager->persist($match2_2);
        $manager->persist($match2_3);
        $manager->persist($match2_4);
        $manager->persist($match2_5);
        $manager->persist($match2_6);
        $manager->persist($match2_7);

        $manager->persist($match3_1);
        $manager->persist($match3_2);
        $manager->persist($match3_3);
        $manager->persist($match3_4);
        $manager->persist($match3_5);
        $manager->persist($match3_6);
        $manager->persist($match3_7);

        $manager->persist($match4_1);
        $manager->persist($match4_2);
        $manager->persist($match4_3);
        $manager->persist($match4_4);
        $manager->persist($match4_5);
        $manager->persist($match4_6);
        $manager->persist($match4_7);

        $manager->persist($match5_1);
        $manager->persist($match5_2);
        $manager->persist($match5_3);
        $manager->persist($match5_4);
        $manager->persist($match5_5);
        $manager->persist($match5_6);
        $manager->persist($match5_7);

        $manager->persist($match6_1);
        $manager->persist($match6_2);
        $manager->persist($match6_3);
        $manager->persist($match6_4);
        $manager->persist($match6_5);
        $manager->persist($match6_6);
        $manager->persist($match6_7);

        $manager->persist($match7_1);
        $manager->persist($match7_2);
        $manager->persist($match7_3);
        $manager->persist($match7_4);
        $manager->persist($match7_5);
        $manager->persist($match7_6);
        $manager->persist($match7_7);

        $manager->persist($match8_1);
        $manager->persist($match8_2);
        $manager->persist($match8_3);
        $manager->persist($match8_4);
        $manager->persist($match8_5);
        $manager->persist($match8_6);
        $manager->persist($match8_7);

        $manager->persist($match9_1);
        $manager->persist($match9_2);
        $manager->persist($match9_3);
        $manager->persist($match9_4);
        $manager->persist($match9_5);
        $manager->persist($match9_6);
        $manager->persist($match9_7);

        $manager->persist($match11_1);
        $manager->persist($match11_2);
        $manager->persist($match11_3);
        $manager->persist($match11_4);
        $manager->persist($match11_5);
        $manager->persist($match11_6);
        $manager->persist($match11_7);

        $manager->persist($match12_1);
        $manager->persist($match12_2);
        $manager->persist($match12_3);
        $manager->persist($match12_4);
        $manager->persist($match12_5);
        $manager->persist($match12_6);
        $manager->persist($match12_7);

        $manager->persist($match15_1);
        $manager->persist($match15_2);
        $manager->persist($match15_3);
        $manager->persist($match15_4);
        $manager->persist($match15_5);
        $manager->persist($match15_6);
        $manager->persist($match15_7);

        $manager->flush();
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 5;
    }

}