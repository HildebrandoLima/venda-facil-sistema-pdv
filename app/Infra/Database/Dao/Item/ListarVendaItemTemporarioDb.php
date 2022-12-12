<?php

namespace App\Infra\Database\Dao\Item;

use App\Infra\Database\Config\DbBase;

class ListarVendaItemTemporarioDb extends DbBase
{
    public function listarVendaItemTemporario(string $codigo_barra, int $caixa)
    {
        return $this->db
        ->table('venda_item_temporario')
        ->select([
            'id',
            'nome',
            'preco',
            'codigo_barra',
            'descricao',
            'quantidade',
            'imagem',
            'sub_total',
            'unidade_medida'
        ])
        ->where('caixa_id', $caixa)
        ->orWhere('codigo_barra', $codigo_barra)
        ->get();
    }
}
