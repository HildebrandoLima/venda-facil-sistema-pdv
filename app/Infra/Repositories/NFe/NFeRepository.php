<?php

namespace App\Infra\Repositories\NFe;

use App\Infra\Database\Dao\NFe\CriarNFeDb;
use App\Infra\Database\Dao\NFe\ListarNFeDb;
use Illuminate\Http\Request;

class NFeRepository
{
    private CriarNFeDb $criarNFeDb;
    private ListarNFeDb $listarNFeDb;

    public function __construct
    (
        CriarNFeDb $criarNFeDb,
        ListarNFeDb $listarNFeDb
    )
    {
        $this->criarNFeDb = $criarNFeDb;
        $this->listarNFeDb = $listarNFeDb;
    }

    public function criarNFe(Request $request, int $vendaId)
    {
        $nfe = $this->criarNFeDb->criarNFe($request, $vendaId);
        return $nfe;
    }

    public function listarNFe(int $nfeId)
    {
        return $this->listarNFeDb->listarNFe($nfeId);
    }
}
