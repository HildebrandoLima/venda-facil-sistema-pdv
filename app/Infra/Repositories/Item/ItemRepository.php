<?php

namespace App\Infra\Repositories\Item;

use App\Infra\Database\Dao\Produto\ListarProdutoDb;
use App\Infra\Database\Dao\Item\CriarVendaItemTemporarioDb;
use App\Infra\Database\Dao\Item\ListarVendaItemTemporarioDb;
use App\Infra\Database\Dao\Item\VerificarItemExisteDb;
use App\Infra\Database\Dao\Item\QuantidadeItemDb;
use App\Infra\Database\Dao\Item\RemoverVendaItemTemporarioDb;
use App\Support\Helpers\MapeadorProduto;
use Illuminate\Http\Request;

class ItemRepository
{
    private ListarProdutoDb $listarProdutoDb;
    private CriarVendaItemTemporarioDb $criarVendaItemTemporarioDb;
    private ListarVendaItemTemporarioDb $listarVendaItemTemporarioDb;
    private VerificarItemExisteDb $verificarItemExisteDb;
    private MapeadorProduto $mapeadorProduto;
    private QuantidadeItemDb $quantidadeItemDb;
    private RemoverVendaItemTemporarioDb $removerVendaItemTemporarioDb;
    private $produto;
    private $item;
    private $quantidade = 0;
    private $subtotal = 0;

    public function __construct
    (
        ListarProdutoDb $listarProdutoDb,
        CriarVendaItemTemporarioDb $criarVendaItemTemporarioDb,
        ListarVendaItemTemporarioDb $listarVendaItemTemporarioDb,
        VerificarItemExisteDb $verificarItemExisteDb,
        MapeadorProduto $mapeadorProduto,
        QuantidadeItemDb $quantidadeItemDb,
        RemoverVendaItemTemporarioDb $removerVendaItemTemporarioDb
    )
    {
        $this->listarProdutoDb = $listarProdutoDb;
        $this->criarVendaItemTemporarioDb = $criarVendaItemTemporarioDb;
        $this->listarVendaItemTemporarioDb = $listarVendaItemTemporarioDb;
        $this->verificarItemExisteDb = $verificarItemExisteDb;
        $this->mapeadorProduto = $mapeadorProduto;
        $this->quantidadeItemDb = $quantidadeItemDb;
        $this->removerVendaItemTemporarioDb = $removerVendaItemTemporarioDb;
    }

    public function getProduto(Request $request)
    {
        $this->request = $request;
        return $this->mapeadorProduto();
    }

    public function bipagemProduto($produto)
    {
        $this->item = $produto;
        return $this->criarVendaItemTemporario();
    }

    public function listarVendaItemTemporario(int $caixa)
    {
        return $this->listarVendaItemTemporarioDb->listarVendaItemTemporario('', $caixa);
    }

    private function mapeadorProduto(): array
    {
        $data = $this->listarProdutoDb->getProduto($this->request);
        $this->produto = $this->mapeadorProduto->mapeadorProduto($data);
        return $this->produto;
    }

    private function criarVendaItemTemporario(): void
    {
        $resultado = $this->verificarItemExisteDb->verificarItemExiste($this->request);
        if (!$resultado):
            $this->criarVendaItemTemporarioDb->criarVendaItemTemporario($this->item);
        else:
            $codigo_barra = $this->request->codigo_barra;
            $resultado = $this->listarVendaItemTemporarioDb->listarVendaItemTemporario($codigo_barra, 0)->toArray();
            $this->quantidade = $resultado[0]->quantidade + 1;
            $this->subtotal = $resultado[0]->preco * $resultado[0]->quantidade;
            $this->quantidadeItemDb->quantidadeItem($this->request, $this->quantidade, $this->subtotal);
        endif;
    }

    public function removerVendaItemTemporario(int $itemId): bool
    {
        return $this->removerVendaItemTemporarioDb->removerVendaItemTemporario($itemId);
    }

    public function quantidadeItem(Request $request): bool
    {
        $subTotal = $request->preco * $request->quantidade;
        return $this->quantidadeItemDb->quantidadeItem($request, $request->quantidade, $subTotal);
    }
}
