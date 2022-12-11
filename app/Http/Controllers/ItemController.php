<?php

namespace App\Http\Controllers;

use App\Infra\Repositories\Item\ItemRepository;
use App\Infra\Repositories\Produto\ProdutoRepository;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    private ItemRepository $itemRepository;
    private ProdutoRepository $produtoRepository;

    public function __construct
    (
        ItemRepository $itemRepository,
        ProdutoRepository $produtoRepository
    )
    {
        $this->itemRepository = $itemRepository;
        $this->produtoRepository = $produtoRepository;
    }

    public function adicionarItem(Request $request)
    {
        $produto = $this->produtoRepository->bipagemProduto($request);
        $this->itemRepository->criarVendaItemTemporario($produto);
        return redirect()->route('view.caixa');
    }

    public function alterarQuantidadeItem(Request $request)
    {
        $this->itemRepository->quantidadeItem($request);
        return redirect()->route('view.caixa');
    }

    public function removerItem($itemId)
    {
        $this->itemRepository->removerVendaItemTemporario($itemId);
        return redirect()->route('view.caixa');
    }
}
