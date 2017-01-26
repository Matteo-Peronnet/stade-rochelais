<?php

namespace BackOfficeBundle\Controller;

use FrontOfficeBundle\Entity\Journee;
use FrontOfficeBundle\Entity\Championnat;
use FrontOfficeBundle\Entity\Equipe;
use FrontOfficeBundle\Form\AddJoueurType;
use FrontOfficeBundle\Form\AddScoreMatchType;
use FrontOfficeBundle\Form\ConfirmType;
use FrontOfficeBundle\Form\EventListener\AddJournee;
use FrontOfficeBundle\Entity\Matchs;
use FrontOfficeBundle\Entity\Diffuseur;
use FrontOfficeBundle\Entity\Joueur;
use FrontOfficeBundle\Form\FindMatchByChampionnatJourneeType;
use FrontOfficeBundle\Form\FindMatchType;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use FrontOfficeBundle\Form\AddEquipeType;
use FrontOfficeBundle\Form\MatchsType;
use FrontOfficeBundle\Form\AddMatchType;
use FrontOfficeBundle\Form\AddChampionnatType;
use FrontOfficeBundle\Form\AddDiffuseurType;
use FrontOfficeBundle\Form\AddEquipeToChampionnatType;
use FrontOfficeBundle\Form\AddJourneeToChampionnatType;
use FrontOfficeBundle\Repository\ChampionnatRepository;
use FrontOfficeBundle\Repository\EquipeRepository;
use FrontOfficeBundle\Form\EventListener\AddEquipeListenerChampionnat;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
class DiffuseurController extends Controller
{

    /**
     * @Route("/diffuseur")
     */
    public function diffuseurAction(Request $request){
        $diffuseur = new Diffuseur();
        $form = $this->createForm(AddDiffuseurType::class, $diffuseur);
        $form->handleRequest($request);
        //$form->bind($request);

        if ($form->isValid()) {
            $this->get('session')->getFlashBag()->add(
                'success',
                'Le diffuseur a bien été ajouté'
            );
            // $file stores the uploaded PDF file
            /** @var \Symfony\Component\HttpFoundation\File\UploadedFile $file */

            $file = $form['file_upload_logo_diffuseur']->getData();

            $fileName = $diffuseur->upload($file);
            // Update the 'brochure' property to store the PDF file name
            // instead of its contents
            $diffuseur->setFileUploadLogoDiffuseur($fileName);
            $diffuseur->setLogo("/uploads/Diffuseur/".$fileName);

            $em = $this->getDoctrine()->getManager();
            $em->persist($diffuseur);
            $em->flush();
        }

        $diffRep = $this->getDoctrine()->getManager()->getRepository('FrontOfficeBundle:Diffuseur');
        $listeDiff = $diffRep->findAll();

        //var_dump($joueur->getFileUploadCsvJoueur());
        // ... persist the $product variable or any other work
        return $this->render('BackOfficeBundle:Default:diffuseur.html.twig', array(
            'form' => $form->createView(),
            'diffuseurs'=> $listeDiff
        ));
    }

}
