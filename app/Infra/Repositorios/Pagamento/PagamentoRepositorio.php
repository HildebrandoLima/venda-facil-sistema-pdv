<?php

namespace App\Infra\Repositorios\Pagamento;

use Illuminate\Http\Request;
use App\Infra\Database\Dao\Pagamento\CriarPagamentoDb; 

class PagamentoRepositorio
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
