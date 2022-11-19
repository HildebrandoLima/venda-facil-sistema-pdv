<?php

namespace App\Infra\Database\Dao\Pagamento;

use Illuminate\Http\Request;
use App\Infra\Database\Config\DbBase;

class CriarPagamentoDb extends DbBase
{
  public function criarPagamento(Request $request): bool
  {
    return $this->db
    ->table('pagamento')
    ->insert([
        'cartao' => isset($request->numero_cartao) ? '1' : '0',
        'forma_pagamento' => $request->forma_pagamento,
        'numero_cartao' => $request->numero_cartao,
        'data_vencimento' => $request->data_vencimento,
        'parcela' => $request->parcela,
        'valor_pago' => isset($request->valor_pago) ? $request->valor_pago : 0,
        'total' => $request->total,
        'troco' => $request->troco,
        'venda_id' => $request->venda_id,
        'user_created_at' => $request->user_created_at,
        'created_at' => date("Y-m-d H:i:s")
    ]);
  }
}
