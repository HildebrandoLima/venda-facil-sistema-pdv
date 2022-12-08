<?php

namespace App\Infra\Database\Dao\MovimentaCaixa;

use Illuminate\Http\Request;
use App\Infra\Database\Config\DbBase;

class FecharCaixaDb extends DbBase {
    public function fecharCaixa(Request $request, int $movimentacaoId)
    {
        return $this->db
        ->table('movimentacao')
        ->where('id', $movimentacaoId)
        ->update([
            'data_fechamento' => date("Y-m-d H:i:s"),
            'saldo_final' => $request->saldo_final,
            'total_venda' => $request->total_venda,
            'total_venda_real' => $request->total_venda_real,
            'total_sangria' => $request->total_sangria,
            'total_sangria_real' => $request->total_sangria_real,
            'devolucao' => $request->devolucao,
            'devolucao_real' => $request->devolucao_real,
            'troca' => $request->troca,
            'troca_real' => $request->troca_real,
            'total_venda_dinheiro' => $request->total_venda_dinheiro,
            'total_venda_dinheiro_real' => $request->total_venda_dinheiro_real,
            'total_venda_pix' => $request->total_venda_pix,
            'total_venda_pix_real' => $request->total_venda_pix_real,
            'total_venda_cartao_credito' => $request->total_venda_cartao_credito,
            'total_venda_cartao_credito_real' => $request->total_venda_cartao_credito_real,
            'total_venda_cartao_debito' => $request->total_venda_cartao_debito,
            'total_venda_cartao_debito_real' => $request->total_venda_cartao_debito_real,
            'saldo_atual' => $request->saldo_atual,
            'saldo_proximo_dia' => $request->saldo_proximo_dia
        ]);
    }
}
