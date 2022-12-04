<?php

namespace App\Infra\Database\Dao\Item;

use App\Infra\Database\Config\DbBase;

class RemoverVendaItemTemporarioDb extends DbBase
{
    public function removerVendaItensTemporarios(array $codigoItens): bool
    {
        return $this->db
        ->table('venda_item_temporario')
        ->whereIn('id', $codigoItens)
        ->delete();
    }

    public function removerVendaItemTemporario(int $itemId): bool
    {
        return $this->db
        ->table('venda_item_temporario')
        ->where('id', $itemId)
        ->delete();
    }
}
