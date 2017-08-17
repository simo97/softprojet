<?php 

namespace ProjectBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Responsable ou administrateur ou participant
* 
* @ORM\Table(name="Role")
* @ORM\Entity
*/
class Role {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(type="string", length=50)
     */
    private $intuler;

    

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
     * Set intuler
     *
     * @param string $intuler
     *
     * @return Role
     */
    public function setIntuler($intuler)
    {
        $this->intuler = $intuler;

        return $this;
    }

    /**
     * Get intuler
     *
     * @return string
     */
    public function getIntuler()
    {
        return $this->intuler;
    }
}
