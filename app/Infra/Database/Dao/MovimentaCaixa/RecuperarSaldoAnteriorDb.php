<?php

namespace App\Infra\Database\Dao\MovimentaCaixa;

use App\Infra\Database\Config\DbBase;

class RecuperarSaldoAnteriorDb extends DbBase
{
    public function recuperarSaldoAnterior(int $caixaId)
    {
        return $this->db
        ->table('movimentacao as m')
        ->join('caixa as c', 'c.id', '=', 'm.caixa_id')
        ->select(['m.saldo_proximo_dia as saldoProximoDia'])
        ->where('c.id', $caixaId)
        ->orderByDesc('m.id')
        ->limit(1)
        ->get();
    }
}
