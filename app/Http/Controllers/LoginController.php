<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function logar(Request $request)
    {
        if(Auth::attempt(['matricula' => $request->matricula, 'password' => $request->password])):
            $request->session()->regenerate();
            dd('Logado!');
        else:
            dd('Error ao Logar!');
        endif;
    }

    public function logout()
    {
        #
    }
}
