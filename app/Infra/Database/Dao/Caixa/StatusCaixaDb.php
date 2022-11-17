<?php

namespace App\Infra\Database\Dao\Caixa;

use App\Infra\Database\Config\DbBase;

class StatusCaixaDb extends DbBase {

  public function statusCaixa($caixaId,$status)
  {
    
    return $this->db
    ->table('caixa')
    ->where('id', $caixaId)
    ->update(['status' => $status]);
  }
}
