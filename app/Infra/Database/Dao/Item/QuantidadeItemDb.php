<?php

namespace App\Infra\Database\Dao\Item;

use Illuminate\Http\Request;
use App\Infra\Database\Config\DbBase;

class QuantidadeItemDb extends DbBase
{
    public function quantidadeItem(Request $request, $quantidade, $subtotal): bool
    {
      return $this->db
      ->table('venda_item_temporario')
      ->where('codigo_barra', $request->codigo_barra)
      ->update([
        'quantidade' => $quantidade,
        'sub_total'=> $subtotal
      ]);
    }
}
