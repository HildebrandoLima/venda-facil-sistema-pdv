<?php

namespace App\Infra\Database\Dao\Produto;

use Illuminate\Http\Request;
use App\Infra\Database\Config\DbBase;

class ListarProdutoDb extends DbBase {

  public function getProdutoCaixa($codigo_barra)
  {
    $a = $this->db
    ->table('produto')
    ->select([
        'id',
        'nome',
        'preco',
        'codigo_barra',
        'imagem'
    ])
    ->where('codigo_barra', $codigo_barra)
    ->get();

    if($codigo_barra > 0):
      $a->whereIn('codigo_barra', $codigo_barra);
    endif;

    return $a;
  }

  public function getProdutoFind(Request $request)
  {
    return $this->db
    ->table('produto')
    ->select([
        'id',
        'nome',
        'preco',
        'codigo_barra',
        'imagem'
    ])
    ->where('id', $request->produto_id)
    ->get();
  }
}
