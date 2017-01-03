<?php

namespace FrontOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('FrontOfficeBundle:Matchs');
        $matchs = $repository->getMatchAvenirEquipe("Stade Rochelais");
        $prochainMatch = $matchs[0];
        $jourProchainMatch = $matchs[0]->getdate();

        $tab_jours = array('Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi');
        $jourProchainMatch = $tab_jours[date('w', mktime(0,0,0,$jourProchainMatch->format('m'),$jourProchainMatch->format('d'),$jourProchainMatch->format('Y')))];
        return $this->render('FrontOfficeBundle:Default:index.html.twig',array('matchs' => $matchs,
            'prochainMatch'=> $prochainMatch,
            'jourProchainMatch'=>$jourProchainMatch));
    }
}
