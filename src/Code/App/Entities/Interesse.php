<?php

namespace Code\App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="interesses")
 */
class Interesse
{
    /**
     * @ORM\id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;
    
     /**
     * @ORM\Column(type="string", length=255)
     */
    private $nome;
    
    
    
}
