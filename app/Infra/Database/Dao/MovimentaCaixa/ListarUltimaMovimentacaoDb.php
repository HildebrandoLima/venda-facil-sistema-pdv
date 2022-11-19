<?php

namespace App\Infra\Database\Dao\MovimentaCaixa;

use App\Infra\Database\Config\DbBase;

class ListarUltimaMovimentacaoDb extends DbBase
{
    public function listarUltimaMovimentacao(): int
    {
        $movimentacaoId = $this->db->table('movimentacao')->select(['id'])->orderByDesc('id')->limit(1)->get()->toArray();
        return $movimentacaoId[0]->id;
    }
}
