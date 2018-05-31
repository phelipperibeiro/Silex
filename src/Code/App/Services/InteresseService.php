<?php

namespace Code\App\Services;

use Code\App\Entities\Interesse as InteresseEntity;
use Doctrine\ORM\EntityManager;

class InteresseService
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function insert(array $data)
    {
        $interesseEntity = new InteresseEntity();
        $interesseEntity->setNome($data['nome']);

        $this->entityManager->persist($interesseEntity);
        $this->entityManager->flush();

        return $interesseEntity;
    }

}
