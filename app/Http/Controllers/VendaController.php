<?php

namespace App\Http\Controllers;

use App\Infra\Repositories\Venda\VendaRepository;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    private VendaRepository $vendaRepository;

    public function __construct
    (
        VendaRepository $vendaRepository
    )
    {
        $this->vendaRepository = $vendaRepository;
    }

    public function criarVenda(Request $request)
    {
        $this->vendaRepository->criarVenda($request);
        return redirect()->route('pagamento');
        //return $this->pagamento();
    }

    /*
    public function pagamento($data)
    {
        if (session()->exists('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d')):
            return view('pagamento', ['total' => $data['total'], 'valorPago' => $data['valorPago'],'vendaId' => $data['vendaId']]);
        else:
            return redirect()->route('login')->with('msg', 'É preciso estar logado.');
        endif;
    }
    */
}
