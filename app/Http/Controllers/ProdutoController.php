<?php

namespace App\Http\Controllers;

use App\Infra\Repositorios\Produto\ProdutoRepositorio;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    private ProdutoRepositorio $produtoRepositorio;

    public function __construct
    (
        ProdutoRepositorio $produtoRepositorio
    )
    {
        $this->produtoRepositorio = $produtoRepositorio;
    }

    public function show(Request $request)
    {
        $itens = $this->produtoRepositorio->getProdutoCaixa($request);
        return view('venda', ['itens' => $itens]);
    }
}
