<?php

namespace App\Infra\Repositorios\MovimentarCaixa;

use App\Infra\Database\Dao\MovimentaCaixa\AbrirCaixaDb;
use App\Infra\Database\Dao\MovimentaCaixa\FecharCaixaDb;
use App\Infra\Database\Dao\Caixa\StatusCaixaDb; 
use Illuminate\Http\Request;

class MovimentacaoRepositorio
{
    private AbrirCaixaDb $abrirCaixaDb;
    private FecharCaixaDb $fecharCaixaDb;
    private StatusCaixaDb $statusCaixaDb;

    public function __construct
    (
        AbrirCaixaDb $abrirCaixaDb,
        FecharCaixaDb $fecharCaixaDb,
        StatusCaixaDb $statusCaixaDb
    )
    {
        $this->abrirCaixaDb = $abrirCaixaDb;
        $this->fecharCaixaDb = $fecharCaixaDb;
        $this->statusCaixaDb = $statusCaixaDb;
    }

    public function abrirCaixa(Request $request): bool
    {
        $this->request = $request;
        $this->abrirCaixaa();
        $this->statusCaixa();
        return true;
    }

    public function fecharCaixa(Request $request): bool
    {
        $this->request = $request;
        $this->fecharCaixaa();
        $this->statusCaixa();
        return true;
    }

    private function abrirCaixaa(): void
    {
        $this->abrirCaixaDb->abrirCaixa($this->request);
    }

    private function fecharCaixaa(): void
    {   
        $this->fecharCaixaDb->fecharCaixa($this->request);
    }

    private function statusCaixa(): void
    {
        $caixaId = $this->request->caixa_id;
        if($this->request->status === "Aberto"):
            $status = "Aberto";
            $this->statusCaixaDb->statusCaixa($caixaId, $status);
        endif;
        $status = "Fechado";
        $this->statusCaixaDb->statusCaixa($caixaId, $status);  
    }
}
