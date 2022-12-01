<?php

namespace App\Infra\Database\Dao\NFe;

use App\Infra\Database\Config\DbBase;
use Illuminate\Http\Request;

class ListarNFeDb extends DbBase
{
    public function listarNFe(Request $request)
    {
        return $this->db
        ->table('nfe as n')
        ->leftleftJoin('impostos_nfe as in', 'in.nfe_id', '=', 'n.id')
        ->leftJoin('venda as v', 'v.id', '=', 'n.venda_id')
        ->leftJoin('item as i', 'i.venda_id', '=', 'v.id')
        ->leftJoin('pagamento as p', 'p.venda_id', '=', 'v.id')
        ->leftJoin('usuario as u', 'u.id', '=', 'v.usuario_id')
        ->leftJoin('endereco as e', 'e.usuario_id', '=', 'u.id')
        ->leftJoin('unidade_federativa as uf', 'uf.id', '=', 'e.uf_id')
        ->leftJoin('telefone as t', 't.usuario_id', '=', 'u.id')
        ->leftJoin('ddd as d', 'd.id', '=', 't.usuario_id')
        ->where('n.id', 1)
        ->select([
            'n.data_emissao', 'n.numero, n.serie', 'n.tipo, n.finalidade', 'n.informacao_complementar',
            'n.assinatura_digital', 'n.motivo_nfe', 'ine.icms', 'ine.pis', 'ine.cofins', 'ine.ipi', 'ine.ii',
            'v.quantidade', 'v.total', 'v.caixa_id', 'v.user_created_at', 'i.nome', 'i.preco', 'i.quantidade',
            'i.sub_total', 'p.numero_cartao', 'p.data_credito', 'p.parcela', 'p.valor_pago', 'p.troco', 'u.cpf',
            'e.logradouro', 'e.descricao', 'e.bairro', 'e.cidade', 'e.cep', 'e.uf_id', 'uf.uf', 't.numero',
            't.tipo', 'd.ddd'
        ])
        ->get();
    }
}
