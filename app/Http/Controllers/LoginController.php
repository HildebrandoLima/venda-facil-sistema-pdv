<?php

namespace App\Http\Controllers;

use App\Support\Helpers\Venda\StatusCaixaDb;
use App\Infra\Database\Dao\Venda\CriarVendaDb;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function index()
    {
        return view('login');
    }

    public function entrar(Request $request)
    {
        $email = $request->input('log');
        $senha = $request->input('pwd');
        print($email);
        print($senha);
        if($email == 'admin@gmail.com' && $senha == '123'){
        return redirect('admin');
        }
        else{
            return redirect('venda');
        }

    }

}
