<?php

namespace App\Http\Controllers;

use App\Infra\Repositories\Caixa\CaixaRepository;
use App\Infra\Repositories\Item\ItemRepository;
use Illuminate\Http\Request;

class CaixaController extends Controller
{
    private CaixaRepository $caixaRepository;
    private ItemRepository $itemRepository;

    public function __construct
    (
        CaixaRepository $caixaRepository,
        ItemRepository $itemRepository
    )
    {
        $this->caixaRepository = $caixaRepository;
        $this->itemRepository = $itemRepository;
    }

    public function caixa()
    {
        if (session()->exists('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d')):
            $caixa = $this->caixaRepository->buscaCaixa()->toArray();
            $item = $this->itemRepository->listarVendaItemTemporario($caixa[0]->id)->toArray();
            return view('caixa', ['caixa' => $caixa[0]->id, 'status' => $caixa[0]->status, 'descricao' => @end($item)->descricao, 'imagem' => @end($item)->imagem, 'itens' => $item]);
        else:
            return redirect()->route('login')->with('msg', 'É preciso estar logado.');
        endif;
    }

    public function adicionarItem(Request $request)
    {
        $produto = $this->itemRepository->getProduto($request);
        if($produto):
           $this->itemRepository->bipagemProduto($produto);
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
