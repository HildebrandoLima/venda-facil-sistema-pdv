<?php

namespace App\Infra\Database\Dao\Caixa;

use App\Infra\Database\Config\DbBase;

class StatusCaixaDb extends DbBase
{
  public function statusCaixa(int $caixaId, string $status): bool
  {
    return $this->db
    ->table('caixa')
    ->where('id', $caixaId)
    ->update(['status' => $status]);
  }
}
