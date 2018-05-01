<?php

namespace Code\App\Services;

use Code\App\Entities\Cliente as ClienteEntity;
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
        return $repository->find($id);
    }

    public function delete($id)
    {
        $clienteEntity = $this->entityManager->getReference("Code\App\Entities\Cliente", $data['id']);
        $this->entityManager->persist($clienteEntity);
        return true;
    }

}
