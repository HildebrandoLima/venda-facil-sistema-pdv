<?php

namespace App\Infra\Database\Dao\Item;

use App\Infra\Database\Config\DbBase;
use stdClass;

class CriarVendaItemTemporarioDb extends DbBase
{
    public function criarVendaItemTemporario(stdClass $item): bool
    {
        $this->db
        ->table('venda_item_temporario')
        ->insert([
            'nome' => $item->nome,
            'preco' => $item->preco_venda,
            'codigo_barra' => $item->codigo_barra,
            'descricao' => $item->descricao,
            'quantidade' => 1,
            'imagem' => $item->imagem,
            'sub_total' => 1,
            'unidade_medida' => $item->unidade_medida,
            'caixa_id' => 1,
            'user_created_at' => 1
        ]);
        return true;
    }
}
