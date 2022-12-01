<?php

namespace App\Infra\Database\Dao\NFe;

use App\Infra\Database\Config\DbBase;
use Illuminate\Http\Request;

class CriarNFeDb extends DbBase
{
    public function criarNFe(Request $request)
    {
        $NFeId = $this->db
        ->table('nfe')
        ->insertGetId([
            'data_emissao' => date('Y-d-m'),
            'numero' => random_int(100000000, 999999999),
            'serie' => 1,
            'tipo' => '',
            'finalidade' => 'Venda de Mercadoria',
            'informacao_complementar' => '',
            'assinatura_digital' => '',
            'motivo_nfe' => '', 
            'venda_id' => $request->vendaId,
            'user_created_at' => $request->user_created_at,
            'created_at' => date('Y-d-m')
        ]);
        return $NFeId;
    }
}
