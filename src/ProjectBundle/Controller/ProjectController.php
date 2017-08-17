<?php


namespace ProjectBundle\Controller;

use ProjectBundle\Entity\Intervenant;
use ProjectBundle\Entity\Projet;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Exception\Exception;

/**
 * @Route("/project")
 */
class ProjectController extends Controller {
    
    /**
     * Liste des projet
     *
     * @Route("/", name="list_projet")
     * @Method("GET")
     */
    public function indexAction(){
        $reposit = $this->getDoctrine()->getRepository("ProjectBundle:Projet");
        $list_projet = $reposit->findAll();
        return $this->render('ProjectBundle:Default:list_projet.html.twig',array(
            'identity'=> 'adonis morin',
            'list_projet'=> $list_projet
        ));
    }
    
    /**
     * Pour afficher le formulaire de 
     * 
     * @Route("/add_project",name="form_new_project")
     */
    public function newprojectAction(){
        return $this->render('ProjectBundle:Default:new_projet.html.twig',array(
            'identity'=> 'adonis morin'
        ));
    }
    
    /**
     * @Route("/_save_project", name="save_prj")
     */
    public function _saveProject(Request $request){
        $projetPrincipale = new Projet();
        $tabItervenant = [];
        $intervent = [];
        
        $type_respo = $this->getDoctrine()
            ->getManager()->getRepository("ProjectBundle:TypeIntervenant")->findBy(array(
                'niveau'=>0
            ))[0]; // ici j'ai recupere l'intervenant de type responsable
        $type_simple = $this->getDoctrine()
            ->getManager()->getRepository("ProjectBundle:TypeIntervenant")->findBy(array(
                'niveau'=>1
            ))[0];
        
        $respo = new Intervenant();
        // je configure le responsable du projet principale ici
        $respo->setType($type_respo);
        $respo->setEmail($request->request->get("email"));
        $respo->setTelephone($request->request->get("phone"));
        $respo->setNom($request->request->get("resp"));
        $intervent[] = $respo;
        $tabPhases = [];
        
        // les infos de chaque intervenant
        $interPrincName = $request->request->get("inter_princ_name");
        $interPrincEmail = $request->request->get("inter_princ_email");
        $interPrincTel = $request->request->get("inter_princ_tel");
        
        for($i = 1; $i< count($interPrincName) ; $i++){
            $intervenant = new Intervenant();
            $intervenant->setNom($interPrincName[$i])
                        ->setEmail($interPrincEmail[$i])
                        ->setTelephone($interPrincTel[$i]);
            ///$tabItervenant[] = ;
            $projetPrincipale->addIntervenant($intervenant);
            $intervent[] = $intervenant; // pour l'envoi du sms apres
        }// la liste des intervenant principale est bien

        //-------------------  ------------------- -----------------------
        $projetPrincipale->setTitre($request->request->get("Np"));
        $projetPrincipale->setIntitule($request->request->get("desc"));
        $projetPrincipale->setDateDebut( new \DateTime($request->request->get("dd")));
        $projetPrincipale->setDateFin(new \DateTime($request->request->get("df")));
        $projetPrincipale->setCout($request->request->get("cout"));
        $projetPrincipale->setClose(false);
        $projetPrincipale->addIntervenant($respo);// l'intervenant de type responsable est ici
        
        // le projet et ses intervenant principaux existe deja ici
        
        // a ce niveau il faut envoyer les sms. et persister les data
        // 1) persistance
        $em = $this->getDoctrine()->getManager();
        $em->persist($projetPrincipale);
        $em->flush();
        //$session = $request->getSession(); // je recupere la session ici
        //$session->set('id_prj', $projetPrincipale);// va etre utilise pour la creation des phases
        // 2) envoi par sms
        foreach ($intervent as $value) {
            $this->sendSms($value->getTelephone(), "Vous est intervenant du projet.".$projetPrincipale->getTitre());
        }
        return $this->render('ProjectBundle:Default:configure_phase.html.twig',array(
            'projet'=>$projetPrincipale->getId(),
            'etape_nbr'=> $request->request->get("nbr"),
            'identity'=> 'Adonis Simo'
        ));
    }
    
    /**
     * Ne represente pas une action du controller. Juste pour creerl les phases
     */
    private function createPhaseFromProject(){
        // on va gere les sous-projets maintenant
        $nbr_phase = $request->request->get("nbr_phase");
        for ( $h =0; $h <= $nbr_phase; $h++){// la gestion des phase se derouleras ici; On parcour les sous projets
            $sProjet = new Projet();
            $respoPhase = new Intervenant();
            // je configure le responsable du projet principale ici
            $respoPhase->setType($type_respo);
            $respoPhase->setEmail($request->request->get(strval($i)."_email_resp"));
            $respoPhase->setTelephone($request->request->get(strval($i)."_phone_resp"));
            $respoPhase->setNom($request->request->get(strval($i)."_tel_resp"));
            $sProjet->addIntervenant($respoPhase); // le responsable de la phase
            $intervent[] = $sProjet;
            // les intervenants maintenant
            $interSPName = $request->request->get(strval($i)."_inter_nom");
            $interSPEmail = $request->request->get(strval($i)."_inter_email");
            $interSPTel = $request->request->get(strval($i)."_inter_phone");
            // maintenant on boucle pour les enregistrer
            for ( $k =0; $k <= $interSPName.count() ; $k++){
                $spIntervenant = new Intervenant();
                $spIntervenant->setNom($interSPName[$k])
                        ->setEmail($interSPEmail[$k])
                        ->setTelephone($interSPTel[$k]);
                $sProjet->addIntervenant($spIntervenant);
                $intervent[] = $spIntervenant; // pour l'envoi du sms apres
            }
            $sProjet->setParent($projetPrincipale);
            $sProjet->setTitre($request->request->get(strval($i)."_Npp"));
            $sProjet->setIntitule($request->request->get(strval($i)."_descp"));
            $sProjet->setDateDebut($request->request->get(strval($i)."_ddp"));
            $sProjet->setDateFin($request->request->get(strval($i)."_dfp"));
            $sProjet->setCout($request->request->get(strval($i)."_coutp"));
            $sProjet->setClose(false);
            
            
        }
    }
    
    /**
     * @Route("/edit_phase", name="editer_phase")
     */
    public function savePhaseProjectAction(Request $request){
        $type_respo = $this->getDoctrine()
            ->getManager()->getRepository("ProjectBundle:TypeIntervenant")->findBy(array(
                'niveau'=>0
            ))[0]; // ici j'ai recupere l'intervenant de type responsable
        $type_simple = $this->getDoctrine()
            ->getManager()->getRepository("ProjectBundle:TypeIntervenant")->findBy(array(
                'niveau'=>1
            ))[0];
        $projetPrincipale = $this->getDoctrine()
            ->getManager()->getRepository("ProjectBundle:Projet")->find($request->request->get("projet"));
        $projetParent = new Projet();
        $sProjet = new Projet();
        for ( $h =0; $h <= $nbr_phase; $h++){
            $sProjet->setParent($projetPrincipale);
            $sProjet->setTitre($request->request->get(strval($h)."_Npp"));
            $sProjet->setIntitule($request->request->get(strval($h)."_descp"));
            $sProjet->setDateDebut($request->request->get(strval($h)."_ddp"));
            $sProjet->setDateFin($request->request->get(strval($h)."_dfp"));
            $sProjet->setCout($request->request->get(strval($h)."_coutp"));
            $sProjet->setClose(false);
            
            // les intervenants maintenant
            $interSPName = $request->request->get(strval($i)."_inter_nom");
            $interSPEmail = $request->request->get(strval($i)."_inter_email");
            $interSPTel = $request->request->get(strval($i)."_inter_phone");
            // maintenant on boucle pour les enregistrer
            for ( $k =0; $k <= $interSPName.count() ; $k++){
                $spIntervenant = new Intervenant();
                $spIntervenant->setNom($interSPName[$k])
                        ->setEmail($interSPEmail[$k])
                        ->setTelephone($interSPTel[$k]);
                $sProjet->addIntervenant($spIntervenant);
                $intervent[] = $spIntervenant; // pour l'envoi du sms apres
            }
            $respoPhase = new Intervenant();
            // je configure le responsable du projet principale ici
            $respoPhase->setType($type_respo);
            $respoPhase->setEmail($request->request->get(strval($i)."_emailp"));
            $respoPhase->setTelephone($request->request->get(strval($i)."_phonep"));
            $respoPhase->setNom($request->request->get(strval($i)."_respp"));
            $intervent[] = $respoPhase;
        }
    }
    public function nexmoSendAction(){
        $number = '237672714020';
        
        $fromName = "SmsApp";
        $list[] = '237693539419';
        $list[] = '237672714020';
        $nexmo = $this->get('jhg_nexmo_sms');
        $i = 0;
        foreach ($list as $n){
            $nexmo->sendText($n, "Boucle ". $i, $fromName);
            $i = $i +1;
        }
        return new Response("Sms envoyer");
    }


    public function sendSms($number,$message){
        $fromName = "SmsApp";
        try{
            $nexmo = $this->get('jhg_nexmo_sms');
            $nexmo->sendText($number, $message, $fromName);
        }catch(Exception $ex){
            print_r($ex);
        }
    }
    
    /***
     * la route qui va affiche les detail d'un projet @Route("/{id}", name="role_show")
     * 
     * @Route("/detailprojet/{id}", name="project_detail")
     */
    public function detailProjectAction(Request $request, $id){
        $project_repo = $this->getDoctrine()->getRepository("ProjectBundle:Projet");
        $projet = $project_repo->findOneById($id);// ici on a le projet
        return $this->render('ProjectBundle:Default:detail_projet.html.twig', array(
            'projet'=> $projet,
            'identity'=> 'adonis simo'
        ));
    }
    
    /***
     * la route qui va affiche les detail d'un sous-projet @Route("/{id}", name="role_show")
     * 
     * @Route("/detailsubprojet/{id}", name="sub_project_detail")
     */
    public function detailSubProjectAction(Request $request, $id){
        $project_repo = $this->getDoctrine()->getRepository("ProjectBundle:Projet");
        $projet = $project_repo->findOneById($id);// ici on a le projet
        $p = new Projet();
        
        return $this->render('ProjectBundle:Default:detail_sub_projet.html.twig', array(
            'projet'=> $projet,
            'identity'=> 'adonis simo'
        ));
    }
}