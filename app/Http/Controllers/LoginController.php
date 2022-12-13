<?php

namespace App\Http\Controllers;

use App\Infra\Repositories\Login\LoginRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    private LoginRepository $loginRepository;

    public function __construct
    (
        LoginRepository $loginRepository
    )
    {
        $this->loginRepository = $loginRepository;
    }

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
            $request->session()->regenerate();
            $this->loginRepository->login($request);

            if (session()->get('descricao') === 'Operador de Caixa'):
                return redirect()->intended('operador');
            else:
                return redirect()->intended('supervisor');
            endif;
        else:
            return redirect()->route('login')->with('error', 'incorreta.');
        endif;
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        return redirect()->route('login')->with('msg', 'Deslogado com sucesso.');
    }
}
