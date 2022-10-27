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

    public function status()
    {
        $status = $this->caixaRepositorio->getStatusCaixa();
        return view('caixa', $status[0]->status);
    }

    public function home()
    {
        $item = session('item', []);
        $itens = ['item' => $item];
        return view('caixa', $itens);
    }

    public function index(Request $request)
    {
        $codigo_barra = $request->codigo_barra;
        $produto = $this->produtoRepositorio->getProdutoCaixa($codigo_barra);
        if($produto):
            $item = session('item', []);
            array_push($item, $produto);
            session(['item' => $item]);
        endif;
        return $this->home();
    }
}
