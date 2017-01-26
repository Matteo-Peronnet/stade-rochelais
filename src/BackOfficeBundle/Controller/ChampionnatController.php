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

class ChampionnatController extends Controller
{
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
            $listeEquipe = [];
            //var_dump($idChampionnatTop14BIS[0]->getEquipe());
            for ($i = 0; $i <= count($idChampionnatTop14BIS) - 1; $i++) {
                for ($k = 0; $k <= count($idChampionnatTop14BIS[$i]->getEquipe()) - 1; $k++) {
                    $listeEquipe[] = $idChampionnatTop14BIS[$i]->getEquipe()->get($k);
                }
            }


            //Formulaire Add Championnat ------------------------------------------------------------------
            $championnatAdd = new Championnat();
            $formAddChamp = $this->createForm(AddChampionnatType::class, $championnatAdd);
            if ($request->isMethod('POST')) {
                $formAddChamp->handleRequest($request);
                if ($formAddChamp->isValid()) {
                    $this->get('session')->getFlashBag()->add(
                        'success',
                        'Le Championnat et les equipes on bien été ajoutés'
                    );
                    $em = $this->getDoctrine()->getManager();
                    /** @var \Symfony\Component\HttpFoundation\File\UploadedFile $file */
                    $file = $formAddChamp['submitFile']->getData();
                    $fileName = $championnatAdd->upload($file);
                    $championnatAdd->setsubmitFile($fileName);
                    if (($handle = fopen(__DIR__ . "../../../../web/uploads/csv/" . $fileName, "r")) !== FALSE) {//Ouvre le fichier en lecture seule
                        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                            $equipe = new Equipe();
                            $equipe->setNom($data[0]);
                            $equipe->setStade($data[1]);
                            $equipe->setCouleur($data[2]);
                            $equipe->setBlason("img/Logo/" . $data[0] . ".png");
                            $em->persist($equipe);
                            $championnatAdd->addEquipe($equipe);

                        }
                        $em->persist($championnatAdd);
                        $em->flush();

                        fclose($handle);
                    } else {
                        echo "Fichier non trouvé";
                    }
                    return $this->redirectToRoute('championnat');
                }
            }

            return $this->render('BackOfficeBundle:Default:championnat.html.twig', array(
                'formAddChamp' => $formAddChamp->createView(),
                'listeChamp' => $listeChamp,
                'listeEquipeTOP14' => $listeEquipeTOP14,
                'listeEquipe' => $listeEquipe,
            ));
        }

    }
}
