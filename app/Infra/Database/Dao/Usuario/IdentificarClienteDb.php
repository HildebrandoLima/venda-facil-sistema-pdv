<?php

namespace App\Infra\Database\Dao\Usuario;

use App\Infra\Database\Config\DbBase;
use Illuminate\Http\Request;

class IdentificarClienteDb extends DbBase
{
    public function identificarCliente(Request $request)
    {
        return $this->db
        ->table('usuario')
        ->select(['id'])
        ->where('cpf', $request->cpf)
        ->get();
    }
}
