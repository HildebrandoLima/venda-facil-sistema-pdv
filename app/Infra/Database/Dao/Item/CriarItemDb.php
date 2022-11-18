<?php

namespace App\Infra\Database\Dao\Item;

use App\Infra\Database\Config\DbBase;

class CriarItemDb extends DbBase
{
  public function criarItem(array $itens, int $vendaId, int $userCreatedAt): bool
  {
    foreach ($itens as $item):
      $this->db
      ->table('item')
      ->insert([
        'nome' => $item->nome,
        'preco' => $item->preco,
        'codigo_barra' => $item->codigo_barra,
        'quantidade' => $item->quantidade,
        'sub_total' => $item->sub_total,
        'unidade_medida' => $item->unidade_medida,
        'venda_id' => $vendaId,
        'produto_id' => 1,
        'user_created_at' => $userCreatedAt,
        'created_at' => date("Y-m-d H:i:s")
      ]);
    endforeach;
    return true;
  }
}
