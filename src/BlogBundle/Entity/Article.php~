<?php 

namespace BlogBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection ;
use Doctrine\ORM\Mapping as ORM;

/**
*   
*@ORM\Table(name="Article")
*@ORM\Entity
**/
class Article {
    /**
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(type="string", length=50)
     */
    private $titre;
    
    /**
     * @ORM\Column(type="string", length=150)
     */
    private $description;
    
    /**
     *
     * @ORM\Column(type="text")
     */
    private $contenu;
    
    /**
     * @ORM\Column(type="boolean")
     */
    private $publish_social;
    
    /**
     * @ORM\ManyToMany(targetEntity="Tag" ,inversedBy="articles")
     * @ORM\JoinTable(name="article_tag")
     */
    private $tags;
    
    /**
     *
     * @ORM\OneToMany(targetEntity="Commentaires", mappedBy="article")
     */
    private $commentaires;
    
    public function __construct() {
        $this->commentaires = new ArrayCollection(); // la liste des commentaires
        $this->tags = new ArrayCollection(); // la liste des tags de l'article
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Article
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Article
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     *
     * @return Article
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set publishSocial
     *
     * @param \DateTime $publishSocial
     *
     * @return Article
     */
    public function setPublishSocial($publishSocial)
    {
        $this->publish_social = $publishSocial;

        return $this;
    }

    /**
     * Get publishSocial
     *
     * @return \DateTime
     */
    public function getPublishSocial()
    {
        return $this->publish_social;
    }

    /**
     * Add tag
     *
     * @param \BlogBundle\Entity\Tag $tag
     *
     * @return Article
     */
    public function addTag(\BlogBundle\Entity\Tag $tag)
    {
        $this->tags[] = $tag;

        return $this;
    }

    /**
     * Remove tag
     *
     * @param \BlogBundle\Entity\Tag $tag
     */
    public function removeTag(\BlogBundle\Entity\Tag $tag)
    {
        $this->tags->removeElement($tag);
    }

    /**
     * Get tags
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Add commentaire
     *
     * @param \BlogBundle\Entity\Commentaires $commentaire
     *
     * @return Article
     */
    public function addCommentaire(\BlogBundle\Entity\Commentaires $commentaire)
    {
        $this->commentaires[] = $commentaire;

        return $this;
    }

    /**
     * Remove commentaire
     *
     * @param \BlogBundle\Entity\Commentaires $commentaire
     */
    public function removeCommentaire(\BlogBundle\Entity\Commentaires $commentaire)
    {
        $this->commentaires->removeElement($commentaire);
    }

    /**
     * Get commentaires
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommentaires()
    {
        return $this->commentaires;
    }
}
