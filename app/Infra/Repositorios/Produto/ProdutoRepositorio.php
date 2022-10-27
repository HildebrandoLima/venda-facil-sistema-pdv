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

    public function getProdutoCaixa($codigo_barra)
    {
        return $this->listarProdutoDb->getProdutoCaixa($codigo_barra);
    }

    public function getProdutoFind(Request $request)
    {
        return $this->listarProdutoDb->getProdutoFind($request->produto_id);
    }
}
