<?php 

namespace ProjectBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\ManyToMany ;
use Doctrine\ORM\Mapping\JoinTable ;
use Doctrine\ORM\Mapping\JoinColumn ;

/**
* 
* @ORM\Table(name="Projet")
* @ORM\Entity
*/
class Projet {
    /**
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
     * @ORM\Column(type="text")
     */
    private $intitule;
    
    /**
     * @ORM\Column(type="date")
     * 
     */
    private $dateDebut;
    
    /**
     * @ORM\Column(type="date")
     */
    private $dateFin;
    
    /**
     * @ORM\Column(type="integer")
     */
    private $cout;
    
    /**
     * // one projet have many phase
     *  @ORM\OneToMany(targetEntity="Projet", mappedBy="parent")
     * 
     * la liste des phases du projets les sous projet
     */
    private $phases;// la liste des phase du projet
    
    
    /**
     *  @ORM\ManyToOne(targetEntity="Projet", inversedBy="phases")
     *  @joinColumn(name="parent_id", referencedColumnName="id")
     */
    private $parent;
    
    /**
     * @ORM\Column(type="boolean")
     */
    private $close;
  
    /**
     * @ORM\OneToOne(targetEntity="Intervenant", mappedBy="projet")
     
    private $responsable;// type utilisateur*/
    
    /**
     * One projet has many intervenant ( parmi ces intervenant il ya le responsable
     * @ORM\OneToMany(targetEntity="Intervenant", mappedBy="projet",cascade={"persist"})
     */
    private $intervenants;
    
    /**
     * @ORM\ManyToMany(targetEntity="Utilisateur",inversedBy="projet")
     * @ORM\JoinTable(name="projet_user")
     */
    private $utilisateurs;
    
    
    public function __construct() {
        $this->phases = new ArrayCollection();
        $this->utilisateur = new ArrayCollection();
        $this->intervenants = new ArrayCollection();
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
     * @return Projet
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
     * Set intitule
     *
     * @param string $intitule
     *
     * @return Projet
     */
    public function setIntitule($intitule)
    {
        $this->intitule = $intitule;

        return $this;
    }

    /**
     * Get intitule
     *
     * @return string
     */
    public function getIntitule()
    {
        return $this->intitule;
    }

    /**
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     *
     * @return Projet
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return \DateTime
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     *
     * @return Projet
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set cout
     *
     * @param integer $cout
     *
     * @return Projet
     */
    public function setCout($cout)
    {
        $this->cout = $cout;

        return $this;
    }

    /**
     * Get cout
     *
     * @return integer
     */
    public function getCout()
    {
        return $this->cout;
    }

    /**
     * Set close
     *
     * @param boolean $close
     *
     * @return Projet
     */
    public function setClose($close)
    {
        $this->close = $close;

        return $this;
    }

    /**
     * Get close
     *
     * @return boolean
     */
    public function getClose()
    {
        return $this->close;
    }

    /**
     * Add phase
     *
     * @param \ProjectBundle\Entity\Projet $phase
     *
     * @return Projet
     */
    public function addPhase(\ProjectBundle\Entity\Projet $phase)
    {
        $this->phases[] = $phase;

        return $this;
    }

    /**
     * Remove phase
     *
     * @param \ProjectBundle\Entity\Projet $phase
     */
    public function removePhase(\ProjectBundle\Entity\Projet $phase)
    {
        $this->phases->removeElement($phase);
    }

    /**
     * Get phases
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPhases()
    {
        return $this->phases;
    }

    /**
     * Set parent
     *
     * @param \ProjectBundle\Entity\Projet $parent
     *
     * @return Projet
     */
    public function setParent(\ProjectBundle\Entity\Projet $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \ProjectBundle\Entity\Projet
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Add intervenant
     *
     * @param \ProjectBundle\Entity\Intervenant $intervenant
     *
     * @return Projet
     */
    public function addIntervenant(\ProjectBundle\Entity\Intervenant $intervenant)
    {
        $this->intervenants[] = $intervenant;

        return $this;
    }

    /**
     * Remove intervenant
     *
     * @param \ProjectBundle\Entity\Intervenant $intervenant
     */
    public function removeIntervenant(\ProjectBundle\Entity\Intervenant $intervenant)
    {
        $this->intervenants->removeElement($intervenant);
    }

    /**
     * Get intervenants
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIntervenants()
    {
        return $this->intervenants;
    }

    /**
     * Add utilisateur
     * Celui qui a cree le projet
     *
     * @param \ProjectBundle\Entity\Utilisateur $utilisateur
     *
     * @return Projet
     */
    public function addUtilisateur(\ProjectBundle\Entity\Utilisateur $utilisateur)
    {
        $this->utilisateurs[] = $utilisateur;

        return $this;
    }

    /**
     * Remove utilisateur
     *
     * @param \ProjectBundle\Entity\Utilisateur $utilisateur
     */
    public function removeUtilisateur(\ProjectBundle\Entity\Utilisateur $utilisateur)
    {
        $this->utilisateurs->removeElement($utilisateur);
    }

    /**
     * Get utilisateurs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUtilisateurs()
    {
        return $this->utilisateurs;
    }
}
