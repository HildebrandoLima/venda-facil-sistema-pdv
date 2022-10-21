<?php

namespace App\Infra\Repositores\Caixa;

use App\Infra\Database\Dao\Caixa\ListarCaixaDb;
use Illuminate\Http\Request;

class CaixaRepositore
{
    private ListarCaixaDb   $listarCaixaDb;

    public function __construct
    (
        ListarCaixaDb   $listarCaixaDb
    )
    {
        $this->listarCaixaDb    =   $listarCaixaDb;
    }

    public function getStatusCaixa()
    {
        return $this->listarCaixaDb->getStatusCaixa();
    }
}
