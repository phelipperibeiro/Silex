<?php

namespace Code\App\Entities;

use Doctrine\ORM\EntityRepository;

class ClienteRepository extends EntityRepository
{

    public function getClientesOrdenados()
    {
        $this
            ->createQueryBuilder("c") // criando da tabela alias
            ->orderBy("c.nome asc")
            ->getQuery()
            ->getResult();
    }

}
