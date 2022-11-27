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

    public function login(Request $request)
    {
        return $this->loginDb->login($request);
    }
}
