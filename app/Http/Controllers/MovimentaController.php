<?php

namespace App\Http\Controllers;

use App\Infra\Repositories\MovimentarCaixa\MovimentacaoRepository;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class MovimentaController extends Controller
{
    private MovimentacaoRepository $movimentacaoRepository;

    public function __construct
    (
        MovimentacaoRepository $movimentacaoRepository
    )
    {
        $this->movimentacaoRepository = $movimentacaoRepository;
    }

    public function abrirCaixa(Request $request)
    {
        $this->movimentacaoRepository->abrirCaixa($request);
        $pdf = PDF::loadView('reports.abrircaixa', ['data' => $request]);
        $pdf->stream('00' . $request->caixa_id .'_abertura_caixa.pdf');
        $pdf->save('00' . $request->caixa_id .'_abertura_caixa.pdf'); 
        Storage::disk('local');
        return redirect()->route('caixa')->with('msg', 'Caixa Aberto com Sucesso');
    }

    public function fecharCaixa(Request $request)
    {
        $this->movimentacaoRepository->fecharCaixa($request);
        $pdf = PDF::loadView('reports.fecharcaixa', ['data' => $request]);
        $pdf->stream('00' . $request->caixa_id .'_fechamento_caixa.pdf');
        $pdf->save('00' . $request->caixa_id .'_fechamento_caixa.pdf'); 
        Storage::disk('local');
        $this->encerrarSessao();
        return redirect()->route('caixa')->with('msg', 'Caixa Fechado com Sucesso!!!');
    }

    private function encerrarSessao()
    {
        session()->forget('movimentacaoId');
        session()->forget('saldoAnterior');
    }
}
