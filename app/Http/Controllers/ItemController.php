<?php

namespace App\Http\Controllers;

use App\Infra\Database\Dao\Item\CriarItemDb;
use App\Infra\Database\Dao\Item\ListarItemDb;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    private CriarItemDb     $criarItemDb;
    private ListarItemDb    $listarItemDb;

    public function __construct
    (
        CriarItemDb     $criarItemDb,
        ListarItemDb    $listarItemDb
    )
    {
        $this->criarItemDb  =   $criarItemDb;
        $this->listarItemDb =   $listarItemDb;
    }

    public function index()
    {
        $this->listarItemDb->listarItem();
        return view();
    }

    public function store(Request $request)
    {
        $this->criarItemDb->criarItem($request);
        return view();
    }
}
