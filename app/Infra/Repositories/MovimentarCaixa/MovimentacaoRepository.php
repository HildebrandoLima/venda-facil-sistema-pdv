<?php

namespace App\Infra\Repositories\MovimentarCaixa;

use App\Infra\Database\Dao\MovimentaCaixa\AbrirCaixaDb;
use App\Infra\Database\Dao\MovimentaCaixa\FecharCaixaDb;
use App\Infra\Database\Dao\MovimentaCaixa\RecuperarMovimentacaoDb;
use App\Infra\Database\Dao\MovimentaCaixa\RecuperarSaldoAnteriorDb;
use App\Infra\Database\Dao\Caixa\StatusCaixaDb;
use Illuminate\Http\Request;

class MovimentacaoRepository
{
    private AbrirCaixaDb $abrirCaixaDb;
    private FecharCaixaDb $fecharCaixaDb;
    private StatusCaixaDb $statusCaixaDb;
    private RecuperarMovimentacaoDb $recuperarMovimentacaoDb;
    private RecuperarSaldoAnteriorDb $recuperarSaldoAnteriorDb;
    private int $movimentacaoId;

    public function __construct
    (
        AbrirCaixaDb $abrirCaixaDb,
        FecharCaixaDb $fecharCaixaDb,
        StatusCaixaDb $statusCaixaDb,
        RecuperarMovimentacaoDb $recuperarMovimentacaoDb,
        RecuperarSaldoAnteriorDb $recuperarSaldoAnteriorDb
    )
    {
        $this->abrirCaixaDb = $abrirCaixaDb;
        $this->fecharCaixaDb = $fecharCaixaDb;
        $this->statusCaixaDb = $statusCaixaDb;
        $this->recuperarMovimentacaoDb = $recuperarMovimentacaoDb;
        $this->recuperarSaldoAnteriorDb = $recuperarSaldoAnteriorDb;
    }

    public function abrirCaixa(Request $request): bool
    {
        $this->request = $request;
        $this->abrirCaixaa();
        $this->recuperarUltimaMovimentacao();
        $this->statusCaixa();
        return true;
    }

    private function abrirCaixaa(): int
    {
        $this->movimentacaoId = $this->abrirCaixaDb->abrirCaixa($this->request);
        return $this->movimentacaoId;
    }

    public function fecharCaixa(Request $request): bool
    {
        $this->request = $request;
        $movimentacaoId = session()->get('movimentacaoId');
        $this->fecharCaixaDb->fecharCaixa($request, $movimentacaoId);
        $this->statusCaixa();
        return true;
    }

    private function recuperarUltimaMovimentacao(): void
    {
        session()->put([
            'movimentacaoId' => $this->movimentacaoId
        ]);
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

    public function recuperarSaldoAnteior(int $caixaId)
    {
        return $this->recuperarSaldoAnteriorDb->recuperarSaldoAnterior($caixaId);
    }

    public function recuperarMovimentacao(int $caixaId)
    {
        return $this->recuperarMovimentacaoDb->recuperarMovimentacao($caixaId);
    }
}
