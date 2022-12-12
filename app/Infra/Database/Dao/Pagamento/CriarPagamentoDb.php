<?php

namespace App\Infra\Database\Dao\Pagamento;

use Illuminate\Http\Request;
use App\Infra\Database\Config\DbBase;
use Illuminate\Support\Str;

class CriarPagamentoDb extends DbBase
{
  public function criarPagamento(Request $request): bool
  {
    return $this->db
    ->table('pagamento')
    ->insert([
        'codigo_transacao' => Str::uuid()->toString(),
        'tipo_transacao' => 1,
        'numero_cartao' => $request->numero_cartao,
        'data_credito' => $request->data_credito,
        'parcela' => $request->parcela,
        'valor_pago' => $request->valor_pago,
        'total' => $request->total,
        'troco' => $request->troco,
        'metodo_pagamento_id' => $request->metodo_pagamento_id,
        'identificador_metodo_pagamento_id' => $request->identificador_metodo_pagamento_id,
        'venda_id' => $request->venda_id,
        'user_created_at' => $request->user_created_at,
        'created_at' => date("Y-m-d H:i:s")
    ]);
  }
}
