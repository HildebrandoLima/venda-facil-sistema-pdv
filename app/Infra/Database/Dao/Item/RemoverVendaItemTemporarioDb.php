<?php

namespace App\Infra\Database\Dao\Item;

use App\Infra\Database\Config\DbBase;

class RemoverVendaItemTemporarioDb extends DbBase
{
    public function removerVendaItemTemporario($codigoItens): bool
    {
        return $this->db
        ->table('venda_item_temporario')
        ->whereIn('id', $codigoItens)
        ->delete();
    }
}
