<?php

namespace App\Infra\Repositories\Produto;

use App\Infra\Database\Dao\Produto\ListarProdutoDb;
use Illuminate\Http\Request;

class ProdutoRepository
{
    private ListarProdutoDb $listarProdutoDb;

    public function __construct
    (
        ListarProdutoDb $listarProdutoDb
    )
    {
        $this->listarProdutoDb = $listarProdutoDb;
    }

    public function bipagemProduto(Request $request)
    {
        return $this->listarProdutoDb->getProduto($request)->toArray()[0];
    }
}
