<?php

namespace Code\App\Entities;

class Cliente
{
    private $id;

    private $cliente;
    
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
