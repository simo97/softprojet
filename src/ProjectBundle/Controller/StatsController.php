<?php

namespace ProjectBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/stats")
 */
class StatsController extends Controller {
    
    /*
     * Cette route permet d'afficher les stats de realisation d'un projet su un graph
     * @Route("/{id}", name="project_stats")
     
    public function indexAction(Request $request, $id =0){
        $project_repo = $this->getDoctrine()->getRepository("ProjectBundle:Projet");
        $projet = $project_repo->find($id); // le projet ici
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT COUNT(p) FROM ProjectBundle:Projet p WHERE p.parent = :projet AND p.close = true'
        )->setParameter('projet',$projet);// les phases terminee
        $nbr_prj_ended = $query->getResult();
        
        $query = $em->createQuery(
            'SELECT COUNT(p)  FROM ProjectBundle:Projet p WHERE p.parent = :projet AND p.close = false'
        )->setParameter('projet',$projet);// les phases terminee
        $nbr_prj_running = $query->getResult();
        // la liste des projets
        $query = $em->createQuery(
            'SELECT p FROM ProjectBundle:Projet p WHERE p.parent IS NULL' // les projet qui n'on pas de de parent ne sont pas des phases
        );// les phases terminee
        $projet_list = $query->getResult();
        
        $this->render('ProjectBundle:Default:stats.html.twig', array(
            'tache_fini'=>$nbr_prj_ended,
            'tache_en_cour'=>$nbr_prj_running,
            'identity'=> 'adonis simo',
            'list_projet' => $projet_list,
        ));
        return new Response("Le reponse");
    }*/
    
    /**
     * @Route("/stats_template", name="stats_index")
     */
    public function showwelcomeAction(){
        return $this->render('ProjectBundle:Default:stats.html.twig');
    }
    
}
