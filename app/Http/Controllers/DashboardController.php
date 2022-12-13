<?php

namespace App\Http\Controllers;

use App\Infra\Repositories\Caixa\CaixaRepository;
use App\Infra\Repositories\Item\ItemRepository;

class DashboardController extends Controller
{
    private CaixaRepository $caixaRepository;
    private ItemRepository $itemRepository;

    public function __construct
    (
        CaixaRepository $caixaRepository,
        ItemRepository $itemRepository,
    )
    {
        $this->caixaRepository = $caixaRepository;
        $this->itemRepository = $itemRepository;
    }

    public function admin()
    {
        if (session()->exists('matricula')):
            return view('supervisor.admin');
        else:
            return redirect()->route('login')->with('msg', 'É preciso estar logado.');
        endif;
    }
}
