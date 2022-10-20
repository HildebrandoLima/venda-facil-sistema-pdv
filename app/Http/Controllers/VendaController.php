<?php

namespace App\Http\Controllers;

use App\Support\Helpers\Venda\StatusCaixaDb;
use Illuminate\Http\Request;
use function PHPUnit\Framework\returnSelf;

class VendaController extends Controller
{
    private StatusCaixaDb $statusCaixaDb;

    public function __construct(StatusCaixaDb $statusCaixaDb)
    {
        $this->statusCaixaDb = $statusCaixaDb;
    }

    public function index() {
        $status = $this->statusCaixaDb->getStatusCaixa();
        return view('venda', ['status' => $status[0]->status]);
    }
}
