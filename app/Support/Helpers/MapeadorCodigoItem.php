<?php

namespace App\Support\Helpers;

class MapeadorCodigoItem
{
    private array $codigoItens = [];

    public function mapeadorCodigoItem($itens): array
    {
        foreach($itens as $item):
                array_push($this->codigoItens, $item->id);
        endforeach;
        return $this->codigoItens;
    }
}
