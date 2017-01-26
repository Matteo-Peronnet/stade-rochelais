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


class MatchController extends Controller
{

    /**
     * @Route("/match", name="admin_match_index")
     * @Method({"GET", "POST"})
     */
    public function matchAction(Request $request)
    {

        // FORMULAIRE MATCHS
        $match = new Matchs();
        $form = $this->get('form.factory')->create(AddMatchType::class, $match);
        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $this->get('session')->getFlashBag()->add(
                    'success',
                    'Le Match à bien été ajouté'
                );
                $em = $this->getDoctrine()->getManager();
                $em->persist($match);
                $em->flush();
            }
        }

        // FORMULAIRE CHAMPIONNAT
        $championnat = new Championnat();
        $matchs = null;
        $arrayFormView[] = null;
        $arrayForm[] = null;
        $formFindByChampionnatJournee = $this->get('form.factory')->create(FindMatchByChampionnatJourneeType::class, $championnat);
        if ($request->isMethod('POST')) {
            $formFindByChampionnatJournee->handleRequest($request);
            if ($formFindByChampionnatJournee->isSubmitted()) {
                $championnat = $_POST["find_match_by_championnat_journee"]["championnat"];
                $journee = $_POST["find_match_by_championnat_journee"]["journee"];
                if (isset($_POST["find_match_by_championnat_journee"]["filtre"])) {
                    $filtre = $_POST["find_match_by_championnat_journee"]["filtre"];
                } else {
                    $filtre = 0;
                }
                $repository_matchs = $this->getDoctrine()->getManager()->getRepository('FrontOfficeBundle:Matchs');
                $matchs = $repository_matchs->getMatchByFormFindMatchByChampionnatJournee($championnat, $journee, $filtre);
                $cpt = 0;
                foreach ($matchs as $unMatch) {
                    $formAddScoreMatch = $this->get('form.factory')->create(AddScoreMatchType::class, $matchs);
                    $arrayForm[$cpt] = $formAddScoreMatch;
                    $arrayFormView[$cpt] = $formAddScoreMatch->createView();
                    $cpt++;
                }
            }
        }

        return $this->render('BackOfficeBundle:Default:match.html.twig', array(
            'form' => $form->createView(),
            'FindByChampionnatJournee' => $formFindByChampionnatJournee->createView(),
            'matchs' => $matchs,
            'FormAddScoreMatch' => $arrayFormView));
    }

    /**
     * @Route("/api/journee", name="api_get_journee")
     * @Method({"GET", "POST"})
     */
    public function getJourneeAction(Request $request)
    {
        $championnat = $this->getDoctrine()->getRepository("FrontOfficeBundle:Championnat")->find((int)$request->request->get("championnat_id"));
        $journee = $championnat->getJournee()->toArray();
        return new JsonResponse($journee);
    }

    /**
     * @Route("/api/equipe", name="api_get_equipe")
     * @Method({"GET", "POST"})
     */
    public function getEquipeAction(Request $request)
    {
        $championnat = $this->getDoctrine()->getRepository("FrontOfficeBundle:Championnat")->find((int)$request->request->get("championnat_id"));
        $equipe = $championnat->getEquipe()->toArray();
        return new JsonResponse($equipe);
    }

    /**
     * @Route("/match/update/", name="admin_match_update_score")
     * @Method({"GET", "POST"})
     */
    public function updateMatchScoreAction(Request $request)
    {
        $GETPARAM = $request->getRequestUri();
        $GETPARAM = str_replace("/IUT/StadeRochelais/web/app_dev.php/admin/match/update/?", "", $GETPARAM);
        preg_match_all('/\d+/', $GETPARAM, $matches);
        $repository_matchs = $this->getDoctrine()->getManager()->getRepository('FrontOfficeBundle:Matchs');
        $em = $this->getDoctrine()->getManager();
        $leMatch = new Matchs();
        var_dump($matches[0]);
        for ($i = 0; $i <= count($matches[0]) - 1; $i++) {
            if ($i % 3 == 0) {
                $leMatch = $repository_matchs->find(intval($matches[0][$i]));
                //echo 'Recherche avec id '.$leMatch->getId();
            } elseif ($i % 3 == 1) {
                $leMatch->setScoreDomicile(intval($matches[0][$i]));
                //echo ' Ensuite de '.$leMatch->getScoreDomicile().' avec id '.$leMatch->getId();
            } elseif ($i % 3 == 2) {
                $leMatch->setScoreExterieur(intval($matches[0][$i]));
                //echo ' Enfin de '.$leMatch->getScoreExterieur().' avec id '.$leMatch->getId();
                $em->persist($leMatch);
                $em->flush();
            }
        }
        //$request->findNumero();
        return $this->redirectToRoute('admin_match_index');
    }

}
