<?php

namespace App\Infra\Database\Dao\NFe;

use App\Infra\Database\Config\DbBase;

class ListarNFeDb extends DbBase
{
    private int $vendaId;

    public function listarNFe(int $vendaId)
    {
        $this->vendaId = $vendaId;
        return collect([
            'nfe' => $this->nfe()[0],
            'itens' => $this->itens()
        ]);
    }

    private function nfe()
    {
        return $this->db
        ->table('nfe as n')
        ->leftJoin('imposto_nfe as in', 'in.nfe_id', '=', 'n.id')
        ->leftJoin('venda as v', 'v.id', '=', 'n.venda_id')
        ->leftJoin('pagamento as p', 'p.venda_id', '=', 'v.id')
        ->leftJoin('usuario as u', 'u.id', '=', 'v.usuario_id')
        ->leftJoin('endereco as e', 'e.usuario_id', '=', 'u.id')
        ->leftJoin('unidade_federativa as uf', 'uf.id', '=', 'e.uf_id')
        ->where('v.id', $this->vendaId)
        ->select([
            'n.data_emissao', 'n.numero', 'n.serie', 'n.tipo', 'n.finalidade', 'n.informacao_complementar',
            'n.assinatura_digital', 'n.motivo_nfe', 'in.icms', 'in.pis', 'in.cofins', 'in.ipi', 'in.ii',
            'v.quantidade', 'v.total', 'v.caixa_id', 'v.user_created_at', 'p.numero_cartao', 'p.data_credito',
            'p.parcela', 'p.valor_pago', 'p.troco', 'u.nome', 'u.cpf'
        ])
        ->get();
    }

    private function itens()
    {
        return $this->db
        ->table('venda as v')
        ->leftJoin('item as i', 'i.venda_id', '=', 'v.id')
        ->select([
            'i.nome', 'i.preco', 'i.quantidade', 'i.codigo_barra', 'i.sub_total'
        ])
        ->where('v.id', $this->vendaId)
        ->get();
    }
}
