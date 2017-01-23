<?php

namespace FrontOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class EffectifController extends Controller
{
    /**
     * @Route("/effectif")
     */
    public function indexAction()
    {
        return $this->render('FrontOfficeBundle:Effectif:effectif.html.twig', array(
        ));
    }

}
