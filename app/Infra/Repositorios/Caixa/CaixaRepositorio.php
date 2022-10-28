<?php

namespace App\Infra\Repositorios\Caixa;

use App\Infra\Database\Dao\Caixa\ListarCaixaDb;
use Illuminate\Http\Request;

class CaixaRepositorio
{
    private ListarCaixaDb $listarCaixaDb;

    public function __construct
    (
        ListarCaixaDb $listarCaixaDb
    )
    {
        $this->listarCaixaDb = $listarCaixaDb;
    }

    public function getCaixa()
    {
        return $this->listarCaixaDb->getCaixa();
    }
}
