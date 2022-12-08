<?php

namespace App\Infra\Repositories\MovimentarCaixa;

use App\Infra\Database\Dao\MovimentaCaixa\AbrirCaixaDb;
use App\Infra\Database\Dao\MovimentaCaixa\FecharCaixaDb;
use App\Infra\Database\Dao\MovimentaCaixa\RecuperarMovimentacaoDb;
use App\Infra\Database\Dao\Caixa\StatusCaixaDb;
use Illuminate\Http\Request;

class MovimentacaoRepository
{
    private AbrirCaixaDb $abrirCaixaDb;
    private FecharCaixaDb $fecharCaixaDb;
    private StatusCaixaDb $statusCaixaDb;
    private RecuperarMovimentacaoDb $recuperarMovimentacaoDb;
    private int $movimentacaoId;

    public function __construct
    (
        AbrirCaixaDb $abrirCaixaDb,
        FecharCaixaDb $fecharCaixaDb,
        StatusCaixaDb $statusCaixaDb,
        RecuperarMovimentacaoDb $recuperarMovimentacaoDb
    )
    {
        $this->abrirCaixaDb = $abrirCaixaDb;
        $this->fecharCaixaDb = $fecharCaixaDb;
        $this->statusCaixaDb = $statusCaixaDb;
        $this->recuperarMovimentacaoDb = $recuperarMovimentacaoDb;
    }

    public function abrirCaixa(Request $request): bool
    {
        $this->movimentacaoId = $this->abrirCaixaDb->abrirCaixa($request);
        $this->recuperarUltimaMovimentacao($this->movimentacaoId);
        $this->statusCaixa($request->caixa_id, $request->status);
        return true;
    }

    public function fecharCaixa(Request $request): bool
    {
        $movimentacaoId = session()->get('movimentacaoId');
        $this->fecharCaixaDb->fecharCaixa($request, $movimentacaoId);
        $this->statusCaixa($request->caixa_id, $request->status);
        return true;
    }

    private function recuperarUltimaMovimentacao($movimentacaoId): void
    {
        session()->put([
            'movimentacaoId' => $movimentacaoId
        ]);
    }

    private function statusCaixa(int $caixaId, string $status): void
    {
        if ($status === "Aberto"):
            $status = "Aberto";
            $this->statusCaixaDb->statusCaixa($caixaId, $status);
        elseif ($status === "Fechado"):
            $status = "Fechado";
            $this->statusCaixaDb->statusCaixa($caixaId, $status);
        endif;
    }

    public function recuperarMovimentacao(int $caixaId)
    {
        return $this->recuperarMovimentacaoDb->recuperarMovimentacao($caixaId);
    }
}
