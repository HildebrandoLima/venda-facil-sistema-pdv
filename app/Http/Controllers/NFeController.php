<?php

namespace App\Http\Controllers;

use App\Infra\Repositories\NFe\NFeRepository;
use Illuminate\Http\Request;

class NFeController extends Controller
{
    private NFeRepository $nfeRepository;

    public function __construct
    (
        NFeRepository $nfeRepository
    )
    {
        $this->nfeRepository = $nfeRepository;
    }

    public function exibirNFe(Request $request)
    {
        $this->nfeRepository->criarNFe($request);
    }

    public function criarNFe(Request $request)
    {
        $this->nfeRepository->listarNFe($request);
    }
}
