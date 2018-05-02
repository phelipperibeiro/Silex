<?php

namespace Code\App\Entities;

use Doctrine\ORM\EntityRepository;

class ClienteRepository extends EntityRepository
{

    public function getClientesOrdenados()
    {
        $this->createQueryBuilder("c") // criando da tabela alias
             ->orderBy("c.nome asc")
             ->getQuery()
             ->getResult();
    }

    public function getClientesDesc()
    {
        // doctrine query laguage
        $dql = "SELECT c FROM Code\App\Entities\Cliente c orden by c.nome desc";

        return $this->getEntityManager()->create($dql)->getResult();
    }

}
