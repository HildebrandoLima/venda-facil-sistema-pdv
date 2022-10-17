<?php

namespace App\Domains\Carga\Models;

use App\Support\Models\Model;
use JetBrains\PhpStorm\Pure;

class CargaListingModel extends Model
{
    protected int $numeroPedido;
    protected int $cargaId;
    protected int $pedidoId;
    protected string $dataCriacao;
    protected string $codigo;
    protected string $status;
    protected int $perPage;
    protected int $page;


    #[Pure] public static function builder(): static
    {
        return new CargaListingModel();
    }

    /**
     * @return string
     */
    public function getNumeroPedido(): string
    {
        return $this->numeroPedido;
    }

    /**
     * @param string $numeroPedido
     * @return CargaListingModel
     */
    public function setNumeroPedido(string $numeroPedido): CargaListingModel
    {
        $this->numeroPedido = $numeroPedido;
        return $this;
    }

    /**
     * @return int
     */
    public function getCargaId(): int
    {
        return $this->cargaId;
    }

    /**
     * @param int $cargaId
     * @return CargaListingModel
     */
    public function setCargaId(int $cargaId): CargaListingModel
    {
        $this->cargaId = $cargaId;
        return $this;
    }

    /**
     * @return int
     */
    public function getPedidoId(): int
    {
        return $this->pedidoId;
    }

    /**
     * @param int $pedidoId
     * @return CargaListingModel
     */
    public function setPedidoId(int $pedidoId): CargaListingModel
    {
        $this->pedidoId = $pedidoId;
        return $this;
    }

    /**
     * @return string
     */
    public function getDataCriacao(): string
    {
        return $this->dataCriacao;
    }

    /**
     * @param string $dataCriacao
     * @return CargaListingModel
     */
    public function setDataCriacao(string $dataCriacao): CargaListingModel
    {
        $this->dataCriacao = $dataCriacao;
        return $this;
    }

    /**
     * @return string
     */
    public function getCodigo(): string
    {
        return $this->codigo;
    }

    /**
     * @param string $codigo
     * @return CargaListingModel
     */
    public function setCodigo(string $codigo): CargaListingModel
    {
        $this->codigo = $codigo;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return CargaListingModel
     */
    public function setStatus(string $status): CargaListingModel
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return int
     */
    public function getPerPage(): int
    {
        return $this->perPage;
    }

    /**
     * @param int $perPage
     * @return CargaListingModel
     */
    public function setPerPage(int $perPage): CargaListingModel
    {
        $this->perPage = $perPage;
        return $this;
    }

    /**
     * @return int
     */
    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * @param int $page
     * @return CargaListingModel
     */
    public function setPage(int $page): CargaListingModel
    {
        $this->page = $page;
        return $this;
    }
}
