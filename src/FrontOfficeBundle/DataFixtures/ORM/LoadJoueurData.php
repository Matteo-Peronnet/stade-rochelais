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
        if (($handle = fopen("web/csv/Joueurs.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                $joueurL = new Joueur();
                $joueurL->setNomprenom($data[1]);
                $joueurL->setAge($data[3]);
                $joueurL->setDatenaissance($data[4]);
                $joueurL->setPoids($data[6]);
                $joueurL->setTaille($data[5]);
                $joueurL->setEquipe($this->getReference($data[0]));
                
                $photo = "web/img/Joueurs/".$data[0]."/".$data[1].".jpg";

                if(file_exists(utf8_decode($photo))){
                    $joueurL->setPhoto($photo);
                }else{
                    $joueurL->setPhoto("web/img/Joueurs/PhotoDefaut.png");
                }
                
                switch($data[2]){
                    case "Pilier":
                        $joueurL->addPosition($this->getReference("Pilier droit"));
                        $joueurL->addPosition($this->getReference("Pilier gauche"));
                        break;
                    case "Talonneur":
                        $joueurL->addPosition($this->getReference("Talonneur"));
                        break;
                    case "2ème ligne":
                        $joueurL->addPosition($this->getReference("Deuxieme ligne gauche"));
                        $joueurL->addPosition($this->getReference("Deuxieme ligne droite"));
                        break;
                    case "3ème ligne":
                        $joueurL->addPosition($this->getReference("Troisième ligne gauche"));
                        $joueurL->addPosition($this->getReference("Troisième ligne droite"));
                        $joueurL->addPosition($this->getReference("Troisième ligne centre"));
                        break;
                    case "Mélée":
                        $joueurL->addPosition($this->getReference("Demi de mélée"));
                        break;
                    case "Ouverture":
                        $joueurL->addPosition($this->getReference("Demi d'ouverture"));
                        break;
                    case "Ailier":
                        $joueurL->addPosition($this->getReference("Trois quart aile gauche"));
                        $joueurL->addPosition($this->getReference("Trois quart aile droit"));
                        break;
                    case "Centre":
                        $joueurL->addPosition($this->getReference("Trois quart centre gauche"));
                        $joueurL->addPosition($this->getReference("Trois quart centre droit"));
                        break;
                    case "Arrière":
                        $joueurL->addPosition($this->getReference("Arrière"));
                        break;
                }

                $manager->persist($joueurL);
            }
            fclose($handle);
        }else{
            echo "Fichier non trouvé";
        }

        $manager->flush();
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 6;
    }

}