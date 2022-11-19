<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Infra\Repositorios\MovimentarCaixa\MovimentacaoRepositorio;

class MovimentaController extends Controller
{
    private MovimentacaoRepositorio $movimentacaoRepositorio;

    public function __construct
    (
        MovimentacaoRepositorio $movimentacaoRepositorio
    )
    {
        $this->movimentacaoRepositorio = $movimentacaoRepositorio;
    }

    public function abrirCaixa(Request $request){
        $this->movimentacaoRepositorio->abrirCaixa($request);
        return redirect()->route('caixa')->with('msg', 'Caixa Aberto com Sucesso!!!');
    }
    public function fecharCaixa(Request $request)
    {
        $this->movimentacaoRepositorio->fecharCaixa($request);
        return redirect()->route('caixa')->with('msg', 'Caixa Fechado com Sucesso!!!');
    }
}
