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

    public function home()
    {
        $item = session('itens', []);
        $itens = ['itens' => $item];
        return view('caixa', $itens);
    }

    public function index(Request $request)
    {
        $codigo_barra = $request->codigo_barra;
        $produto = $this->produtoRepositorio->getProdutoCaixa($codigo_barra);
        if($produto):
            $item = session('itens', []);
            array_push($item, $produto);
            session(['itens' => $item]);
        endif;
        return $this->home();
    }

    public function update()
    {

    }

    public function destroy($produtoId)
    {
        $item = session('itens', []);
        if(isset($item[$produtoId])):
            unset($item[$produtoId]);
        endif;
        session(['itens' => $item]);
        return $this->home();
    }
}
