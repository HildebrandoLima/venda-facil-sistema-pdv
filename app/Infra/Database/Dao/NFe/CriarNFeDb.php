<?php

namespace App\Infra\Database\Dao\NFe;

use App\Infra\Database\Config\DbBase;

class CriarNFeDb extends DbBase
{
    public function criarNFe(int $vendaId, string $matricula)
    {
        $nfeId = $this->db
        ->table('nfe')
        ->insert([
            'data_emissao' => date('Y-d-m'),
            'numero' => random_int(100000000, 999999999),
            'serie' => 1,
            'tipo' => '',
            'finalidade' => 'Venda de Mercadoria',
            'informacao_complementar' => '',
            'assinatura_digital' => '',
            'motivo_nfe' => '', 
            'venda_id' => $vendaId,
            'user_created_at' => $matricula,
            'created_at' => date('Y-d-m')
        ]);
        return $nfeId;
    }
}
