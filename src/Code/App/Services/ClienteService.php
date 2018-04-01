<?php

namespace Code\App\Services;

use Code\App\Mappers\ClienteMapper;
use Code\App\Entities\Cliente;

class ClienteService
{

    private $cliente;
    private $clienteMapper;

    public function __construct(Cliente $cliente, ClienteMapper $clienteMapper)
    {
        $this->cliente = $cliente;
        $this->clienteMapper = $clienteMapper;
    }

    public function insert(array $data)
    {
        $this->cliente->setCliente($data['nome']);
        $this->cliente->setEmail($data['email']);

        return $this->clienteMapper->insert($this->cliente);
    }

    public function fetchAll()
    {
        return $this->clienteMapper->fetchAll();
    }

}
