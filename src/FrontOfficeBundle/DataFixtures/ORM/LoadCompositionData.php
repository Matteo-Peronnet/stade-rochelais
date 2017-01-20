<?php
/**
 * Created by PhpStorm.
 * User: Vivien
 * Date: 04/01/2017
 * Time: 00:37
 */

// src/FrontOfficeBundle/DataFixtures/ORM/LoadCompositionData.php
namespace FrontOfficeBundle\Bundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use FrontOfficeBundle\Entity\Composition;
use FrontOfficeBundle\Entity\Formation;

class LoadCompositionData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        if (($handle = fopen("web/csv/Compositions.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                $joueur = $manager->getRepository('FrontOfficeBundle:Joueur')->findOneBy(array('nomprenom' => $data[0]));
                if($joueur != NULL){
                    $composition = new Composition();
                    $composition->setJoueur($joueur);
                    $composition->setPosition($this->getReference($data[1]));
                    $composition->setFormation($this->getReference("Equipe Type ".$data[2]));
                    $manager->persist($composition);
                }
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
        return 7;
    }

}