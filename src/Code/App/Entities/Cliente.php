<?php

namespace Code\App\Entities;

class Cliente
{

    private $cliente;
    private $email;

    function getCliente()
    {
        return $this->cliente;
    }

    function getEmail()
    {
        return $this->email;
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
