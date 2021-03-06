<?php
/**
 * Created by PhpStorm.
 * User: Vivien
 * Date: 04/01/2017
 * Time: 09:29
 */

// src/FrontOfficeBundle/DataFixtures/ORM/LoadMatchData.php
namespace FrontOfficeBundle\Bundle\DataFixtures\ORM;
use FrontOfficeBundle\Entity\Arbitre;
use FrontOfficeBundle\Entity\Diffuseur;
use FrontOfficeBundle\Entity\Matchs;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadMatchData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        if (($handle = fopen("web/csv/Matchs.csv", "r")) !== FALSE) {
            $diffuseurs = array();
            $arbitres = array();

            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                $match = new Matchs();

                $match->setEquipeDomicile($this->getReference($data[0]));
                $match->setEquipeExterieur($this->getReference($data[1]));
                $match->setJournee($this->getReference($data[2]));

                if(!empty($data[3])){
                    $logo = "web/img/Diffuseurs/".$data[3].".png";
                    
                    if(file_exists(utf8_decode($logo))){
                        $existeDeja = -1; $i = 0;
                        
                        foreach ($diffuseurs as $diffuseur){
                            if($diffuseur->getNom() == $data[3]){
                                $existeDeja = $i;
                            }
                            $i++;
                        }

                        if($existeDeja==(-1)){
                            $diffuseur = new Diffuseur();
                            $diffuseur->setNom($data[3]);
                            $diffuseur->setLogo(substr($logo,3));
                            $manager->persist($diffuseur);
                            $match->setDiffuseur($diffuseur);
                            $diffuseurs[] = $diffuseur;
                        }else{
                            $match->setDiffuseur($diffuseurs[$existeDeja]);
                        }
                    }

                }else{
                    $match->setDiffuseur(NULL);
                }

                if($data[4]!=NULL){
                    $match->setScoreDomicile($data[4]);
                    $match->setScoreExterieur($data[5]);
                }
                
                $match->setDate(new \DateTime($data[6]));
                
                if(!empty($data[7])){
                    $existeDeja = -1; $i = 0;
                    
                    foreach ($arbitres as $arbitre){
                        if($arbitre->getNomprenom() == $data[7]){
                            $existeDeja = $i;
                        }
                        $i++;
                    }
                    if($existeDeja==(-1)){
                        $arbitre = new Arbitre();
                        $arbitre->setNomprenom($data[7]);
                        $manager->persist($arbitre);
                        $match->setArbitre($arbitre);
                        $arbitres[] = $arbitre;
                    }else{
                        $match->setArbitre($arbitres[$existeDeja]);
                    }
                }else{
                    $match->setArbitre(NULL);
                }
                
                $match->setFormationDomicile($this->getReference("Equipe Type ".$data[0]));
                $match->setFormationExterieur($this->getReference("Equipe Type ".$data[1]));

                $manager->persist($match);
                unset($match);
            }
            fclose($handle);
        }else{
            echo "Echec à l'ouverture du fichier";
        }

        $manager->flush();
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 9;
    }

}