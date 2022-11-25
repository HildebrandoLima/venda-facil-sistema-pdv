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
        $matricula = $request->input('matricula');
        $senha = $request->input('senha');
        $credenciais = ['matricula' => $matricula, 'password' => $senha];

        if (Auth::attempt($credenciais)):
            if (Auth::check()):
                $request->session()->regenerate();
                return redirect()->intended('caixa');
            endif;
        else:
            return redirect()->route('login')->with('msg', 'Dados incoreetos.');
        endif;
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        return redirect()->route('login')->with('msg', 'Deslogado com sucesso.');
    }
}
