<?php

namespace App\Infra\Database\Dao\Venda;

use Illuminate\Http\Request;
use App\Infra\Database\Config\DbBase;

class CriarVendaDb extends DbBase
{
  public function criarVenda(Request $request): int
  {
    return $this->db
    ->table('venda')
    ->insertGetId([
      'numero_venda' => random_int(100000000, 999999999),
      'quantidade' => $request->quantidade_item,
      'total' => $request->total,
      'caixa_id' => $request->caixa_id,
      'usuario_id' => $request->usuario_id ? $request->usuario_id : 0,
      'user_created_at' => $request->user_created_at,
      'created_at' => date("Y-m-d H:i:s")
    ]);
  }
}
