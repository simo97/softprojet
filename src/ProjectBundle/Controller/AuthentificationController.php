<?php

namespace ProjectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;   
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;

use ProjectBundle\Entity\Utilisateur;
use ProjectBundle\Entity\Projet;
//use Symfony\Component\HttpFoundation\Request;
/**
 * Description of AuthentificationController
 * @Route("/",name="index")
 * @author ad0n1s97 <simoadonis@gmail.com>
 */
class AuthentificationController extends Controller {
    //put your code here
    
    /**
     * @Route("/", name="login_form")
     */
    public function indexAction(){
        //return new \Symfony\Component\HttpFoundation\Response("le loggin form est ici");
        //return $this->render('ProjectBundle:Default:template.html.twig');
        return $this->render('ProjectBundle:Default:signin.html.twig');
    }
    
    /**
     * @Route("/_auth", name="authenticate")
     */
    public function authAction(Request $request){
        // prevu ici pour verifier l'authentification et la creation de la session    
        $login = $request->request->get('login');
        $pass = $request->request->get('pass');
        // 1 - on va cherche l'user ici
        $user = new Utilisateur();
        $reposit = $this->getDoctrine()->getRepository("ProjectBundle:Utilisateur");
        $em = $reposit->findOneBy(array(
            'login' => $login,
            'pass' => $pass
        ));
        // 2 si il existe on va recuperer et l'enregistrer dans la session
        if ($em  ){
            $session = $request->getSession();
            $em = $this->getDoctrine()->getManager();
            
            $query = $em->createQuery(
            'SELECT p '
            .'FROM ProjectBundle:Projet p')
             ->setMaxResults(2)
             ->setFirstResult(10);
            $p1 = $query->getResult();
            
            $query = $em->createQuery(
            'SELECT p '
            .'FROM ProjectBundle:Projet p')
             ->setMaxResults(12)
             ->setFirstResult(20);
            $p2 = $query->getResult();
            
            //$session->set('id', $em->getId());
            //$session->set('identity', $em->getNom().' '. $em->getPrenom() );
            
            // on charge ses projets
            //$projet_list = $em->getProjets();
            //$this->getDoctrine()->getRepository('ProjectBundle:Projet')->findBy(array(
                //'projet_user'=> $em->getId()
            //)); 
            // je boucle ici
            $projet_close = new \Doctrine\Common\Collections\ArrayCollection();
            $projet_open = new \Doctrine\Common\Collections\ArrayCollection();
            
            /*foreach ($projet_list as $p ){
                
                if ( $p.getClose() ){
                    $projet_close[] = $p;
                }else{
                    $projet_open[] = $p;
                }
            }*/
            // on peut rendre la page
            return $this->render('ProjectBundle:Default:dash.html.twig',array(
                'projet_ended' => $p1,
                'projet_open' => $p2,
                'identity'=> 'ads' /*$em->getNom().' '. $em->getPrenom() */
            ));
            
        }else{
            return new RedirectResponse('/login');
        }
    }
    
    /**
     * 
     * @Route("logout", name="logout")
     */
    public function logoutAction(){
        return new RedirectResponse('/login');
    }
}
