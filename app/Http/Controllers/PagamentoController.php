<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Infra\Repositories\Pagamento\PagamentoRepository;
use App\Infra\Repositories\NFe\NFeRepository;

class PagamentoController extends Controller
{
    private PagamentoRepository $pagamentoRepository;
    private NFeRepository $nfeRepository;

    public function __construct
    (
        PagamentoRepository $pagamentoRepository,
        NFeRepository $nfeRepository
    )
    {
        $this->pagamentoRepository = $pagamentoRepository;
        $this->nfeRepository = $nfeRepository;
    }

    public function pagamento()
    {
        if (session()->exists('matricula')):
            return view('pagamento');
        else:
            return redirect()->route('login')->with('msg', 'É preciso estar logado.');
        endif;
    }

    public function criarPagamento(Request $request)
    {
        $this->pagamentoRepository->criarPagamento($request);
        $vendaId = session()->get('vendaId');
        //$nfe = 
        $this->nfeRepository->criarNFe($request, $vendaId);
        session()->forget('total');
        session()->forget('valorPago');
        session()->forget('vendaId');
        return redirect()->route('caixa')->with('msg', 'Venda Finalizada com Sucesso.');
    }
}
