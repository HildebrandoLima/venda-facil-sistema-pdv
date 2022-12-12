<?php

namespace App\Infra\Repositories\Caixa;

use App\Infra\Database\Dao\Caixa\ListarCaixaDb;
use App\Infra\Database\Dao\MovimentaCaixa\RecuperarSaldoAnteriorDb;
use App\Infra\Database\Dao\MovimentaCaixa\RecuperarMovimentacaoDb;

class CaixaRepository
{
    private ListarCaixaDb $listarCaixaDb;
    private RecuperarSaldoAnteriorDb $recuperarSaldoAnteriorDb;
    private RecuperarMovimentacaoDb $recuperarMovimentacaoDb;
    private $saldoAnterior;
    private $movimentacao;

    public function __construct
    (
        ListarCaixaDb $listarCaixaDb,
        RecuperarSaldoAnteriorDb $recuperarSaldoAnteriorDb,
        RecuperarMovimentacaoDb $recuperarMovimentacaoDb
    )
    {
        $this->listarCaixaDb = $listarCaixaDb;
        $this->recuperarSaldoAnteriorDb = $recuperarSaldoAnteriorDb;
        $this->recuperarMovimentacaoDb = $recuperarMovimentacaoDb;
    }

    public function buscarCaixa($caixaId)
    {
        $this->recuperarSaldoAnteior($caixaId);
        return $this->listarCaixaDb->getCaixa($caixaId);
    }

    private function recuperarSaldoAnteior($caixaId): void
    {
        $this->saldoAnterior = $this->recuperarSaldoAnteriorDb->recuperarSaldoAnterior($caixaId)->toArray()[0];
        session()->put([
            'saldoAnterior' => $this->saldoAnterior->saldoProximoDia,
        ]);
    }

    public function recuperarMovimentacao($caixaId)
    {
        $this->movimentacao = $this->recuperarMovimentacaoDb->recuperarMovimentacao($caixaId)->toArray();
        return $this->movimentacao;
    }
}
