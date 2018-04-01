<?php

namespace Code\App\Mappers;

use Code\App\Entities\Cliente;

class ClienteMapper
{

    public function insert(Cliente $cliente)
    {
        return [
            'nome' => 'Cliente X',
            'email' => 'cliente@hotmail.com'
        ];
    }

    public function fetchAll()
    {
        $dados[0]['nome'] = "Cliente XPTO";
        $dados[0]['email'] = "cliente_xpto@htomail.com";

        $dados[1]['nome'] = "Cliente XPTH";
        $dados[1]['email'] = "cliente_xpth@htomail.com";

        $dados[2]['nome'] = "Cliente XPTY";
        $dados[2]['email'] = "cliente_xpty@htomail.com";

        $dados[3]['nome'] = "Cliente XPTX";
        $dados[3]['email'] = "cliente_xptx@htomail.com";

        $dados[4]['nome'] = "Cliente XPTW";
        $dados[4]['email'] = "cliente_xptw@htomail.com";

        return $dados;
    }

}
