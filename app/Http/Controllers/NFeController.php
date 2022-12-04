<?php

namespace App\Http\Controllers;

use App\Infra\Repositories\NFe\NFeRepository;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class NFeController extends Controller
{
    private NFeRepository $nfeRepository;

    public function __construct
    (
        NFeRepository $nfeRepository
    )
    {
        $this->nfeRepository = $nfeRepository;
    }

    public function criarNFe()
    {
        $vendaId = session()->get('vendaId');
        $matricula = session()->get('matricula');
        $this->nfeRepository->criarNFe($vendaId, $matricula);
        return redirect()->route('gerarnfe', $vendaId);
    }

    public function gerarNFe(Request $request)
    {
        $this->encerrarSessao();
        $data = $this->nfeRepository->listarNFe($request->vendaId);
        $pdf = PDF::loadView('reports.nfe', ['data' => $data]);
        $pdf->stream($request->vendaId .'_nfe.pdf');
        $pdf->save($request->vendaId .'_nfe.pdf'); 
        Storage::disk('local');
        return redirect()->route('caixa')->with('msg', 'Venda Finalizada com Sucesso.');
    }

    private function encerrarSessao()
    {
        session()->forget('total');
        session()->forget('valorPago');
        session()->forget('vendaId');
    }
}
