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
     * @Route("/championnat", name="championnat")
     * @Method({"GET", "POST"})
     * @author vmoisan
     */
    public function championnatAction(Request $request)
    {
        $repositoryC = $this->getDoctrine()->getManager()->getRepository('FrontOfficeBundle:Championnat');
        $repositoryE = $this->getDoctrine()->getManager()->getRepository('FrontOfficeBundle:Equipe');

        //Les listes -----------------------------------------------------------------------------------

        //liste de tout les championnats
        $listeChamp = $repositoryC->myFindAll();

        //liste des équipes du Top14
        $idChampionnatTop14 = $repositoryC->findByNom('Top 14');
        $listeEquipeTOP14 = $idChampionnatTop14[0]->getEquipe();

        //liste des équipes qui ne sont pas dans le TOP14
        //note:  la on parcourt les championnats qui ne sont pas le top 14 puis on getEquipe
        //      il faut parcourir les equipes qui ne sont pas dans le top14
        $idChampionnatTop14BIS = $repositoryC->getChampionnatIDBIS('Top 14');//ChampionnatRepository
        //var_dump($idChampionnatTop14BIS);
        $size = count($idChampionnatTop14BIS);
        for ($i = 0; $i < $size; $i++) {
            $listeEquipe = $idChampionnatTop14BIS[$i]->getEquipe();
        }


//        $listeEquipe = $repositoryE->getEquipeNotInChampionnat($idChampionnatTop14BIS[0]->getId());
        //$listeEquipe = $repositoryC->myFindAll();

        //Formulaire Add Championnat ------------------------------------------------------------------
        $championnatAdd = new Championnat();
        $formAddChamp = $this->createForm(AddChampionnatType::class, $championnatAdd);
        if ($request->isMethod('POST')) {
            $formAddChamp->handleRequest($request);
            if ($formAddChamp->isSubmitted() && $formAddChamp->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($championnatAdd);
                $em->flush();
                return $this->redirectToRoute('championnat');
            }
        }

        //Formulaire Add Journee To Championnat ------------------------------------------------------------------
//        $journee = new Journee();
//        $formAddJourToChamp = $this->get('form.factory')->create(AddJourneeToChampionnatType::class, $journee);
//        if($request->isMethod('POST')) {
//            $formAddJourToChamp->handleRequest($request);
//            if($formAddJourToChamp->isValid()){
//                $em = $this->getDoctrine()->getManager();
//                $em->persist($journee);
//                $em->flush();
//                return $this->redirectToRoute('championnat');
//            }
//        }


//        //Formulaire Add Equipe To Championnat ------------------------------------------------------------------
//        $champ = new Championnat();
//        $formAddTeamToChamp = $this->get('form.factory')->create(AddEquipeToChampionnatType::class, $champ);
//        if($request->isMethod('POST')) {

//            $formAddTeamToChamp->submit($request->request->get($formAddTeamToChamp->getName()));
//            var_dump($formAddTeamToChamp->getName);
//            // $formAddTeamToChamp->handleRequest($request);
//            //var_dump($request);
//
//            if($formAddTeamToChamp->isSubmitted() ){
//                $equipe = $repository2->find(intval($_POST['frontofficebundle_championnat']['equipe']));
//                $championnatEquipe = $repository2->find(intval($_POST['frontofficebundle_championnat']['championnat']));
//                var_dump($championnatEquipe);
//                $championnatEquipe->addChampionnat($equipe);
//                $em = $this->getDoctrine()->getManager();
//                $em->persist($champ);
//                $em->flush();
//                return $this->redirectToRoute('championnat');
//            }
//        }

//        $formAddTeamToChamp = $this->get('form.factory')->create(AddEquipeToChampionnatType::class);
//
//        if($request->isMethod('POST')) {
//            //var_dump($formAddTeamToChamp);
//
//            //$formAddTeamToChamp->submit($request->request->get($formAddTeamToChamp->getEquipe()));
//            // $formAddTeamToChamp->handleRequest($request);
//            //var_dump($request);
//
//            if($formAddTeamToChamp->isValid()){
//                $equipe_entity = new Equipe();
//                //$equipe = $repository2->find(intval($_POST['frontofficebundle_championnat']['equipe']));
//                //$championnatEquipe = $repository2->find(intval($_POST['frontofficebundle_championnat']['championnat']));
//                $equipe_entity->setId(intval($_POST['frontofficebundle_championnat']['equipe']));
//                $equipe_entity->setChampionnat(intval($_POST['frontofficebundle_championnat']['championnat']));
//                //$championnatEquipe->addChampionnat($equipe);
//                $em = $this->getDoctrine()->getManager();
//                $em->persist($equipe_entity);
//                $em->flush();
//                return $this->redirectToRoute('championnat');
//            }
//        }

        return $this->render('BackOfficeBundle:Default:championnat.html.twig', array(
            'formAddChamp' => $formAddChamp->createView(),
            'listeChamp' => $listeChamp,
            'listeEquipeTOP14' => $listeEquipeTOP14,
            'listeEquipe' => $listeEquipe,
            //'formAddJourToChamp'=>$formAddJourToChamp->createView(),
            //'formAddTeamToChamp'=>$formAddTeamToChamp->createView(),
        ));
    }
}
