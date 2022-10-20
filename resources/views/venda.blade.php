@extends('components.main')

@section('title', 'VendaFácil')

@section('body')

@if($status === 'Aberto')
<div class="alert alert-success text-center" role="alert">
    <h3>Caixa Aberto</h3>
</div>
@else
<div class="alert alert-danger text-center" role="alert">
    <h3>Caixa Fechado</h3>
</div>
@endif

<div class="row">
    <div class="col-md-6">
        <form>
            <div class="row">
                <div class="col-3">
                    <label for="Quantidade" class="form-label">Quantidade</label>
                    <input type="numer" name="quantidade" class="form-control" />
                </div>
                <div class="col">
                    <p class="text-center">X</p>
                </div>
                <div class="col-8">
                    <label for="DescricaoProduto" class="form-label">Descrição do Produto</label>
                    <input type="text" name="descricao" class="form-control" />
                </div>
            </div>

            <div class="row">
                <div class="col-8">
                    <label for="CodigoBarra" class="form-label">Código de Barras</label>
                    <input type="number" name="codigo_barra" class="form-control" />
                </div>
                <div class="col-3">
                    <label for="Valor" class="form-label">Valor</label>
                    <input type="number" name="valor" class="form-control" />
                </div>
            </div>
        </form>
    </div>

    <div class="col-md-6 text-right">
        Resumo da Venda
        <div class="card shadow rounded">
            <div class="card-body">
                <div class="table-response">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Item</th>
                                <th scope="col">Descrição</th>
                                <th scope="col">Quantidade</th>
                                <th scope="col">Valor(U)</th>
                                <th scope="col">Valor(T)</th>
                                <th scope="col">Remover</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                                <td>X</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                                <td>@mdo</td>
                                <td>X</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td colspan="2">Larry the Bird</td>
                                <td>@twitter</td>
                                <td>@mdo</td>
                                <td>X</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-6">
        <u><b>Sobre o Sistema</b></u><br />
        <span><b>Terminal: </b>001<br /></span>
        <span><b>Operador: </b>0123456789<br /></span>
        <span><b>Cliente: </b>0123456789<br /></span>
        <span><b>17/10/2022 - 13:47:58</b><br /></span>
    </div>

    <div class="col-md-6 text-right">
        <div class="row">
            <div class="col-3">
                <label for="TotalItens" class="form-label">Total de Itens</label>
                <input type="number" name="codigo_barra" class="form-control" />
            </div>
            <div class="col-3">
                <label for="Valor" class="form-label">Valor Total</label>
                <input type="number" name="total" class="form-control" />
            </div>
        </div>
    </div>
</div>

@endsection
