<?php

namespace App\Infra\Repositories\Venda;

use App\Infra\Database\Dao\Venda\CriarVendaDb;
use App\Infra\Database\Dao\Item\CriarItemDb;
use App\Infra\Database\Dao\Item\ListarVendaItemTemporarioDb;
use App\Infra\Database\Dao\Item\RemoverVendaItemTemporarioDb;
use App\Support\Helpers\MapeadorCodigoItem;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;

class VendaRepository
{
    private CriarVendaDb $criarVendaDb;
    private CriarItemDb $criarItemDb;
    private ListarVendaItemTemporarioDb $listarVendaItemTemporarioDb;
    private RemoverVendaItemTemporarioDb $removerVendaItemTemporarioDb;
    private MapeadorCodigoItem $mapeadorCodigoItem;
    private array $itens = [];
    private array $codigoItens = [];
    private int $vendaId;

    public function __construct
    (
        CriarVendaDb $criarVendaDb,
        CriarItemDb $criarItemDb,
        ListarVendaItemTemporarioDb $listarVendaItemTemporarioDb,
        RemoverVendaItemTemporarioDb $removerVendaItemTemporarioDb,
        MapeadorCodigoItem $mapeadorCodigoItem
    )
    {
        $this->criarVendaDb = $criarVendaDb;
        $this->criarItemDb = $criarItemDb;
        $this->listarVendaItemTemporarioDb = $listarVendaItemTemporarioDb;
        $this->removerVendaItemTemporarioDb = $removerVendaItemTemporarioDb;
        $this->mapeadorCodigoItem = $mapeadorCodigoItem;
    }

    public function criarVenda(Request $request): Collection
    {
        $this->request = $request;
        $this->recuperaItens();
        $this->mapeadorCodigoItem();
        $this->criarVendaa();
        $this->criarItem();
        $this->removerItem();
        return $this->recuperarPagamento();
    }

    private function recuperaItens(): array
    {
        $this->itens = $this->listarVendaItemTemporarioDb->listarVendaItemTemporario('', $this->request->caixa_id)->toArray();
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
        $userCreatedAt = $this->request->user_created_at;
        $this->criarItemDb->criarItem($this->itens, $this->vendaId, $userCreatedAt);
    }

    private function removerItem(): void
    {
        $this->removerVendaItemTemporarioDb->removerVendaItemTemporario($this->codigoItens);
    }

    private function recuperarPagamento(): Collection
    {
        $data = collect([
            'total' => $this->request->total,
            'vendaId' => $this->vendaId
        ]);
        return $data;
    }
}
