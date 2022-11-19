<?php

namespace App\Infra\Database\Dao\MovimentaCaixa;

use Illuminate\Http\Request;
use App\Infra\Database\Config\DbBase;

class FecharCaixaDb extends DbBase {

    public function fecharCaixa(Request $request)
    {
        return $this->db
            ->table('movimentacao')
            ->where('id', 10)
            ->update([
                'data_fechamento' => date("Y-m-d H:i:s"),
                'saldo_final' => $request->saldo_final,
            ]);
    }
}