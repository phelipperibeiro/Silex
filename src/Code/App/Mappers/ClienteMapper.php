<?php

namespace Code\App\Mappers;

use Code\App\Entities\Cliente;

class ClienteMapper
{

    private $dados = [
        ['id' => 1, 'nome' => 'Cliente XPTO', 'email' => 'cliente_xpto@htomail.com'],
        ['id' => 2, 'nome' => 'Cliente XPTH', 'email' => 'cliente_xpth@htomail.com'],
        ['id' => 3, 'nome' => 'Cliente XPTY', 'email' => 'cliente_xpty@htomail.com'],
        ['id' => 4, 'nome' => 'Cliente XPTX', 'email' => 'cliente_xptX@htomail.com'],
        ['id' => 5, 'nome' => 'Cliente XPTW', 'email' => 'cliente_xptw@htomail.com'],
        ['id' => 6, 'nome' => 'Cliente XPTA', 'email' => 'cliente_xpta@htomail.com'],
        ['id' => 7, 'nome' => 'Cliente XPTB', 'email' => 'cliente_xptb@htomail.com'],
        ['id' => 8, 'nome' => 'Cliente XPTC', 'email' => 'cliente_xptc@htomail.com'],
    ];

    public function insert(Cliente $cliente)
    {
        return [
            'sucess' => 'true'
        ];
    }

    public function update(Cliente $cliente)
    {
        return [
            'sucess' => 'true'
        ];
    }

    public function delete($id)
    {
        return [
            'sucess' => 'true'
        ];
    }

    public function find($id)
    {
        foreach ($this->dados as $key => $dado) {
            if (isset($dado['id']) && $dado['id'] == $id) {
                return $dado;
            }
        }

        return [];
    }

    public function fetchAll()
    {
        return $this->dados;
    }

}
