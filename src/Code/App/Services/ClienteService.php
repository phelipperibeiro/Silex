<?php

namespace Code\App\Services;

use Code\App\Entities\Cliente as ClienteEntity;
use Code\App\Entities\ClienteProfile as ClienteProfileEntity;
use Doctrine\ORM\EntityManager;

class ClienteService
{

    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function insert(array $data)
    {
        $clienteEntity = new ClienteEntity();
        $clienteEntity->setCliente($data['cliente']);
        $clienteEntity->setEmail($data['email']);

        if (isset($data['rg']) AND isset($data['cpf'])) {
            
            $clienteProfileEntity = new ClienteProfileEntity();
            $clienteProfileEntity->setCpf($data['cpf']);
            $clienteProfileEntity->setRg($data['rg']);
            $this->entityManager->persist($clienteProfileEntity);
            
            // Faz o relacionamento
            $clienteEntity->setProfile($clienteProfileEntity);
            
        }

        $this->entityManager->persist($clienteEntity);
        $this->entityManager->flush();

        return $clienteEntity;
    }

    public function update(array $data)
    {
        //$repository = $this->entityManager->getRepository("Code\App\Entities\Cliente");
        //$clienteEntity = $repository->find($data['id']);

        $clienteEntity = $this->entityManager->getReference("Code\App\Entities\Cliente", $data['id']);

        $clienteEntity->setCliente($data['cliente']);
        $clienteEntity->setEmail($data['email']);

        $this->entityManager->persist($clienteEntity);
        $this->entityManager->flush();

        return $clienteEntity;
    }

    public function fetchAll()
    {
        $repository = $this->entityManager->getRepository("Code\App\Entities\Cliente");
        return $repository->findAll();
    }

    public function find($id)
    {
        $repository = $this->entityManager->getRepository("Code\App\Entities\Cliente");
        //$repository->findBy(['cliente' => 'felipe' , 'email' => 'flp@movida.com.br']);
        //$repository->findByCliente('felipe');
        return $repository->find($id);
    }

    public function delete($id)
    {
        $clienteEntity = $this->entityManager->getReference("Code\App\Entities\Cliente", $data['id']);
        $this->entityManager->persist($clienteEntity);
        return true;
    }

}
