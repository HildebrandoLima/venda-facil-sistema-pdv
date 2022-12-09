<?php

namespace App\Infra\Repositories\Item;

use App\Infra\Database\Dao\Item\CriarVendaItemTemporarioDb;
use App\Infra\Database\Dao\Item\ListarVendaItemTemporarioDb;
use App\Infra\Database\Dao\Item\VerificarItemExisteDb;
use App\Infra\Database\Dao\Item\QuantidadeItemDb;
use App\Infra\Database\Dao\Item\RemoverVendaItemTemporarioDb;
use Illuminate\Http\Request;
use stdClass;

class ItemRepository
{
    private CriarVendaItemTemporarioDb $criarVendaItemTemporarioDb;
    private ListarVendaItemTemporarioDb $listarVendaItemTemporarioDb;
    private VerificarItemExisteDb $verificarItemExisteDb;
    private QuantidadeItemDb $quantidadeItemDb;
    private RemoverVendaItemTemporarioDb $removerVendaItemTemporarioDb;
    private $quantidade = 1;

    public function __construct
    (
        CriarVendaItemTemporarioDb $criarVendaItemTemporarioDb,
        ListarVendaItemTemporarioDb $listarVendaItemTemporarioDb,
        VerificarItemExisteDb $verificarItemExisteDb,
        QuantidadeItemDb $quantidadeItemDb,
        RemoverVendaItemTemporarioDb $removerVendaItemTemporarioDb
    )
    {
        $this->criarVendaItemTemporarioDb = $criarVendaItemTemporarioDb;
        $this->listarVendaItemTemporarioDb = $listarVendaItemTemporarioDb;
        $this->verificarItemExisteDb = $verificarItemExisteDb;
        $this->quantidadeItemDb = $quantidadeItemDb;
        $this->removerVendaItemTemporarioDb = $removerVendaItemTemporarioDb;
    }

    public function criarVendaItemTemporario(stdClass $item): bool
    {
        $resultado = $this->verificarItemExisteDb->verificarItemExiste($item->codigo_barra);
        if (!$resultado):
            $this->criarVendaItemTemporarioDb->criarVendaItemTemporario($item);
        else:
            $quant = $this->quantidade + 1;
            $subTotal = $item->preco_venda * $quant;
            $this->quantidadeItemDb->quantidadeItem($item->codigo_barra, $quant, $subTotal);
        endif;
        return true;
    }

    public function listarVendaItemTemporario(int $caixa)
    {
        return $this->listarVendaItemTemporarioDb->listarVendaItemTemporario('', $caixa);
    }

    public function removerVendaItemTemporario(int $itemId): bool
    {
        return $this->removerVendaItemTemporarioDb->removerVendaItemTemporario($itemId);
    }

    public function quantidadeItem(Request $request): bool
    {
        $subTotal = $request->preco * $request->quantidade;
        return $this->quantidadeItemDb->quantidadeItem($request->codigo_barra, $request->quantidade, $subTotal);
    }
}
