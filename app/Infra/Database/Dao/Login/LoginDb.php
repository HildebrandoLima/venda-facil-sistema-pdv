<?php

namespace App\Infra\Database\Dao\Login;

use App\Infra\Database\Config\DbBase;
use Illuminate\Http\Request;

class LoginDb extends DbBase
{
    public function login(Request $request)
    {
        return $this->db
        ->table('login as l')
        ->join('nivel_acesso as na', 'na.login_id', '=', 'l.id')
        ->select([
            'l.matricula', 'l.caixa_id', 'na.descricao'
        ])
        ->where('l.matricula', $request->matricula)
        ->get(); 
    }
}
