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
        $repository_matchs = $this->getDoctrine()->getManager()->getRepository('FrontOfficeBundle:Matchs');
        $journee = $repository_journee->getJourneeChampionnat("Top 14");

        $request = Request::createFromGlobals();
        $journeeSaisie = $request->query->get('j');
        if($journeeSaisie==null){
            $journeeSaisie = $repository_matchs->getDernierScoreSaisie();
            $journeeSaisie = $journeeSaisie[0]->getJournee()->getNumero();
        }else{
            $journeeSaisie = $repository_journee->getNumeroJournee($journeeSaisie);
            $journeeSaisie = $journeeSaisie[0]->getNumero();
        }

        $tabJournee = $journee;

        $tmp = 0;
        for($i=0;$i<=count($journee)-1;$i++){
            if(count($journee)-1>($journeeSaisie-1)+$i){
                $tabJournee[$i] = $journee[($journeeSaisie - 1) + $i];
            }else if((count($journee)-1)==($journeeSaisie - 1) + $i){
                $tabJournee[$i] = $journee[($journeeSaisie - 1) + $i];
            }
            else{
                $tabJournee[$i] = $journee[$tmp];
                $tmp++;
            }
        }
        $tabJournee = array_reverse($tabJournee);

        $matchs = $repository_matchs->getMatchJournee($journee[$journeeSaisie-1]);

        return $this->render('FrontOfficeBundle:Calendrier:calendrier.html.twig',array('journee'=>$tabJournee,
            'matchs'=>$matchs,
            'journeeSaisie'=>$journeeSaisie));
    }
}
