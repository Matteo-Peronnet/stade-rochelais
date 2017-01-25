<?php

namespace BackOfficeBundle\Controller;
use FrontOfficeBundle\Entity\Journee;
use FrontOfficeBundle\Entity\Championnat;
use FrontOfficeBundle\Entity\Equipe;
use FrontOfficeBundle\Form\AddScoreMatchType;
use FrontOfficeBundle\Form\EventListener\AddJournee;
use FrontOfficeBundle\Entity\Matchs;
use FrontOfficeBundle\Entity\Diffuseur;
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
     * @Route("/match", name="admin_match_index")
     * @Method({"GET", "POST"})
     */
    public function matchAction(Request $request){

        // FORMULAIRE MATCHS
        $match = new Matchs();
        $form = $this->get('form.factory')->create(AddMatchType::class,$match);
        if($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($match);
                $em->flush();
            }
        }

        // FORMULAIRE CHAMPIONNAT
        $championnat = new Championnat();
        $matchs = null ;
        $arrayFormView[]=null;
        $arrayForm[]=null;
        $formFindByChampionnatJournee = $this->get('form.factory')->create(FindMatchByChampionnatJourneeType::class,$championnat);
        if($request->isMethod('POST')) {
            $formFindByChampionnatJournee->handleRequest($request);
            if($formFindByChampionnatJournee->isSubmitted()){
                $championnat =  $_POST["find_match_by_championnat_journee"]["championnat"];
                $journee =  $_POST["find_match_by_championnat_journee"]["journee"];
                if(isset($_POST["find_match_by_championnat_journee"]["filtre"])){
                    $filtre = $_POST["find_match_by_championnat_journee"]["filtre"];
                }else{
                    $filtre = 0;
                }
                $repository_matchs = $this->getDoctrine()->getManager()->getRepository('FrontOfficeBundle:Matchs');
                $matchs = $repository_matchs->getMatchByFormFindMatchByChampionnatJournee($championnat,$journee,$filtre);
                $cpt=0;
                foreach($matchs as $unMatch){
                    $formAddScoreMatch = $this->get('form.factory')->create(AddScoreMatchType::class,$matchs);
                    $arrayForm[$cpt] = $formAddScoreMatch;
                    $arrayFormView[$cpt] = $formAddScoreMatch->createView();
                    $cpt++;
                }
            }
        }

        return $this->render('BackOfficeBundle:Default:match.html.twig',array(
            'form'=>$form->createView(),
            'FindByChampionnatJournee'=>$formFindByChampionnatJournee->createView(),
            'matchs'=>$matchs,
            'FormAddScoreMatch'=>$arrayFormView));
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
        $GETPARAM = str_replace("/IUT/StadeRochelais/web/app_dev.php/admin/match/update/?","",$GETPARAM);
        preg_match_all('/\d+/', $GETPARAM, $matches);
        $repository_matchs = $this->getDoctrine()->getManager()->getRepository('FrontOfficeBundle:Matchs');
        $em = $this->getDoctrine()->getManager();
        $leMatch = new Matchs();
        var_dump($matches[0]);
        for($i=0;$i<=count($matches[0])-1;$i++){
            if($i%3==0) {
                $leMatch = $repository_matchs->find(intval($matches[0][$i]));
                //echo 'Recherche avec id '.$leMatch->getId();
            }elseif($i%3==1) {
                $leMatch->setScoreDomicile(intval($matches[0][$i]));
                //echo ' Ensuite de '.$leMatch->getScoreDomicile().' avec id '.$leMatch->getId();
            }elseif($i%3==2){
                $leMatch->setScoreExterieur(intval($matches[0][$i]));
                //echo ' Enfin de '.$leMatch->getScoreExterieur().' avec id '.$leMatch->getId();
                $em->persist($leMatch);
                $em->flush();
            }
        }
        //$request->findNumero();
        return $this->redirectToRoute('admin_match_index');
    }

    /**
     * @Route("/equipe")
     */
    public function equipeAction(Request $request){

        $repository = $this->getDoctrine()->getManager()->getRepository('FrontOfficeBundle:Equipe');
        $listeEquipesTop14 = $repository->myfindAllEquipesDuTop14();

        // FORMULAIRE EQUIPE
        $equipe = new Equipe();
        $form = $this->createForm(AddEquipeType::class,$equipe);

        if($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isSubmitted()) {
                $em = $this->getDoctrine()->getManager();
                // $file stores the uploaded PDF file
                /** @var \Symfony\Component\HttpFoundation\File\UploadedFile $file */
                $file = $form['file_upload_image']->getData();
                $fileName = $equipe->upload($file);
                $equipe->setBlason('/web/uploads/Logo'.$fileName);
                $em->persist($equipe);
                $em->flush();

            }
        }
        return $this->render('BackOfficeBundle:Default:equipe.html.twig',array(
            'form'=>$form->createView(),
            'listeEquipesTop14' => $listeEquipesTop14
        ));
    }

    /**
     * @Route("/championnat", name="championnat")
     * @Method({"GET", "POST"})
     * @author vmoisan
     */
    public function championnatAction(Request $request){
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
        for ($i = 0; $i < $size ; $i++){
            $listeEquipe = $idChampionnatTop14BIS[$i]->getEquipe();
        }



//        $listeEquipe = $repositoryE->getEquipeNotInChampionnat($idChampionnatTop14BIS[0]->getId());
        //$listeEquipe = $repositoryC->myFindAll();

        //Formulaire Add Championnat ------------------------------------------------------------------
        $championnatAdd = new Championnat();
        $formAddChamp = $this->createForm(AddChampionnatType::class, $championnatAdd);
        if($request->isMethod('POST')) {
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
            'formAddChamp'=>$formAddChamp->createView(),
            'listeChamp' => $listeChamp,
            'listeEquipeTOP14' => $listeEquipeTOP14,
            'listeEquipe' => $listeEquipe,
            //'formAddJourToChamp'=>$formAddJourToChamp->createView(),
            //'formAddTeamToChamp'=>$formAddTeamToChamp->createView(),
        ));
    }

    /**
     * @Route("/diffuseur")
     */
    public function diffuseurAction(Request $request){
        $diffuseur = new Diffuseur();
        $form = $this->createForm(AddDiffuseurType::class, $diffuseur);
        $form->handleRequest($request);
        //$form->bind($request);

        if ($form->isValid()) {
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

//    /**
//     * @Route("/api/equipe", name="api_get_equipe")
//     * @Method({"GET", "POST"})
//     */
//    public function getChampionnatAction(Request $request)
//    {
//        $championnat = $this->getDoctrine()->getRepository("FrontOfficeBundle:Equipe")->getEquipeNotInChampionnat((int)$request->request->get("championnat"));
//        return new JsonResponse($championnat);
//    }

    /**
     * @Route("/joueur")
     */
    public function joueurAction(Request $request)
    {
        $joueur = new Joueur();
        $form = $this->createForm(AddJoueurType::class, $joueur);
        $form->handleRequest($request);
        //$form->bind($request);

        if ($form->isValid()) {
            // $file stores the uploaded PDF file
//            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */

            $file = $form['file_upload_csv_joueur']->getData();

            $fileName = $joueur->upload($file);
            // Update the 'brochure' property to store the PDF file name
            // instead of its contents
            $joueur->setFileUploadCsvJoueur($fileName);
        }
        //var_dump($joueur->getFileUploadCsvJoueur());
        // ... persist the $product variable or any other work
        return $this->render('BackOfficeBundle:Default:joueur.html.twig', array(
            'form' => $form->createView()
        ));
    }



}
