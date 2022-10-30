<?php

namespace App\Infra\Repositorios\Venda;

use App\Infra\Database\Dao\Venda\CriarVendaDb;
use App\Infra\Database\Dao\Item\CriarItemDb;
use Illuminate\Http\Request;

class VendaRepositorio
{
    private CriarVendaDb $criarVendaDb;
    private CriarItemDb $criarItemDb;

    public function __construct
    (
        CriarVendaDb $criarVendaDb,
        CriarItemDb $criarItemDb
    )
    {
        $this->criarVendaDb = $criarVendaDb;
        $this->criarItemDb = $criarItemDb;
    }

    public function criarVenda(Request $request)
    {
        #dd($itens);
        #dd(str_replace('+', "", $itens));
        /*foreach($itens as $a):
            foreach($a as $b):
                foreach($b as $v):
                    str_replace('+', "", $v->nome);
                    str_replace('+', "", $v->preco);
                    str_replace('+', "", $v->codigo_barra);
                    str_replace('+', "", $v->unidade_medida);
                endforeach;
            endforeach;
        endforeach;
        */
        #dd($vv);
        return $this->criarVendaDb->criarVenda($request);
        #return $this->criarItemDb->criarItem($vv, $vendaId);
    }
}
