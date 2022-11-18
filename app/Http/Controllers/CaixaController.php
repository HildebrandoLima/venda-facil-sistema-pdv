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

    public function caixa()
    {
        $caixa = $this->caixaRepositorio->buscaCaixa()->toArray();
        $item = $this->produtoRepositorio->listarVendaItemTemporario($caixa[0]->id)->toArray();
        return view('caixa', ['caixa' => $caixa[0]->id, 'status' => $caixa[0]->status, 'descricao' => @end($item)->descricao, 'imagem' => @end($item)->imagem, 'itens' => $item]);
    }

    public function adicionarItem(Request $request)
    {
        $produto = $this->produtoRepositorio->getProduto($request);
        if($produto):
           $this->produtoRepositorio->bipagemProduto($produto);
        endif;
        return redirect()->route('caixa');
    }

    public function removerItem(Request $request)
    {
        return redirect()->route('caixa');
    }
}
