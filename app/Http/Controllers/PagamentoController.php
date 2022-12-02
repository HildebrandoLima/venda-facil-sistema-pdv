<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Infra\Repositories\Pagamento\PagamentoRepository;
use App\Infra\Repositories\NFe\NFeRepository;
use Barryvdh\DomPDF\Facade\Pdf;

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
        $nfeId = $this->nfeRepository->criarNFe($request, $vendaId);
        $this->encerrarSessao();
        $nfe = $this->nfeRepository->listarNFe($nfeId);
        $pdf = PDF::loadView('reports.nfe', ['nfe' => $nfe]);
        $pdf->download('nfe.pdf');
        return redirect()->route('caixa')->with('msg', 'Venda Finalizada com Sucesso.');
    }

    private function encerrarSessao()
    {
        session()->forget('total');
        session()->forget('valorPago');
        session()->forget('vendaId');
    }
}
