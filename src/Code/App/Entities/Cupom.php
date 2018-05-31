<?php

namespace Code\App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="cupons")
 */
class Cupom
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
    private $codigo;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $cupom;

}
