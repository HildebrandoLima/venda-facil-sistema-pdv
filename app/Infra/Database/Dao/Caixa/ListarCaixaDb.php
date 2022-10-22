<?php

namespace App\Infra\Database\Dao\Caixa;

use App\Infra\Database\Config\DbBase;

class ListarCaixaDb extends DbBase {

  public function getStatusCaixa()
  {
    return $this->db
    ->table('caixa')
    ->select(['status'])
    ->get();
  }
}
