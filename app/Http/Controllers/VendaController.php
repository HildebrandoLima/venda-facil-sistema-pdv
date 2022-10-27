<?php

namespace App\Http\Controllers;

use App\Infra\Repositorios\Caixa\CaixaRepositorio;
use App\Infra\Database\Dao\Venda\CriarVendaDb;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    private CaixaRepositorio $caixaRepositorio;
    private CriarVendaDb    $criarVendaDb;

    public function __construct
    (
        CaixaRepositorio $caixaRepositorio,
        CriarVendaDb    $criarVendaDb
    )
    {
        $this->caixaRepositorio = $caixaRepositorio;
        $this->criarVendaDb     =   $criarVendaDb;
    }

    public function store(Request $request)
    {
        $vendaId = $this->criarVendaDb->criarVenda($request);
        return redirect('pagamento/{'. $vendaId .'}');
    }

    public function status()
    {
        $status = $this->caixaRepositorio->getStatusCaixa();
        dd($status);
        return view('caixa', $status[0]->status);
    }
}
