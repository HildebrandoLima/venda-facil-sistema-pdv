<?php

namespace App\Http\Controllers;

use App\Infra\Repositories\Caixa\CaixaRepository;
use App\Infra\Repositories\Item\ItemRepository;

class CaixaController extends Controller
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

    public function caixa()
    {
        if (session()->exists('matricula')):
            $caixaId = session()->get('caixaId');
            $caixa = $this->caixaRepository->buscarCaixa($caixaId)->toArray();
            $itens = $this->itemRepository->listarVendaItemTemporario($caixaId)->toArray();

            $data = collect([
                'status' => $caixa[0]->status,
                'descricao' => @end($itens)->descricao,
                'imagem' => @end($itens)->imagem,
                'quantidade' => @end($itens)->quantidade,
                'preco' => @end($itens)->preco
            ])->toArray();
            return view('operador.caixa', ['data' => $data, 'itens' => $itens]);
        else:
            return redirect()->route('login')->with('msg', 'É preciso estar logado.');
        endif;
    }

    public function fechar()
    {
        if (session()->exists('matricula')):
            $caixaId = session()->get('caixaId');
            $movimentacao = $this->caixaRepository->recuperarMovimentacao($caixaId);
            return view('operador.fecharcaixa', ['movimentacao' => $movimentacao]);
        else:
            return redirect()->route('login')->with('msg', 'É preciso estar logado.');
        endif;
    }
}
