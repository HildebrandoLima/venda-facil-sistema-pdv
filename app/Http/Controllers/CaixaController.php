<?php

namespace App\Http\Controllers;

use App\Infra\Repositorios\Caixa\CaixaRepositorio;
use App\Infra\Repositorios\Item\ItemRepositorio;
use Illuminate\Http\Request;

class CaixaController extends Controller
{
    private CaixaRepositorio $caixaRepositorio;
    private ItemRepositorio $itemRepositorio;

    public function __construct
    (
        CaixaRepositorio $caixaRepositorio,
        ItemRepositorio $itemRepositorio
    )
    {
        $this->caixaRepositorio = $caixaRepositorio;
        $this->itemRepositorio = $itemRepositorio;
    }

    public function caixa()
    {
        $caixa = $this->caixaRepositorio->buscaCaixa()->toArray();
        $item = $this->itemRepositorio->listarVendaItemTemporario($caixa[0]->id)->toArray();
        return view('caixa', ['caixa' => $caixa[0]->id, 'status' => $caixa[0]->status, 'descricao' => @end($item)->descricao, 'imagem' => @end($item)->imagem, 'itens' => $item]);
    }

    public function adicionarItem(Request $request)
    {
        $produto = $this->itemRepositorio->getProduto($request);
        if($produto):
           $this->itemRepositorio->bipagemProduto($produto);
        endif;
        return redirect()->route('caixa');
    }

    public function alterarQuantidadeItem(Request $request)
    {
        return redirect()->route('caixa');
    }

    public function removerItem(Request $request)
    {
        return redirect()->route('caixa');
    }
}
