<?php

namespace App\Http\Controllers;

use App\Infra\Repositories\Venda\VendaRepository;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    private VendaRepository $vendaRepository;

    public function __construct
    (
        VendaRepository $vendaRepository
    )
    {
        $this->vendaRepository = $vendaRepository;
    }

    public function criarVenda(Request $request)
    {
        $data = $this->vendaRepository->criarVenda($request);
        return $this->pagamento($data);
    }

    public function pagamento($data)
    {
        return view('pagamento', ['total' => $data['total'], 'vendaId' => $data['vendaId']]);
    }
}
