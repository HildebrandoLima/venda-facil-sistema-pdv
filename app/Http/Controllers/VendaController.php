<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use function PHPUnit\Framework\returnSelf;

class VendaController extends Controller
{
    public function index() {
        return view('venda');
    }
}
