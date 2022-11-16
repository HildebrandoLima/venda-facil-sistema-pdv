<?php
namespace App\Infra\Database\Dao\Item;

use Illuminate\Http\Request;
use App\Infra\Database\Config\DbBase;

class CriarVendaItemTemporarioDb extends DbBase
{
    public function criarVendaItemTemporario(Request $request)
    {
        return $this->db
        ->table('venda_item_temporario')
        ->insert([
                'nome' => $request->nome,
                'preco' => $request->preco,
                'codigo_barra' => $request->codigo_barra,
                'quantidade' => $request->quantidade,
                'sub_total' => $request->sub_total,
                'unidade_medida' => $request->unidade_medida,
                'caixa_id' => $request->caixa_id,
                'user_created_at' => $request->user_created_at
            ]);
    }
}
