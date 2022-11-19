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
        $data = $this->vendaRepositorio->criarVenda($request);
        return $this->pagamento($data);
    }

    public function pagamento($data)
    {
        return view('pagamento', ['total' => $data['total'], 'vendaId' => $data['vendaId']]);
    }
}
