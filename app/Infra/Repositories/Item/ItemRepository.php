<?php

namespace App\Infra\Repositories\Item;

use App\Infra\Database\Dao\Produto\ListarProdutoDb;
use App\Infra\Database\Dao\Item\CriarVendaItemTemporarioDb;
use App\Infra\Database\Dao\Item\ListarVendaItemTemporarioDb;
use App\Infra\Database\Dao\Item\VerificarItemExisteDb;
use App\Infra\Database\Dao\Item\QuantidadeItemDb;
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
    private $produto;
    private $item;

    public function __construct
    (
        ListarProdutoDb $listarProdutoDb,
        CriarVendaItemTemporarioDb $criarVendaItemTemporarioDb,
        ListarVendaItemTemporarioDb $listarVendaItemTemporarioDb,
        VerificarItemExisteDb $verificarItemExisteDb,
        MapeadorProduto $mapeadorProduto,
        QuantidadeItemDb $quantidadeItemDb
    )
    {
        $this->listarProdutoDb = $listarProdutoDb;
        $this->criarVendaItemTemporarioDb = $criarVendaItemTemporarioDb;
        $this->listarVendaItemTemporarioDb = $listarVendaItemTemporarioDb;
        $this->verificarItemExisteDb = $verificarItemExisteDb;
        $this->mapeadorProduto = $mapeadorProduto;
        $this->quantidadeItemDb = $quantidadeItemDb;
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
        return $this->listarVendaItemTemporarioDb->listarVendaItemTemporario($caixa);
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
        $quantidade = 1;
        $subtotal = 0;

        if (!$resultado):
            $this->criarVendaItemTemporarioDb->criarVendaItemTemporario($this->item);
        else:
            $quantidade += $quantidade;
            $subtotal = $this->item[2] * $quantidade;
            $this->quantidadeItemDb->quantidadeItem($this->request,$quantidade, $subtotal);
        endif;
    }
}