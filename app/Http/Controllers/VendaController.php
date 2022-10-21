<?php

namespace App\Http\Controllers;

use App\Infra\Database\Dao\Venda\CriarVendaDb;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    private CriarVendaDb    $criarVendaDb;

    public function __construct
    (
        CriarVendaDb    $criarVendaDb
    )
    {
        $this->criarVendaDb     =   $criarVendaDb;
    }

    public function store(Request $request)
    {
        $vendaId = $this->criarVendaDb->criarVenda($request);
        return redirect('pagamento/{'. $vendaId .'}');
    }
}
