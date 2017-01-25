<?php

namespace FrontOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FrontOfficeBundle\Entity\Joueur;
use Symfony\Component\HttpFoundation\Request;

class EffectifController extends Controller
{
    /**
     * @Route("/effectif")
     */
    public function indexAction()
    {
        $repository_joueur = $this->getDoctrine()->getManager()->getRepository('FrontOfficeBundle:Joueur');
        $repository_position = $this->getDoctrine()->getManager()->getRepository('FrontOfficeBundle:Position');

        $listePosition = $repository_position->findAll();

        $request = Request::createFromGlobals();
        $PositionSaisie = $request->query->get('p');
        if($PositionSaisie==null){
            $listeJoueurs = $repository_joueur->findJoueurStadeRochelais('Stade Rochelais');
            $positionMenu = "tout";
        }else{
            $positionMenu = $request->query->get('p');
            $tabPosition = [];
            switch($PositionSaisie){
                case 3: $tabPosition[]=[3,1];break;
                case 2: $tabPosition[]=[2];break;
                case 4: $tabPosition[]=[4,5];break;
                case 6: $tabPosition[]=[6,7,8];break;
                case 9: $tabPosition[]=[9];break;
                case 10: $tabPosition[]=[10];break;
                case 11: $tabPosition[]=[11,14];break;
                case 12: $tabPosition[]=[12,13];break;
                case 15: $tabPosition[]=[15];break;
            }
            $tabListeJoueur = [];
            $listeJoueurs = $repository_joueur->findJoueurStadeRochelais('Stade Rochelais');
            for($i=0;$i<=count($listeJoueurs)-1;$i++){
                for($j=0;$j<=count($listeJoueurs[$i]->getPosition())-1;$j++){
                    for($k=0;$k<=count($tabPosition[0])-1;$k++){
                        if($listeJoueurs[$i]->getPosition()->get($j)->getNumero()==$tabPosition[0][$k]){
                            $tabListeJoueur[]=$listeJoueurs[$i];
                        }
                    }
                }
            }

            $tabListeJoueur = array_unique($tabListeJoueur,SORT_REGULAR);
            $listeJoueurs = $tabListeJoueur;
        }




        return $this->render('FrontOfficeBundle:Effectif:effectif.html.twig', array(
            "listeJoueurs"=>$listeJoueurs,
            "listePosition"=>$listePosition,
            "positionMenu"=>$positionMenu
        ));
    }

}
