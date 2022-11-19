<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Infra\Repositorios\Pagamento\PagamentoRepositorio;

class PagamentoController extends Controller
{
    private PagamentoRepositorio $pagamentoRepositorio;

    public function __construct
    (
        PagamentoRepositorio $pagamentoRepositorio
    )
    {
        $this->pagamentoRepositorio = $pagamentoRepositorio;
    }

    public function criarPagamento(Request $request)
    {
        $this->pagamentoRepositorio->criarPagamento($request);
        return redirect()->route('caixa')->with('msg', 'Venda Finalizada com Sucesso.');
    }
}
