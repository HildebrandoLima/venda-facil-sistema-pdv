<?php

namespace App\Infra\Database\Dao\Caixa;

use App\Infra\Database\Config\DbBase;

class ListarCaixaDb extends DbBase
{
  public function getCaixa($caixaId)
  {
    return $this->db->table('caixa')->select(['id', 'status'])->where('id', $caixaId)->get();
  }
}
