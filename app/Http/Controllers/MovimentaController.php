<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Infra\Repositories\MovimentarCaixa\MovimentacaoRepository;

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
        return redirect()->route('caixa')->with('msg', 'Caixa Aberto com Sucesso');
    }

    public function fecharCaixa(Request $request)
    {
        $this->movimentacaoRepository->fecharCaixa($request);
        session()->forget('movimentacaoId');
        return redirect()->route('caixa')->with('msg', 'Caixa Fechado com Sucesso!!!');
    }
}
