<?php

namespace App\Infra\Database\Dao\Item;

use App\Infra\Database\Config\DbBase;

class ListarItemDb extends DbBase {

  public function listarItem()
  {
    return $this->db
    ->table('caixa')
    ->select(['status as status'])
    ->get();
  }
}
