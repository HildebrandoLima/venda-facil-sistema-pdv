<?php

namespace App\Infra\Database\Dao\MovimentaCaixa;

use App\Infra\Database\Config\DbBase;

class RecuperarMovimentacaoDb extends DbBase
{
    private $data;
    private $data_atual;
    private $caixaId;

    public function recuperarMovimentacao($caixaId)
    {
        $this->data = now();
        $this->data_atual = date('Y-m-d', strtotime($this->data));
        $this->caixaId = $caixaId;
        return $this->queryMovimentacao();
    }

    private function queryMovimentacao()
    {
        return $this->db
        ->table('venda as v')
        ->join('movimentacao as m', 'm.caixa_id', '=', 'v.caixa_id')
        ->leftJoin('sangria as s', 's.caixa_id', '=', 'v.caixa_id')
        ->leftJoin('venda_item_devolucao as vid', 'vid.venda_id', '=', 'v.id')
        ->leftJoin('venda_item_troca as vit', 'vit.venda_id', '=', 'v.id')
        ->select([
            'm.saldo_inicial as saldo_inicial'
        ])
        ->selectRaw($this->totalVenda() . 'as total_venda')
        ->selectRaw($this->totalVendaReais() . 'as total_venda_real')
        ->selectRaw($this->totalSangria() . 'as total_sangria')
        ->selectRaw($this->totalSangriaReais() . 'as total_sangria_real')
        ->selectRaw($this->totalVendaDinheiro() . 'as total_venda_dinheiro')
        ->selectRaw($this->totalVendaDinheiroReais() . 'as total_venda_dinheiro_real')
        ->selectRaw($this->totalVendaPix() . 'as total_venda_pix')
        ->selectRaw($this->totalVendaPixReais() . 'as total_venda_pix_real')
        ->selectRaw($this->totalVendaCartaoCredito() . 'as total_venda_cartao_credito')
        ->selectRaw($this->totalVendaCartaoCreditoReais() . 'as total_venda_cartao_credito_real')
        ->selectRaw($this->totalVendaCartaoDebito() . 'as total_venda_cartao_debito')
        ->selectRaw($this->totalVendaCartaoDebitoReais() . 'as total_venda_cartao_debito_real')
        ->selectRaw($this->totalDevolucao() . 'as total_devolucao')
        ->selectRaw($this->totalDevolucaoReais() . 'as total_devolucao_real')
        ->selectRaw($this->totalTroca() . 'as total_troca')
        ->selectRaw($this->totalTrocaReais() . 'as total_troca_real')
        ->where('m.created_at', 'like', '%' . $this->data_atual . '%')
        ->where('m.caixa_id', $this->caixaId)
        ->groupBy('m.saldo_inicial')
        ->get();
    }

    private function totalVenda(): int
    {
        return $this->db
        ->table('venda as v')
        ->where('v.created_at', 'like', '%' . $this->data_atual . '%')
        ->where('v.caixa_id', $this->caixaId)
        ->count('v.id');
    }

    private function totalVendaReais(): float
    {
        return $this->db
        ->table('venda as v')
        ->where('v.created_at', 'like', '%' . $this->data_atual . '%')
        ->where('v.caixa_id', $this->caixaId)
        ->sum('v.total');
    }

    private function totalSangria(): int
    {
        return $this->db
        ->table('sangria as s')
        ->leftJoin('venda as v', 'v.caixa_id', '=', 's.caixa_id')
        ->where('v.created_at', 'like', '%' . $this->data_atual . '%')
        ->where('v.caixa_id', $this->caixaId)
        ->count('s.id');
    }

    private function totalSangriaReais(): float
    {
        return $this->db
        ->table('sangria as s')
        ->leftJoin('venda as v', 'v.caixa_id', '=', 's.caixa_id')
        ->where('v.created_at', 'like', '%' . $this->data_atual . '%')
        ->where('v.caixa_id', $this->caixaId)
        ->sum('s.saldo_sangria');
    }

    private function totalVendaDinheiro(): int
    {
        return $this->db
        ->table('pagamento as p')
        ->leftJoin('venda as v', 'v.id', '=', 'p.venda_id')
        ->where('v.created_at', 'like', '%' . $this->data_atual . '%')
        ->where('p.metodo_pagamento_id', 2)
        ->count('p.metodo_pagamento_id');
    }

    private function totalVendaDinheiroReais(): float
    {
        return $this->db
        ->table('pagamento as p')
        ->leftJoin('venda as v', 'v.id', '=', 'p.venda_id')
        ->where('v.created_at', 'like', '%' . $this->data_atual . '%')
        ->where('p.metodo_pagamento_id', 2)
        ->sum('p.total');
    }

    private function totalVendaPix(): int
    {
        return $this->db
        ->table('pagamento as p')
        ->leftJoin('venda as v', 'v.id', '=', 'p.venda_id')
        ->where('v.created_at', 'like', '%' . $this->data_atual . '%')
        ->where('p.metodo_pagamento_id', 4)
        ->count('p.metodo_pagamento_id');
    }

    private function totalVendaPixReais(): float
    {
        return $this->db
        ->table('pagamento as p')
        ->leftJoin('venda as v', 'v.id', '=', 'p.venda_id')
        ->where('v.created_at', 'like', '%' . $this->data_atual . '%')
        ->where('p.metodo_pagamento_id', 4)
        ->sum('p.total');
    }

    private function totalVendaCartaoCredito(): int
    {
        return $this->db
        ->table('pagamento as p')
        ->leftJoin('venda as v', 'v.id', '=', 'p.venda_id')
        ->where('v.created_at', 'like', '%' . $this->data_atual . '%')
        ->where('p.metodo_pagamento_id', 1)
        ->count('p.metodo_pagamento_id');
    }

    private function totalVendaCartaoCreditoReais(): float
    {
        return $this->db
        ->table('pagamento as p')
        ->leftJoin('venda as v', 'v.id', '=', 'p.venda_id')
        ->where('v.created_at', 'like', '%' . $this->data_atual . '%')
        ->where('p.metodo_pagamento_id', 1)
        ->sum('p.total');
    }

    private function totalVendaCartaoDebito(): int
    {
        return $this->db
        ->table('pagamento as p')
        ->leftJoin('venda as v', 'v.id', '=', 'p.venda_id')
        ->where('v.created_at', 'like', '%' . $this->data_atual . '%')
        ->where('p.metodo_pagamento_id', 3)
        ->count('p.metodo_pagamento_id');
    }

    private function totalVendaCartaoDebitoReais(): float
    {
        return $this->db
        ->table('pagamento as p')
        ->leftJoin('venda as v', 'v.id', '=', 'p.venda_id')
        ->where('v.created_at', 'like', '%' . $this->data_atual . '%')
        ->where('p.metodo_pagamento_id', 3)
        ->sum('p.total');
    }

    private function totalDevolucao(): int
    {
        return $this->db
        ->table('venda_item_devolucao as vid')
        ->leftJoin('venda as v', 'v.id', '=', 'vid.venda_id')
        ->where('v.created_at', 'like', '%' . $this->data_atual . '%')
        ->count('vid.id');
    }

    private function totalDevolucaoReais(): float
    {
        return $this->db
        ->table('venda_item_devolucao as vid')
        ->leftJoin('venda as v', 'v.id', '=', 'vid.venda_id')
        ->where('v.created_at', 'like', '%' . $this->data_atual . '%')
        ->sum('v.total');
    }

    private function totalTroca(): int
    {
        return $this->db
        ->table('venda_item_troca as vit')
        ->leftJoin('venda as v', 'v.id', '=', 'vit.venda_id')
        ->where('v.created_at', 'like', '%' . $this->data_atual . '%')
        ->count('vit.id');
    }

    private function totalTrocaReais(): float
    {
        return $this->db
        ->table('venda_item_troca as vit')
        ->leftJoin('venda as v', 'v.id', '=', 'vit.venda_id')
        ->where('v.created_at', 'like', '%' . $this->data_atual . '%')
        ->sum('v.total');
    }
}
