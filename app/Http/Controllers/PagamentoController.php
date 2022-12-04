<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Infra\Repositories\Pagamento\PagamentoRepository;

class PagamentoController extends Controller
{
    private PagamentoRepository $pagamentoRepository;

    public function __construct
    (
        PagamentoRepository $pagamentoRepository,
    )
    {
        $this->pagamentoRepository = $pagamentoRepository;
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
        return redirect()->route('nfe');
    }
}
