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
        $this->cliente->setCliente($data['cliente']);
        $this->cliente->setEmail($data['email']);

        return $this->clienteMapper->insert($this->cliente);
    }

    public function update(array $data)
    {
        $this->cliente->setId($data['id']);
        $this->cliente->setCliente($data['cliente']);
        $this->cliente->setEmail($data['email']);
        
        return $this->clienteMapper->update($this->cliente);
    }

    public function fetchAll()
    {
        return $this->clienteMapper->fetchAll();
    }

    public function find($id)
    {
        return $this->clienteMapper->find($id);
    }
    
    public function delete($id)
    {
        return $this->clienteMapper->delete($id);
    }

}
