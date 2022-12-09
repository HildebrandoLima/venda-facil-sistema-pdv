<?php

namespace App\Infra\Repositories\Usuario;

use App\Infra\Database\Dao\Usuario\IdentificarClienteDb;
use Illuminate\Http\Request;

class UsuarioRepository
{
    private IdentificarClienteDb $identificarClienteDb;

    public function __construct
    (
        IdentificarClienteDb $identificarClienteDb
    )
    {
        $this->identificarClienteDb = $identificarClienteDb;
    }

    public function identificarCliente(Request $request)
    {
        return $this->identificarClienteDb->identificarCliente($request);
    }
}
