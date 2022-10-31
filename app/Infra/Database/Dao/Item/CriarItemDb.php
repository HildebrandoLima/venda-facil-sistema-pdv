<?php

namespace App\Infra\Database\Dao\Item;

use Illuminate\Http\Request;
use App\Infra\Database\Config\DbBase;

class CriarItemDb extends DbBase {

  public function criarItem(Request $request, array $itens, int $vendaId): bool
  {
    foreach ($itens as $item):
      $this->db
      ->table('item')
      ->insert([
        'nome' => $item->nome,
        'preco' => $item->preco,
        'codigo_barra' => $item->codigo_barra,
        'quantidade' => $request->quantidade,
        'sub_total' => $request->sub_total,
        'total' => $request->total,
        'unidade_medida' => $item->unidade_medida,
        'venda_id' => $vendaId,
        'produto_id' => $request->produto_id,
        'user_created_at' => $request->user_created_at,
        'created_at' => date("Y-m-d H:i:s")
      ]);
    endforeach;
    return true;
  }
}
