<?php

namespace App\Infra\Repositories\Login;

use App\Infra\Database\Dao\Login\LoginDb;
use Illuminate\Http\Request;

class LoginRepository
{
    private LoginDb $loginDb;

    public function __construct
    (
        LoginDb $loginDb
    )
    {
        $this->loginDb = $loginDb;
    }

    public function login(Request $request): bool
    {
        $this->request = $request;
        $this->dadosOperador();
        return true;
    }

    private function dadosOperador(): void
    {
        $dados = $this->loginDb->login($this->request);
        session()->put([
            'matricula' => $dados[0]->matricula,
            'caixaId' => $dados[0]->caixa_id,
            'descricao' => $dados[0]->descricao
        ]);
    }
}
