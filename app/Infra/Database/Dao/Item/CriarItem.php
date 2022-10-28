<?php

namespace App\Infra\Database\Dao\Item;

use Illuminate\Http\Request;
use App\Infra\Database\Config\DbBase;

class CriarItemDb extends DbBase {

  public function criarItem(Request $request)
  {
    return $this->db
    ->table('item')
    ->insert([
        'nome' => $request->nome,
        'preco' => $request->preco,
        'codigo_barra' => $request->codigo_barra,
        'descricao' => $request->descricao,
        'quantidade' => $request->quantidade,
        'unidade_medida' => $request->unidade_medida,
        'venda_id' => $request->venda_id,
        'user_created_at' => $request->user_created_at,
        //'user_updated_at' => date("Y-m-d H:i:s"),
        'created_at' => date("Y-m-d H:i:s"),
        //'updated_at' => date("Y-m-d H:i:s")
    ]);
  }
}
