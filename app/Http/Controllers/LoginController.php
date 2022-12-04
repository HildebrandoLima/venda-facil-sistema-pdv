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

            if (Auth::check()):
                $request->session()->regenerate();
                $dados = $this->loginRepository->login($request);

                session()->put([
                    'matricula' => $dados[0]->matricula,
                    'caixaId' => $dados[0]->caixa_id,
                    'descricao' => $dados[0]->descricao
                ]);

                if (session()->get('descricao') === 'Operador de Caixa'):
                    return redirect()->intended('caixa');
                else:
                    return redirect()->intended('admin');
                endif;
            endif;
        else:
            return redirect()->route('login')->with('error', 'Senha ou Matrícula incorreta.');
        endif;
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        return redirect()->route('login')->with('msg', 'Deslogado com sucesso.');
    }
}
