<?php

namespace BackOfficeBundle\Controller;

use FrontOfficeBundle\Entity\Matchs;
use FrontOfficeBundle\Form\MatchsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('BackOfficeBundle:Default:index.html.twig');
    }

    /**
     * @Route("/match")
     */
    public function matchAction(Request $request){
        $match = new Matchs();
        $form = $this->get('form.factory')->create(MatchsType::class,$match);
        if($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($match);
                $em->flush();
            }
        }
        return $this->render('BackOfficeBundle:Default:match.html.twig',array('form'=>$form->createView()));
    }

    /**
     * @Route("/equipe")
     */
    public function equipeAction(){

        return $this->render('BackOfficeBundle:Default:equipe.html.twig');
    }

    /**
     * @Route("/championnat")
     */
    public function championnatAction(){

        return $this->render('BackOfficeBundle:Default:championnat.html.twig');
    }
}
