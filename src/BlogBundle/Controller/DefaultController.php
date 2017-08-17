<?php

namespace BlogBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use \BlogBundle\Entity\Article;

class DefaultController extends Controller
{
    /**
     * l'acceuil du blog 
     * Retourne la liste des article du blog 
     * 
     * @Route("/")
     */
    public function indexAction()
    {
        //$em = $this->getDoctrine()->getManager();
        
        //return $this->render('BlogBundle:Default:index.html.twig');
        $article_list = $this->getDoctrine()
                ->getRepository("BlogBundle:Article")
                ->findAll();// la liste des articles du blogs
        
        $i = 0;
        $tab_article =  Array();
        foreach ($article_list as $art){
            $i = $i + 1;
            $var_name = "article".$i;
            $tab_article[$var_name] = array(
                'titre'=> $art->getTitre(),
                'description' => $art->getdescription(),
                'contenu'=> $art->getContenu(),
                'publish_social'=> $art->getPublishSocial(),
                'tags' => $art->getTags()
            );// j'insere dans la liste ici
        }
        $json = json_encode($tab_article);
        
        $response = new JsonResponse();
        $response->setData($json);
        return $response;
    }
    
    /**
     * La route qui retourneun un article et ses commentaires
     * 
     * @Route("/article/{id}")
     */
    public function getArticle($id){
        return;
    }
    
    /**
     * Retourne un commentaire
     * 
     * @Route("/commentaire/{id}")
     */
    public function getComment($id){
        return;
    }
    
    /**
     * @Route("/newArticle")
     */
    public function addArticle(Request $request){
        $jresponse = new JsonResponse();
        if(!$request->isMethod("POST")){
            return $jresponse;
        }
        // the request processing here
        $article = new Article();
        
        $article->setContenu($request->request->get("contenu"));
        $article->setDescription($request->request->get("desc"));
        $article->setPublishSocial($request->request->get("publish"));
        $article->setTitre($request->request->get("title"));
        
        $em = $this->getDoctrine()->getManager();
        $em->persist($article);
        $em->flush();
        // must return an response JsonResponse
        
        $jresponse->headers->set("status", "good");
        return $jresponse;
    }
}
