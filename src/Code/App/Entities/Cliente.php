<?php

namespace Code\App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Code\App\Entities\ClienteRepository")
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

}
