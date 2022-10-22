<?php

namespace App\Infra\Repositorios\Produto;

use App\Infra\Database\Dao\Produto\ListarProdutoDb;
use Illuminate\Http\Request;

class ProdutoRepositorio
{
    private ListarProdutoDb $listarProdutoDb;

    public function __construct
    (
        ListarProdutoDb $listarProdutoDb
    )
    {
        $this->listarProdutoDb = $listarProdutoDb;
    }

    public function getProdutoCaixa(Request $request)
    {
        return $this->listarProdutoDb->getProdutoCaixa($request);
    }
}
