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

    function setId($id)
    {
        $this->id = $id;
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
