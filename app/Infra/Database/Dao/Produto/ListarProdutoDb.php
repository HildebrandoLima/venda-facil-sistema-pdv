<?php

namespace App\Infra\Database\Dao\Produto;

use Illuminate\Http\Request;
use App\Infra\Database\Config\DbBase;

class ListarProdutoDb extends DbBase {

  public function getProduto($codigo_barra)
  {
    return $this->db
    ->table('produto')
    ->select([
        'nome',
        'preco',
        'codigo_barra',
        'imagem',
        'unidade_medida'
    ])
    ->where('codigo_barra', $codigo_barra)
    ->get();
  }
}
