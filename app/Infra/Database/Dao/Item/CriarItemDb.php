<?php

namespace App\Infra\Database\Dao\Item;

use Illuminate\Http\Request;
use App\Infra\Database\Config\DbBase;
use App\Models\Item;

class CriarItemDb extends DbBase {

  public function criarItem($vendaId, $itens)
  {
    foreach ($itens as $i):
      $item = new Item();
      $item->nome = $i->nome;
      $item->preco = $i->preco;
      $item->codigo_barra = $i->codigo_barra;
      $item->quantidade = $i->quantidade;
      $item->unidade_medida = $i->unidade_medida;
      $item->valor_unitario = $i->valor_unitario;
      $item->sub_total = $i->sub_total;
      $item->valor_total = $i->valor_total;
      $item->venda_id = $vendaId;
      $item->user_created_at = $i->user_created_at;
      $item->created_at = date("Y-m-d H:i:s");
      $item->save();
    endforeach;
    return true;
  }
}
