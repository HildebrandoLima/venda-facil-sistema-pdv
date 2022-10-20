<?php

namespace App\Support\Helpers\Venda;

use Illuminate\Http\Request;
use App\Infra\Database\Config\DbBase;
use Illuminate\Support\Collection;

class StatusCaixaDb extends DbBase {

  public function getStatusCaixa(): Collection
  {
    return $this->db
    ->table('caixa')
    ->select(['status as status'])
    ->get();
  }
}
