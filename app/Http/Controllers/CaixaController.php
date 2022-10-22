<?php

namespace App\Http\Controllers;

use App\Infra\Repositorios\Caixa\CaixaRepositorio;
use App\Infra\Repositorios\Produto\ProdutoRepositorio;
use Illuminate\Http\Request;

class CaixaController extends Controller
{
    private CaixaRepositorio $caixaRepositorio;
    private ProdutoRepositorio $produtoRepositorio;

    public function __construct(CaixaRepositorio $caixaRepositorio, ProdutoRepositorio $produtoRepositorio)
    {
        $this->caixaRepositorio = $caixaRepositorio;
        $this->produtoRepositorio = $produtoRepositorio;
    }

    public function index(Request $request)
    {
        $status = $this->caixaRepositorio->getStatusCaixa();
        $itens = $this->produtoRepositorio->getProdutoCaixa($request);
        return view('venda', ['status' => $status[0]->status, 'itens' => $itens]);
    }
}
