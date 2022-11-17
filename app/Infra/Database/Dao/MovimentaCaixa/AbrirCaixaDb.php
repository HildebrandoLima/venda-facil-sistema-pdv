<?php

namespace App\Infra\Database\Dao\MovimentaCaixa;

use Illuminate\Http\Request;
use App\Infra\Database\Config\DbBase;

class AbrirCaixaDb extends DbBase {

    public function abrirCaixa(Request $request): int
    {
        return $this->db
            ->table('movimentacao')
            ->insertGetId([
                'data_abertura' => date("Y-m-d H:i:s"),
                'data_fechamento' => date("Y-m-d H:i:s"),
                'saldo_final' => 0,
                'saldo_inicial' => $request->saldo_inicial,
                'caixa_id' => $request->caixa_id,
                'user_created_at' => $request->user_created_at,
                'created_at' => date("Y-m-d H:i:s")
            ]);
    }
}
