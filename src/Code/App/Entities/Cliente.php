<?php

namespace Code\App\Entities;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="Code\App\Entities\ClienteRepository")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="clientes")
 */
class Cliente
{

    /**
     * @ORM\id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cliente;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\OneToOne(targetEntity="Code\App\Entities\ClienteProfile") 
     * @ORM\JoinColumn(name="cliente_profile", referencedColumnName="id")
     */
    private $profile;

    /**
     * @ORM\ManyToOne(targetEntity="Code\App\Entities\Cupom") 
     * @ORM\JoinColumn(name="cupom_id", referencedColumnName="id")
     */
    private $cupom;

    /**
     * @ORM\ManyToMany(targetEntity="Code\App\Entities\Interesse") 
     * @ORM\JoinTable(name="clientes_interesses",
     *      joinColumns={@ORM\JoinColumn(name="cliente_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="interesse_id", referencedColumnName="id")}, 
     *      )    
     */
    private $interesses;
    
    
    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;
    

    public function __construct()
    {
        $this->interesses = new ArrayCollection();
    }
    
    /**
     * @ORM\PrePersist
     */
    public function setupDate()
    {        
        $this->created_at = new \DateTime();
    }

    function getId()
    {
        return $this->id;
    }

    function getCliente()
    {
        return $this->cliente;
    }

    function getEmail()
    {
        return $this->email;
    }

    public function getProfile()
    {
        return $this->profile;
    }

    public function getCupom()
    {
        return $this->cupom;
    }

    public function getInteresses()
    {
        return $this->interesses;
    }

    function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setProfile($profile)
    {
        $this->profile = $profile;
        return $this;
    }

    function setCliente($cliente)
    {
        $this->cliente = $cliente;
        return $this;
    }

    function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }
    
    public function setCupom($cupom)
    {
        $this->cupom = $cupom;
        return $this;
    }

    public function addInteresse($interesse)
    {
        $this->interesses->add($interesse);
        return $this;
    }
    
}
