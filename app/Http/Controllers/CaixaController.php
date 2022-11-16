<?php

namespace App\Http\Controllers;

use App\Infra\Repositorios\Caixa\CaixaRepositorio;
use App\Infra\Repositorios\Produto\ProdutoRepositorio;
use Illuminate\Http\Request;

class CaixaController extends Controller
{
    private CaixaRepositorio $caixaRepositorio;
    private ProdutoRepositorio $produtoRepositorio;

    public function __construct
    (
        CaixaRepositorio $caixaRepositorio,
        ProdutoRepositorio $produtoRepositorio
    )
    {
        $this->caixaRepositorio = $caixaRepositorio;
        $this->produtoRepositorio = $produtoRepositorio;
    }

    public function caixa(Request $request)
    {
        $caixa = $this->caixaRepositorio->getCaixa()->toArray();
        $produto = $this->produtoRepositorio->getProduto($request);
        $item = session('itens', []);
        $data = ['itens' => $item];
        return view('caixa', $data, ['caixa' => $caixa[0]->id, 'status' => $caixa[0]->status, 'imagem' => @$produto[0]->imagem, 'descricao' => @$produto[0]->descricao]);
    }

    public function adicionarItem(Request $request)
    {
        $buscar_produto = $this->produtoRepositorio->getProduto($request);
        if($buscar_produto):
            $item = session('itens', []);
            array_push($item, $buscar_produto);
            session(['itens' => $item]);
        endif;
        return redirect()->route('caixa');
    }

    public function removerItem(int $produtoId)
    {
        $item = session()->get('itens');
        unset($item[$produtoId]);
        session()->put(['itens', $item]);
        return redirect()->route('caixa');
    }
}
