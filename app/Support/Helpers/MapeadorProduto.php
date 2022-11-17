<?php

namespace App\Support\Helpers;

use Illuminate\Http\Request;

class MapeadorProduto
{
    private array $produto = [];

    public function mapeadorProduto($data): array
    {
        foreach($data as $p):
            foreach($p as $value):
                array_push($this->produto, $value);
            endforeach;
        endforeach;
        return $this->produto;
    }
}
