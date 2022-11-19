<?php

namespace App\Infra\Repository\Caixa;

use App\Infra\Database\Dao\Caixa\ListarCaixaDb;

class CaixaRepository
{
    private ListarCaixaDb $listarCaixaDb;

    public function __construct
    (
        ListarCaixaDb $listarCaixaDb
    )
    {
        $this->listarCaixaDb = $listarCaixaDb;
    }

    public function buscaCaixa()
    {
        return $this->listarCaixaDb->getCaixa();
    }
}
