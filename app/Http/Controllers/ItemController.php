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

    public function alterarQuantidadeItem(Request $request)
    {
        return redirect()->route('caixa');
    }

    public function removerItem($itemId)
    {
        $this->itemRepository->removerVendaItemTemporario($itemId);
        return redirect()->route('caixa');
    }
}
