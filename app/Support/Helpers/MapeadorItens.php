<?php

namespace App\Support\Helpers;

use Illuminate\Http\Request;

class MapeadorItens
{
    private array $itens = [];

    public function sessionItens(Request $request): array
    {
        $this->request = $request;
        $session = $this->request->session()->all();
        $arrayItens = $session['itens'];
        foreach($arrayItens as $item):
            foreach($item as $i):
                array_push($this->itens, $i);
            endforeach;
        endforeach;
        return $this->itens;
    }
}
