<?php

namespace App\Infra\Database\Dao\Item;

use App\Infra\Database\Config\DbBase;

class CriarVendaItemTemporarioDb extends DbBase
{
    public function criarVendaItemTemporario(array $item): bool
    {
        $this->db
        ->table('venda_item_temporario')
        ->insert([
            'nome' => $item[1],
            'preco' => $item[2],
            'codigo_barra' => $item[3],
            'descricao' => $item[4],
            'quantidade' => 1,
            'imagem' => $item[5],
            'sub_total' => 1,
            'unidade_medida' => $item[6],
            'caixa_id' => 1,
            'user_created_at' => 1
        ]);
        return true;
    }
}
