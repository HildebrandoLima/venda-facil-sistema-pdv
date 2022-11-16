<?php

namespace App\Support\Helpers;

use Illuminate\Http\Request;

class MapeadorProduto
{
    private array $produto = [];

    public function mapperProduto(Request $request): array
    {
        foreach($request->codigo_barra as $item):
            foreach($item as $p):
                array_push($this->produto, $p);
            endforeach;
        endforeach;
        return $this->produto;
    }
}
