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

class JoueurController extends Controller
{
    /**
     * @Route("/joueur")
     */
    public function joueurAction(Request $request)
    {
        $joueur = new Joueur();
        $listeJoueur = array();
        $form_upload_csv = $this->createForm(AddJoueurType::class, $joueur);
        $form_confirm_upload_csv = $this->createForm(ConfirmType::class);
        $form_upload_csv->handleRequest($request);
        $form_confirm_upload_csv->handleRequest($request);

        if ($request->isMethod('POST')) {
            if ($form_upload_csv->isValid() && $form_upload_csv->isSubmitted()) {
                /** @var \Symfony\Component\HttpFoundation\File\UploadedFile $file */
                $file = $form_upload_csv['file_upload_csv_joueur']->getData();
                $fileName = $joueur->upload($file);
                $listeJoueur = $this->parcourirCSVJoueur($fileName);
                $_SESSION['listeJoueur'] = $listeJoueur;

            }
            if ($form_confirm_upload_csv->isValid() && $form_confirm_upload_csv->isSubmitted()) {
                $em = $this->getDoctrine()->getManager();
                $listeJoueur = $_SESSION['listeJoueur'];
                for($i=0;$i<count($listeJoueur)-1;$i++){
                    $em->persist($listeJoueur[$i]);
                }
                $em->flush();
                $listeJoueur = array();
                $_SESSION['listeJoueur'] = $listeJoueur;
            }
        }
        return $this->render('BackOfficeBundle:Default:joueur.html.twig', array(
            'form_upload_csv' => $form_upload_csv->createView(),
            'form_confirm_upload_csv' => $form_confirm_upload_csv->createView(),
            'listeJoueur' => $listeJoueur
        ));
    }


    public function parcourirCSVJoueur($fileName){
        $repository_equipe = $this->getDoctrine()->getManager()->getRepository('FrontOfficeBundle:Equipe');
        $repository_position = $this->getDoctrine()->getManager()->getRepository('FrontOfficeBundle:Position');
        $listeJoueur = [];
        $handle = fopen(__DIR__ . "../../../../web/uploads/csv/" . $fileName, "r");
        while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
            $joueurL = new Joueur();
            $joueurL->setNomprenom($data[1]);
            $joueurL->setAge($data[3]);
            $joueurL->setDatenaissance($data[4]);
            $joueurL->setPoids($data[6]);
            $joueurL->setTaille($data[5]);
            $joueurL->setEquipe($repository_equipe->findOneBy(array('nom' => $data[0])));

            $photo = "web/img/Joueurs/" . $data[0] . "/" . $data[1] . ".jpg";

            if (file_exists(utf8_decode($photo))) {
                $joueurL->setPhoto(substr($photo, 3));
            } else {
                $joueurL->setPhoto("img/Joueurs/PhotoDefaut.png");
            }

            switch ($data[2]) {
                case "Pilier":
                    $joueurL->addPosition($repository_position->findOneBy(array('nom' => "Pilier droit")));
                    $joueurL->addPosition($repository_position->findOneBy(array('nom' => "Pilier gauche")));
                    break;
                case "Talonneur":
                    $joueurL->addPosition($repository_position->findOneBy(array('nom' => "Talonneur")));
                    break;
                case "2ème ligne":
                    $joueurL->addPosition($repository_position->findOneBy(array('nom' => "Deuxieme ligne gauche")));
                    $joueurL->addPosition($repository_position->findOneBy(array('nom' => "Deuxieme ligne droite")));
                    break;
                case "3ème ligne":
                    $joueurL->addPosition($repository_position->findOneBy(array('nom' => "Troisième ligne gauche")));
                    $joueurL->addPosition($repository_position->findOneBy(array('nom' => "Troisième ligne droite")));
                    $joueurL->addPosition($repository_position->findOneBy(array('nom' => "Troisième ligne centre")));
                    break;
                case "Mélée":
                    $joueurL->addPosition($repository_position->findOneBy(array('nom' => "Demi de mélée")));
                    break;
                case "Ouverture":
                    $joueurL->addPosition($repository_position->findOneBy(array('nom' => "Demi d'ouverture")));
                    break;
                case "Ailier":
                    $joueurL->addPosition($repository_position->findOneBy(array('nom' => "Trois quart aile gauche")));
                    $joueurL->addPosition($repository_position->findOneBy(array('nom' => "Trois quart aile droit")));
                    break;
                case "Centre":
                    $joueurL->addPosition($repository_position->findOneBy(array('nom' => "Trois quart centre gauche")));
                    $joueurL->addPosition($repository_position->findOneBy(array('nom' => "Trois quart centre droit")));
                    break;
                case "Arrière":
                    $joueurL->addPosition($repository_position->findOneBy(array('nom' => "Arrière")));
                    break;
            }
            $listeJoueur[] = $joueurL;
        }
        fclose($handle);
        return $listeJoueur;
    }
}
