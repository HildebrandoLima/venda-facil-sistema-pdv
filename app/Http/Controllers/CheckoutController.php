<?php

namespace App\Http\Controllers;

use App\Infra\Repositorios\Produto\ProdutoRepositorio;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    private ProdutoRepositorio $produtoRepositorio;

    public function __construct(ProdutoRepositorio $produtoRepositorio)
    {
        $this->produtoRepositorio = $produtoRepositorio;
    }

    public function addCheckout(Request $request)
    {
        $produto = $this->produtoRepositorio->getProdutoFind($request->produto_id);
        if($request->produto_id):
            $item = session('item', []);
            array_push($item, $produto);
            session(['item' => $item]);
        endif;
        return redirect()->route('caixa');
    }

    public function viewCheckout()
    {
        $item = session('item', []);
        $data = ['item' => $item];
        return view('caixa', $data);
    }
}
