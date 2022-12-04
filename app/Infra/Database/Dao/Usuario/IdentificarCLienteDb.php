<?php

namespace App\Infra\Database\Dao\Usuario;

use App\Infra\Database\Config\DbBase;
use Illuminate\Http\Request;

class IdentificarCLienteDb extends DbBase
{
    public function identificarCLiente(Request $request)
    {
        return $this->db
        ->table('usuario')
        ->select(['id'])
        ->where('cpf', $request->cpf)
        ->get();
    }
}
