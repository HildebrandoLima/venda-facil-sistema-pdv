<?php

namespace App\Infra\Repository\MovimentarCaixa;

use App\Infra\Database\Dao\MovimentaCaixa\AbrirCaixaDb;
use App\Infra\Database\Dao\MovimentaCaixa\FecharCaixaDb;
use App\Infra\Database\Dao\MovimentaCaixa\ListarUltimaMovimentacaoDb;
use App\Infra\Database\Dao\Caixa\StatusCaixaDb;
use Illuminate\Http\Request;

class MovimentacaoRepository
{
    private AbrirCaixaDb $abrirCaixaDb;
    private FecharCaixaDb $fecharCaixaDb;
    private StatusCaixaDb $statusCaixaDb;
    private ListarUltimaMovimentacaoDb $listarUltimaMovimentacaoDb;
    private int $movimentacaoId;

    public function __construct
    (
        AbrirCaixaDb $abrirCaixaDb,
        FecharCaixaDb $fecharCaixaDb,
        StatusCaixaDb $statusCaixaDb,
        ListarUltimaMovimentacaoDb $listarUltimaMovimentacaoDb
    )
    {
        $this->abrirCaixaDb = $abrirCaixaDb;
        $this->fecharCaixaDb = $fecharCaixaDb;
        $this->statusCaixaDb = $statusCaixaDb;
        $this->listarUltimaMovimentacaoDb = $listarUltimaMovimentacaoDb;
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
        $this->recuperarUltimaMovimentacao();
        $this->fecharCaixaa();
        $this->statusCaixa();
        return true;
    }

    private function abrirCaixaa(): void
    {
        $this->abrirCaixaDb->abrirCaixa($this->request);
    }

    private function recuperarUltimaMovimentacao(): int
    {
        $this->movimentacaoId = $this->listarUltimaMovimentacaoDb->listarUltimaMovimentacao();
        return $this->movimentacaoId;
    }

    private function fecharCaixaa(): void
    {   
        $this->fecharCaixaDb->fecharCaixa($this->request, $this->movimentacaoId);
    }

    private function statusCaixa(): void
    {
        $caixaId = $this->request->caixa_id;
        if ($this->request->status === "Aberto"):
            $status = "Aberto";
            $this->statusCaixaDb->statusCaixa($caixaId, $status);
        elseif ($this->request->status === "Fechado"):
            $status = "Fechado";
            $this->statusCaixaDb->statusCaixa($caixaId, $status);
        endif;
    }
}
