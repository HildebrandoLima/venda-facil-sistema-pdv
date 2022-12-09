<?php

namespace App\Http\Controllers;

use App\Infra\Repositories\Caixa\CaixaRepository;
use App\Infra\Repositories\Item\ItemRepository;
use App\Infra\Repositories\MovimentarCaixa\MovimentacaoRepository;

class CaixaController extends Controller
{
    private CaixaRepository $caixaRepository;
    private ItemRepository $itemRepository;
    private MovimentacaoRepository $movimentacaoRepository;

    public function __construct
    (
        CaixaRepository $caixaRepository,
        ItemRepository $itemRepository,
        MovimentacaoRepository $movimentacaoRepository
    )
    {
        $this->caixaRepository = $caixaRepository;
        $this->itemRepository = $itemRepository;
        $this->movimentacaoRepository = $movimentacaoRepository;
    }

    public function caixa()
    {
        if (session()->exists('matricula')):
            $caixaId = session()->get('caixaId');
            $caixa = $this->caixaRepository->buscaCaixa($caixaId)->toArray();
            $item = $this->itemRepository->listarVendaItemTemporario($caixaId)->toArray();
            $movimentacao = $this->movimentacaoRepository->recuperarMovimentacao($caixaId);
            $saldoAnterior = $this->movimentacaoRepository->recuperarSaldoAnteior($caixaId);

            $data = collect([
                'status' => $caixa[0]->status,
                'descricao' => @end($item)->descricao,
                'imagem' => @end($item)->imagem,
                'quantidade' => @end($item)->quantidade,
                'preco' => @end($item)->preco
            ])->toArray();
            return view('caixa', ['data' => $data, 'itens' => $item, 'movimentacao' => @$movimentacao[0], 'saldoAnterior' => $saldoAnterior[0]]);
        else:
            return redirect()->route('login')->with('msg', 'É preciso estar logado.');
        endif;
    }
}
