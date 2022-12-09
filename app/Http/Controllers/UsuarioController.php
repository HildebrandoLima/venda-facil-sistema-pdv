<?php

namespace App\Http\Controllers;

use App\Infra\Repositories\Usuario\UsuarioRepository;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    private UsuarioRepository $usuarioRepository;

    public function __construct
    (
        UsuarioRepository $usuarioRepository
    )
    {
        $this->usuarioRepository = $usuarioRepository;
    }

    public function identificarCliente(Request $request)
    {
        $usuarioId = $this->usuarioRepository->identificarCliente($request);
        session()->put([
            'usuarioId' => $usuarioId[0]->id,
            'cpf' => $request->cpf
        ]);
        return redirect()->route('caixa');
    }
}
