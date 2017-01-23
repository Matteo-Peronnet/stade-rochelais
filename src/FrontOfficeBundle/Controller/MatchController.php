<?php

namespace FrontOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class MatchController extends Controller
{
    /**
     * @Route("/match/{id}")
     */
    public function indexAction(Request $request)
    {
        $repository_match = $this->getDoctrine()->getManager()->getRepository('FrontOfficeBundle:Matchs');
        $repository_joueur = $this->getDoctrine()->getManager()->getRepository('FrontOfficeBundle:Joueur');

        $id = $request->attributes->get('id');

        $matchs = $repository_match->getMatchID($id);

        $joueurs_domicile = $repository_match->getJoueurMatchDomicile($id);
        $joueurs_exterieur = $repository_match->getJoueurMatchExterieur($id);

        $joueurs_domicileTab = [];
        $joueurs_exterieurTab = [];


        for($i=0;$i<=count($joueurs_domicile)-2;$i++){
            $joueurs_domicileTab[$i] = $joueurs_domicile[$i+1];
            $joueurs_exterieurTab[$i] = $joueurs_exterieur[$i+1];
        }



        return $this->render('FrontOfficeBundle:Match:match.html.twig', array(
            'matchs'=>$matchs,
            'joueurDomicile'=>$joueurs_domicileTab,
            'joueurExterieur'=>$joueurs_exterieurTab
        ));
    }

}
