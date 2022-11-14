<?php

namespace App\Infra\Repositorios\Venda;

use App\Infra\Database\Dao\Venda\CriarVendaDb;
use App\Infra\Database\Dao\Item\CriarItemDb;
use App\Infra\Database\Dao\Pagamento\CriarPagamentoDb;
use App\Support\Helpers\MapeadorItens;
use Illuminate\Http\Request;

class VendaRepositorio
{
    private CriarVendaDb $criarVendaDb;
    private CriarItemDb $criarItemDb;
    private CriarPagamentoDb $criarPagamentoDb;
    private MapeadorItens $mapeadorItens;
    private int $vendaId;
    private array $itens = [];

    public function __construct
    (
        CriarVendaDb $criarVendaDb,
        CriarItemDb $criarItemDb,
        CriarPagamentoDb $criarPagamentoDb,
        MapeadorItens $mapeadorItens
    )
    {
        $this->criarVendaDb = $criarVendaDb;
        $this->criarItemDb = $criarItemDb;
        $this->criarPagamentoDb = $criarPagamentoDb;
        $this->mapeadorItens = $mapeadorItens;
    }

    public function criarVenda(Request $request): bool
    {
        $this->request = $request;
        $this->sessionItens();
        $this->criarVendaa();
        $this->criarItem();
        $this->criarPagamento();
        return true;
    }

    private function sessionItens(): array
    {
        $this->itens = $this->mapeadorItens->sessionItens($this->request);
        return $this->itens;
    }

    private function criarVendaa(): int
    {
        $this->vendaId = $this->criarVendaDb->criarVenda($this->request);
        return $this->vendaId;
    }

    private function criarItem(): void
    {
        $this->criarItemDb->criarItem($this->request, $this->itens, $this->vendaId);
    }

    private function criarPagamento(): void
    {
        $this->criarPagamentoDb->criarPagamento($this->request, $this->vendaId);
    }
}
