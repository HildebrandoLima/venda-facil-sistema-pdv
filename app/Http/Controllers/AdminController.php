<?php

namespace App\Http\Controllers;

use App\Support\Helpers\Venda\StatusCaixaDb;
use App\Infra\Database\Dao\Venda\CriarVendaDb;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {
        return view('admin');
    }

    public function entrar(Request $request)
    {
        $email = $request->input('log');
        $senha = $request->input('pwd');

    }

}
