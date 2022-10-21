<?php

namespace App\Http\Controllers;

use App\Support\Helpers\Venda\StatusCaixaDb;
use App\Infra\Database\Dao\Venda\CriarVendaDb;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    private StatusCaixaDb   $statusCaixaDb;
    private CriarVendaDb    $criarVendaDb;

    public function __construct
    (
        StatusCaixaDb   $statusCaixaDb,
        CriarVendaDb    $criarVendaDb
    )
    {
        $this->statusCaixaDb    =   $statusCaixaDb;
        $this->criarVendaDb     =   $criarVendaDb;
    }

    public function index()
    {
        $status = $this->statusCaixaDb->getStatusCaixa();
        return view('venda', ['status' => $status[0]->status]);
    }

    public function store(Request $request)
    {
        $vendaId = $this->criarVendaDb->criarVenda($request);
        return redirect('pagamento/{'. $vendaId .'}');
    }
}
