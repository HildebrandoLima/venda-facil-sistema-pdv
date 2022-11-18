<?php

namespace App\Infra\Repositorios\Venda;

use App\Infra\Database\Dao\Venda\CriarVendaDb;
use App\Infra\Database\Dao\Item\CriarItemDb;
use App\Infra\Database\Dao\Pagamento\CriarPagamentoDb;
use App\Infra\Database\Dao\Item\ListarVendaItemTemporarioDb;
use App\Infra\Database\Dao\Item\RemoverVendaItemTemporarioDb;
use App\Support\Helpers\MapeadorCodigoItem;
use Illuminate\Http\Request;

class VendaRepositorio
{
    private CriarVendaDb $criarVendaDb;
    private CriarItemDb $criarItemDb;
    private CriarPagamentoDb $criarPagamentoDb;
    private ListarVendaItemTemporarioDb $listarVendaItemTemporarioDb;
    private RemoverVendaItemTemporarioDb $removerVendaItemTemporarioDb;
    private MapeadorCodigoItem $mapeadorCodigoItem;
    private array $itens = [];
    private array $codigoItens = [];
    private int $vendaId;
    private int $userCreatedAt;

    public function __construct
    (
        CriarVendaDb $criarVendaDb,
        CriarItemDb $criarItemDb,
        CriarPagamentoDb $criarPagamentoDb,
        ListarVendaItemTemporarioDb $listarVendaItemTemporarioDb,
        RemoverVendaItemTemporarioDb $removerVendaItemTemporarioDb,
        MapeadorCodigoItem $mapeadorCodigoItem
    )
    {
        $this->criarVendaDb = $criarVendaDb;
        $this->criarItemDb = $criarItemDb;
        $this->criarPagamentoDb = $criarPagamentoDb;
        $this->listarVendaItemTemporarioDb = $listarVendaItemTemporarioDb;
        $this->removerVendaItemTemporarioDb = $removerVendaItemTemporarioDb;
        $this->mapeadorCodigoItem = $mapeadorCodigoItem;
    }

    public function criarVenda(Request $request): bool
    {
        $this->request = $request;
        $this->recuperaItens();
        $this->mapeadorCodigoItem();
        $this->criarVendaa();
        $this->criarItem();
        $this->removerItem();
        $this->criarPagamento();
        return true;
    }

    private function recuperaItens(): array
    {
        $this->itens = $this->listarVendaItemTemporarioDb->listarVendaItemTemporario($this->request->caixa_id)->toArray();
        return $this->itens;
    }

    private function mapeadorCodigoItem(): array
    {
        $this->codigoItens = $this->mapeadorCodigoItem->mapeadorCodigoItem($this->itens);
        return $this->codigoItens;
    }

    private function criarVendaa(): int
    {
        $this->vendaId = $this->criarVendaDb->criarVenda($this->request);
        return $this->vendaId;
    }

    private function criarItem(): void
    {
        $this->userCreatedAt = $this->request->user_created_at;
        $this->criarItemDb->criarItem($this->itens, $this->vendaId, $this->userCreatedAt);
    }

    private function removerItem(): void
    {
        $this->removerVendaItemTemporarioDb->removerVendaItemTemporario($this->codigoItens);
    }

    private function criarPagamento(): void
    {
        $this->criarPagamentoDb->criarPagamento($this->request, $this->vendaId);
    }
}
