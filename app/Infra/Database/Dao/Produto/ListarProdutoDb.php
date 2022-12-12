<?php

namespace App\Infra\Database\Dao\Produto;

use Illuminate\Http\Request;
use App\Infra\Database\Config\DbBase;

class ListarProdutoDb extends DbBase
{
  public function getProduto(Request $request)
  {
    return $this->db
    ->table('produto')
    ->select(['id', 'nome', 'preco_venda', 'codigo_barra', 'descricao', 'imagem', 'unidade_medida'])
    ->where('codigo_barra', $request->codigo_barra)
    ->get();
  }
}
