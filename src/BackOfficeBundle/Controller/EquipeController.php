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

class EquipeController extends Controller
{
    /**
     * @Route("/equipe")
     */
    public function equipeAction(Request $request)
    {

        $repository = $this->getDoctrine()->getManager()->getRepository('FrontOfficeBundle:Equipe');
        $repositoryC = $this->getDoctrine()->getManager()->getRepository('FrontOfficeBundle:Championnat');
        $idChampionnatTop14 = $repositoryC->findByNom('Top 14');
        $listeEquipesTop14 = $idChampionnatTop14[0]->getEquipe();

        // FORMULAIRE EQUIPE
        $equipe = new Equipe();
        $form = $this->createForm(AddEquipeType::class, $equipe);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isSubmitted()) {
                $this->get('session')->getFlashBag()->add(
                    'success',
                    'L\'equipe a bien été ajouté'
                );
                $em = $this->getDoctrine()->getManager();
                // $file stores the uploaded PDF file
                /** @var \Symfony\Component\HttpFoundation\File\UploadedFile $file */
                $file = $form['file_upload_image']->getData();
                $fileName = $equipe->upload($file);
                $equipe->setBlason('/uploads/Logo/' . $fileName);
                $em->persist($equipe);
                $em->flush();

            }
        }
        return $this->render('BackOfficeBundle:Default:equipe.html.twig', array(
            'form' => $form->createView(),
            'listeEquipesTop14' => $listeEquipesTop14
        ));
    }
}
