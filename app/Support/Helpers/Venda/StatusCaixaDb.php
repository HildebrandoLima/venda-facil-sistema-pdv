<?php

namespace App\Support\Helpers\Venda;

use App\Infra\Database\Config\DbBase;

class StatusCaixaDb extends DbBase {

  public function getStatusCaixa()
  {
    return $this->db
    ->table('caixa')
    ->select(['status as status'])
    ->get();
  }
}
