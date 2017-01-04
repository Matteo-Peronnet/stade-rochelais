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
        $repository = $this->getDoctrine()->getManager()->getRepository('FrontOfficeBundle:Matchs');

        $id = $request->attributes->get('id');

        $matchs = $repository->getMatchID($id);

        return $this->render('FrontOfficeBundle:Match:match.html.twig', array('matchs'=>$matchs
        ));
    }

}
