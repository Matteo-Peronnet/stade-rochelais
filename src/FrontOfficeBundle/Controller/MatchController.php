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
        $joueurs = $repository_joueur->findAll();

        return $this->render('FrontOfficeBundle:Match:match.html.twig', array(
            'matchs'=>$matchs,
            'joueurs'=>$joueurs
        ));
    }

}
