<?php

namespace App\Http\Controllers;

use App\Infra\Repositorios\Venda\VendaRepositorio;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    private VendaRepositorio $vendaRepositorio;

    public function __construct
    (
        VendaRepositorio $vendaRepositorio
    )
    {
        $this->vendaRepositorio = $vendaRepositorio;
    }

    public function criarVenda(Request $request)
    {
        $resultado = $this->vendaRepositorio->criarVenda($request);
        if($resultado):
            $request->session()->forget('itens');
        endif;
        return redirect()->route('caixa')->with('msg', 'Venda Finalizada com Sucesso!!!');
    }
}
