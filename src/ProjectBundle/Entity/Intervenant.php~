<?php


namespace ProjectBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* 
* @ORM\Table(name="Intervenant")
* @ORM\Entity
*/
class Intervenant {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(type="string")
     */
    private $nom;
    
    /**
     * @ORM\Column(type="string")
     */
    private $email;
    
    /**
     * @ORM\Column(type="string")
     * 
     */
    private $telephone;
    
    /**
     * Le type d'intervenant
     * 
     * @ORM\ManyToOne(targetEntity="TypeIntervenant")
     * @ORM\JoinColumn(name="typeintervenant_id",referencedColumnName="id")
     */
    private $type;
    
    /**
     * @ORM\OneToOne(targetEntity="Projet",inversedBy="responsable")
     * @ORM\JoinColumn(name="projet_id", referencedColumnName="id")
     
    private $projet;
     */
    
    /**
     * @ORM\ManyToOne(targetEntity="Projet", inversedBy="intervenants")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
    private $projet;


 /**
     * @ORM\OneToOne(targetEntity="Utilisateur", mappedBy="intervenant")
     */
    private $utilisateur;

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
     * @return Intervenant
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
     * Set email
     *
     * @param string $email
     *
     * @return Intervenant
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set telephone
     *
     * @param integer $telephone
     *
     * @return Intervenant
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
     * Set type
     *
     * @param \ProjectBundle\Entity\TypeIntervenant $type
     *
     * @return Intervenant
     */
    public function setType(\ProjectBundle\Entity\TypeIntervenant $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \ProjectBundle\Entity\TypeIntervenant
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set utilisateur
     *
     * @param \ProjectBundle\Entity\Utilisateur $utilisateur
     *
     * @return Intervenant
     */
    public function setUtilisateur(\ProjectBundle\Entity\Utilisateur $utilisateur = null)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * Get utilisateur
     *
     * @return \ProjectBundle\Entity\Utilisateur
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }

    /**
     * Set projet
     *
     * @param \ProjectBundle\Entity\Projet $projet
     *
     * @return Intervenant
     */
    public function setProjet(\ProjectBundle\Entity\Projet $projet = null)
    {
        $this->projet = $projet;

        return $this;
    }

    /**
     * Get projet
     *
     * @return \ProjectBundle\Entity\Projet
     */
    public function getProjet()
    {
        return $this->projet;
    }
}
