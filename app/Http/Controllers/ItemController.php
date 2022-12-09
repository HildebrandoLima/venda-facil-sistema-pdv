<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Infra\Repositories\Item\ItemRepository;

class ItemController extends Controller
{
    private ItemRepository $itemRepository;

    public function __construct
    (
        ItemRepository $itemRepository
    )
    {
        $this->itemRepository = $itemRepository;
    }

    public function adicionarItem(Request $request)
    {
        $produto = $this->itemRepository->getProduto($request);
        $this->itemRepository->bipagemProduto($produto);
        return redirect()->route('caixa');
    }

    public function alterarQuantidadeItem(Request $request)
    {
        $this->itemRepository->quantidadeItem($request);
        return redirect()->route('caixa');
    }

    public function removerItem($itemId)
    {
        $this->itemRepository->removerVendaItemTemporario($itemId);
        return redirect()->route('caixa');
    }
}
