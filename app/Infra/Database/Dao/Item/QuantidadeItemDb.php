<?php

namespace App\Infra\Database\Dao\Item;

use Illuminate\Http\Request;
use App\Infra\Database\Config\DbBase;

class QuantidadeItemDb extends DbBase
{
    public function quantidadeItem(string $codigoBarra, int $quantidade, float $subTotal): bool
    {
      return $this->db
      ->table('venda_item_temporario')
      ->where('codigo_barra', $codigoBarra)
      ->update([
        'quantidade' => $quantidade,
        'sub_total'=> $subTotal
      ]);
    }
}
