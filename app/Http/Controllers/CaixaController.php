<?php

namespace App\Http\Controllers;

use App\Infra\Repositores\Caixa\CaixaRepositore;
use Illuminate\Http\Request;

class CaixaController extends Controller
{
    private CaixaRepositore $caixaRepositore;

    public function __construct(CaixaRepositore   $caixaRepositore)
    {
        $this->caixaRepositore = $caixaRepositore;
    }

    public function index()
    {
        $status = $this->caixaRepositore->getStatusCaixa();
        return view('venda', ['status' => $status[0]->status]);
    }
}
