<?php

namespace App\Infra\Repositories\Usuario;

use App\Infra\Database\Dao\Usuario\IdentificarCLienteDb;
use Illuminate\Http\Request;

class UsuarioRepository
{
    private IdentificarCLienteDb $identificarCLienteDb;

    public function __construct
    (
        IdentificarCLienteDb $identificarCLienteDb
    )
    {
        $this->identificarCLienteDb = $identificarCLienteDb;
    }

    public function identificarCLiente(Request $request)
    {
        return $this->identificarCLienteDb->identificarCLiente($request);
    }
}
