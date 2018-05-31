<?php

namespace Code\App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="clientes_profile")
 */
class ClienteProfile
{

    /**
     * @ORM\id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $cpf;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $rg;

    public function getId()
    {
        return $this->id;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function getRg()
    {
        return $this->rg;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
        return $this;
    }

    public function setRg($rg)
    {
        $this->rg = $rg;
        return $this;
    }

}
