<?php

namespace App\Infra\Repository\Pagamento;

use App\Infra\Database\Dao\Pagamento\CriarPagamentoDb; 
use Illuminate\Http\Request;

class PagamentoRepository
{
    private CriarPagamentoDb $criarPagamentoDb;

    public function __construct
    (
        CriarPagamentoDb $criarPagamentoDb
    )
    {
        $this->criarPagamentoDb = $criarPagamentoDb;
    }

    public function criarPagamento(Request $request): bool
    {
        return $this->criarPagamentoDb->criarPagamento($request);
    }
}
