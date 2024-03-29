<?php

namespace App\Infra\Repositories\Venda;

use App\Infra\Database\Dao\Venda\CriarVendaDb;
use App\Infra\Database\Dao\Item\CriarItemDb;
use App\Infra\Database\Dao\Item\ListarVendaItemTemporarioDb;
use App\Infra\Database\Dao\Item\RemoverVendaItemTemporarioDb;
use Illuminate\Http\Request;

class VendaRepository
{
    private CriarVendaDb $criarVendaDb;
    private CriarItemDb $criarItemDb;
    private ListarVendaItemTemporarioDb $listarVendaItemTemporarioDb;
    private RemoverVendaItemTemporarioDb $removerVendaItemTemporarioDb;
    private array $itens = [];
    private array $codigoItens = [];
    private int $vendaId;

    public function __construct
    (
        CriarVendaDb $criarVendaDb,
        CriarItemDb $criarItemDb,
        ListarVendaItemTemporarioDb $listarVendaItemTemporarioDb,
        RemoverVendaItemTemporarioDb $removerVendaItemTemporarioDb,
    )
    {
        $this->criarVendaDb = $criarVendaDb;
        $this->criarItemDb = $criarItemDb;
        $this->listarVendaItemTemporarioDb = $listarVendaItemTemporarioDb;
        $this->removerVendaItemTemporarioDb = $removerVendaItemTemporarioDb;
    }

    public function criarVenda(Request $request): bool
    {
        $this->request = $request;
        $this->recuperaItens();
        $this->mapeadorCodigoItem();
        $this->criarVendaa();
        $this->criarItem();
        $this->removerItem();
        $this->recuperarPagamento();
        return true;
    }

    private function recuperaItens(): array
    {
        $this->itens = $this->listarVendaItemTemporarioDb->listarVendaItemTemporario('', $this->request->caixa_id)->toArray();
        return $this->itens;
    }

    private function mapeadorCodigoItem(): array
    {
        foreach ($this->itens as $item):
            array_push($this->codigoItens, $item->id);
        endforeach;
        return $this->codigoItens;
    }

    private function criarVendaa(): int
    {
        $this->vendaId = $this->criarVendaDb->criarVenda($this->request);
        return $this->vendaId;
    }

    private function criarItem(): void
    {
        $this->criarItemDb->criarItem($this->itens, $this->vendaId, $this->request->user_created_at);
    }

    private function removerItem(): void
    {
        $this->removerVendaItemTemporarioDb->removerVendaItensTemporarios($this->codigoItens);
    }

    private function recuperarPagamento(): void
    {
        session()->put([
            'total' => $this->request->total,
            'valorPago' => $this->request->valor_pago,
            'vendaId' => $this->vendaId
        ]);
    }
}
