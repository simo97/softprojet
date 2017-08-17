<?php 

namespace ProjectBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToMany ;
use Doctrine\ORM\Mapping\JoinTable ;
use Doctrine\ORM\Mapping\JoinColumn ;

/**
* 
* @ORM\Table(name="Utilisateur")
* @ORM\Entity
*/
class Utilisateur {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(type="string", length=50)
     */
    private $login;
    
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pass;
    
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $salt;
    
    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nom;
    
    /**
     * @ORM\Column(type="string", length=50)
     * 
     */
    private $prenom;
    
    /**
     * @ORM\Column(type="string", length=100)
     */
    private $mail;
    
    /**
     * @ORM\Column(type="integer", length=12)
     */
    private $telephone;
    
    /**
     * @ORM\ManyToOne(targetEntity="Service", inversedBy="utilisateurs")
     * @ORM\JoinColumn(name="service_id",referencedColumnName="id")
     */
    private $service;
    
    /**
     * // many ustilisateur has many phases
     * @ORM\ManyToMany(targetEntity="Phase", inversedBy="utilisateur")
     * @ORM\JoinTable(name="utilisateur_phase")
     
    private $phases;// la liste des phase du projet
     * 
     */
    
    /**
     * OneToMany ici 
       @ManyToMany(targetEntity="Status")
     * @JoinTable(name="utilisateur_status",
     *      joinColumns={@JoinColumn(name="utilisateur_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="status_id", referencedColumnName="id", unique=true)})
     
    private $status;*/
    
    /**
     *  @ORM\OneToOne(targetEntity="Role")
     * @ORM\JoinColumn(name="role_id", referencedColumnName="id")
     */
    private $role;
    
    /**
     * @ORM\ManyToMany(targetEntity="Projet", mappedBy="utilisateurs")
     */
    private $projets;

    /**
     * @ORM\OneToOne(targetEntity="Intervenant", mappedBy="utilisateur")
     * @ORM\JoinColumn(name="intervenant_id", referencedColumnName="id")
     */
    private $intervenant;

    public function __construct() {
        $this->phases = new \Doctrine\Common\Collections\ArrayCollection();
        $this->status = new \Doctrine\Common\Collections\ArrayCollection();
        $this->projets = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nom
     *
     * @param string $nom
     *
     * @return Utilisateur
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Utilisateur
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set mail
     *
     * @param string $mail
     *
     * @return Utilisateur
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set telephone
     *
     * @param integer $telephone
     *
     * @return Utilisateur
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return integer
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set service
     *
     * @param \ProjectBundle\Entity\Service $service
     *
     * @return Utilisateur
     */
    public function setService(\ProjectBundle\Entity\Service $service = null)
    {
        $this->service = $service;

        return $this;
    }

    /**
     * Get service
     *
     * @return \ProjectBundle\Entity\Service
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * Add phase
     *
     * @param \ProjectBundle\Entity\Phase $phase
     *
     * @return Utilisateur
     */
    public function addPhase(\ProjectBundle\Entity\Phase $phase)
    {
        $this->phases[] = $phase;

        return $this;
    }

    /**
     * Remove phase
     *
     * @param \ProjectBundle\Entity\Phase $phase
     */
    public function removePhase(\ProjectBundle\Entity\Phase $phase)
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
     * Add status
     *
     * @param \ProjectBundle\Entity\Status $status
     *
     * @return Utilisateur
     */
    public function addStatus(\ProjectBundle\Entity\Status $status)
    {
        $this->status[] = $status;

        return $this;
    }

    /**
     * Remove status
     *
     * @param \ProjectBundle\Entity\Status $status
     */
    public function removeStatus(\ProjectBundle\Entity\Status $status)
    {
        $this->status->removeElement($status);
    }

    /**
     * Get status
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set role
     *
     * @param \ProjectBundle\Entity\Role $role
     *
     * @return Utilisateur
     */
    public function setRole(\ProjectBundle\Entity\Role $role = null)
    {
        $this->role = $role;
        return $this;
    }

    /**
     * Get role
     *
     * @return \ProjectBundle\Entity\Role
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set login
     *
     * @param string $login
     *
     * @return Utilisateur
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set pass
     *
     * @param string $pass
     *
     * @return Utilisateur
     */
    public function setPass($pass)
    {
        $this->pass = $pass;

        return $this;
    }

    /**
     * Get pass
     *
     * @return string
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * Set salt
     *
     * @param string $salt
     *
     * @return Utilisateur
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get salt
     *
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Add projet
     *
     * @param \ProjectBundle\Entity\Projet $projet
     *
     * @return Utilisateur
     */
    public function addProjet(\ProjectBundle\Entity\Projet $projet)
    {
        $this->projets[] = $projet;

        return $this;
    }

    /**
     * Remove projet
     *
     * @param \ProjectBundle\Entity\Projet $projet
     */
    public function removeProjet(\ProjectBundle\Entity\Projet $projet)
    {
        $this->projets->removeElement($projet);
    }

    /**
     * Get projets
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProjets()
    {
        return $this->projets;
    }

    /**
     * Set intervenant
     *
     * @param \ProjectBundle\Entity\Intervenant $intervenant
     *
     * @return Utilisateur
     */
    public function setIntervenant(\ProjectBundle\Entity\Intervenant $intervenant = null)
    {
        $this->intervenant = $intervenant;

        return $this;
    }

    /**
     * Get intervenant
     *
     * @return \ProjectBundle\Entity\Intervenant
     */
    public function getIntervenant()
    {
        return $this->intervenant;
    }
}
