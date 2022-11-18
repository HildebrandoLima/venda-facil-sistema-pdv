<?php

namespace App\Infra\Database\Dao\Caixa;

use Illuminate\Http\Request;
use App\Infra\Database\Config\DbBase;

class StatusCaixaDb extends DbBase {

  public function statusCaixa(Request $request)
  {
    return $this->db
    ->table('caixa')
    ->where('id', $request->caixa_id)
    ->update([
      'status' => $request->aberto
    ]);
  }
}
