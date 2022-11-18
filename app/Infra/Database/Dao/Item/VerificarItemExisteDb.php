<?php

namespace App\Infra\Database\Dao\Item;

use Illuminate\Http\Request;
use App\Infra\Database\Config\DbBase;

class VerificarItemExisteDb extends DbBase
{
    public function verificarItemExiste(Request $request): bool
    {
        $resultado = $this->db
        ->table('venda_item_temporario')
        ->where('codigo_barra', $request->codigo_barra)
        ->count('codigo_barra');

        if($resultado > 0):
            return true;
        endif;
        return false;
    }
}
