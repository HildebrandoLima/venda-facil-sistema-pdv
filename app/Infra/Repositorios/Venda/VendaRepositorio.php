<?php

namespace App\Infra\Repositorios\Venda;

use App\Infra\Database\Dao\Venda\CriarVendaDb;
use App\Infra\Database\Dao\Item\CriarItemDb;
use App\Infra\Database\Dao\Pagamento\CriarPagamentoDb;
use Illuminate\Http\Request;

class VendaRepositorio
{
    private CriarVendaDb $criarVendaDb;
    private CriarItemDb $criarItemDb;
    private CriarPagamentoDb $criarPagamentoDb;

    public function __construct
    (
        CriarVendaDb $criarVendaDb,
        CriarItemDb $criarItemDb,
        CriarPagamentoDb $criarPagamentoDb
    )
    {
        $this->criarVendaDb = $criarVendaDb;
        $this->criarItemDb = $criarItemDb;
        $this->criarPagamentoDb = $criarPagamentoDb;
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
        $vendaId = $this->criarVendaDb->criarVenda($request);
        $this->criarPagamentoDb->criarPagamento($request, $vendaId);
        return true;
        #return $this->criarItemDb->criarItem($vv, $vendaId);
    }
}
