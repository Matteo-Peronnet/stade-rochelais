<?php

namespace FrontOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class CalendrierController extends Controller
{
    /**
     * @Route("/calendrier/")
     */
    public function indexAction()
    {
        $repository_journee = $this->getDoctrine()->getManager()->getRepository('FrontOfficeBundle:Journee');
        $journee = $repository_journee->getJourneeChampionnat("TOP14");

        $request = Request::createFromGlobals();
        $journeeSaisie = $request->query->get('j');
        if($journeeSaisie==null){
            $journeeSaisie = $journee[count($journee)-1]->getid();
        }

        $repository_matchs = $this->getDoctrine()->getManager()->getRepository('FrontOfficeBundle:Matchs');
        $matchs = $repository_matchs->getMatchJournee($journeeSaisie);

        return $this->render('FrontOfficeBundle:Calendrier:calendrier.html.twig',array('journee'=>$journee,
            'matchs'=>$matchs,
            'journeeSaisie'=>$journeeSaisie));
    }
}
