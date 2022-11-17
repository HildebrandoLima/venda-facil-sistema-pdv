<?php

namespace App\Infra\Repositorios\MovimentarCaixa;

use App\Infra\Database\Dao\MovimentaCaixa\AbrirCaixaDb;
use App\Infra\Database\Dao\Caixa\StatusCaixaDb; 
use Illuminate\Http\Request;

class MovimentacaoRepositorio
{
    private AbrirCaixaDb $abrirCaixaDb;
    private StatusCaixaDb $statusCaixaDb;

    public function __construct
    (
        AbrirCaixaDb $abrirCaixaDb,
        StatusCaixaDb $statusCaixaDb
    )
    {
        $this->abrirCaixaDb = $abrirCaixaDb;
        $this->statusCaixaDb = $statusCaixaDb;
    }

    public function abrirCaixa(Request $request): bool
    {
        $this->request = $request;
        $this->abrirCaixaa();
        $this->statusCaixa();
        return true;
    }

    private function abrirCaixaa(): void
    {
        $this->abrirCaixaDb->abrirCaixa($this->request);
    }

    private function statusCaixa(): void
    {
        $this->statusCaixaDb->statusCaixa($this->request);
    }
}
