<?php

namespace App\Infra\Database\Dao\MovimentaCaixa;

use Illuminate\Http\Request;
use App\Infra\Database\Config\DbBase;

class AbrirCaixaDb extends DbBase {
    public function abrirCaixa(Request $request): int
    {
        return $this->db
        ->table('movimentacao')
        ->insertGetId([
            'data_abertura' => date("Y-m-d H:i:s"),
            'data_fechamento' => date("Y-m-d H:i:s"),
            'saldo_inicial' => $request->saldo_inicial,
            'saldo_final' => 0,
            'total_venda' => 0,
            'total_venda_real' => 0,
            'total_sangria' => 0,
            'total_sangria_real' => 0,
            'devolucao' => 0,
            'devolucao_real' => 0,
            'troca' => 0,
            'troca_real' => 0,
            'total_venda_dinheiro' => 0,
            'total_venda_dinheiro_real' => 0,
            'total_venda_pix' => 0,
            'total_venda_pix_real' => 0,
            'total_venda_cartao_credito' => 0,
            'total_venda_cartao_credito_real' => 0,
            'total_venda_cartao_debito' => 0,
            'total_venda_cartao_debito_real' => 0,
            'saldo_atual' => 0,
            'saldo_proximo_dia' => 0,
            'caixa_id' => $request->caixa_id,
            'user_created_at' => $request->user_created_at,
            'created_at' => date("Y-m-d H:i:s")
        ]);
    }
}
