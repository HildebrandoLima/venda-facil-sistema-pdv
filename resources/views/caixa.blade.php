@extends('components.main')

@section('title', 'VendaFácil')

@section('body')

@php
    $contador = 1;
    $quantidade = 0;
    $sub_total = 0;
    $total = 0;
    $pago = 0;
    $troco = 0;
@endphp

@if($status == 'Aberto')
    <div class="alert alert-success" role="alert">
@else
    <div class="alert alert-danger" role="alert">  
@endif
        <h3 class="text-center">Caixa {{ $status }}</h3>
    </div>
    <div class="alert alert-secondary" role="alert">
    @if(isset($descricao))
        <h3 class="text-center">{{ $descricao }}</h3>
    @else
        <h3 class="text-center">Nenhum produto bipado</h3>
    @endif
    </div>

    <div class="row">
        <div class="col-md-5">
            @if($imagem)
                <img src="{{ asset('images/' . $imagem) }}" width="500" height="500" class=""/>
            @else
                <img src="{{ asset('images/logo.png') }}" width="550" height="350" class=""/>
            @endif
        </div>

        <div class="col-md-7 text-right">
            <form method="get" action="">
                <div class="input-group">
                    <div class="form-outline">
                        <input type="number" name="codigo_barra" id="codigo_barra" placeholder="Código de Barras" class="form-control" />
                    </div>
                    <button type="submit" class="btn btn-primary">+</button>
                  </div>
            </form>

            <h5><p>Resumo da Venda</p></h5>

            <div class="card shadow rounded">
                <div class="card-body">

<form action="/caixa/venda/salvar" method="post">
@csrf
<input type="hidden" name="caixa_id" value="{{ $caixa }}" />
<input type="hidden" name="user_created_at" value="1" />

                    <div class="table-response table-overflow">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Item</th>
                                    <th scope="col">Descrição</th>
                                    <th scope="col">Código Barra</th>
                                    <th scope="col">Quantidade</th>
                                    <th scope="col">Valor(U)</th>
                                    <th scope="col">Valor(T)</th>
                                    <th scope="col">Remover</th>
                                </tr>
                            </thead>
                            @foreach ($itens as $item)
                                @foreach ($item as $indice)
                                    @foreach ($indice as $value)

                                    @php
                                        $quantidade = 2;
                                        $sub_total = $value->preco_venda * $quantidade;
                                        $total += $sub_total;
                                        $troco = $pago - $total;
                                    @endphp

                                        <tbody>
                                            <tr>
                                                <th scope="row">{{ $contador++ }}</th>
                                                <input type="hidden" name="produto_id" value="{{ $value->id }}" />
                                                <td><input type="hidden" name="nome" value="{{ $value->nome }}" />{{ $value->nome }}</td>
                                                <td><input type="hidden" name="codigo_barra" value="{{ $value->codigo_barra }}" />{{ $value->codigo_barra }}</td>
                                                <td><input type="hidden" name="quantidade" value="1" />{{ $quantidade }}</td>
                                                <td><input type="hidden" name="preco" value="{{ $value->preco_venda }}" />{{ number_format($value->preco_venda, 2, ',', ' ') }}</td>
                                                <td><input type="hidden" name="sub_total" value="{{ $sub_total }}" />{{ number_format($sub_total, 2, ',', ' ') }}</td>
                                                <td>
                                                    <a href="{{ url('caixa/deletar', $contador) }}">
                                                        <button type="button" class="btn btn-danger">X</button>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                @endforeach
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="row mt-3">
        <div class="col-md-5">
        </div>

        <div class="col-md-7 text-right">
            <div class="card shadow rounded">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <h4>Total a Pagar: R$ {{ number_format($total, 2, ',', ' ') }}</h4>
                            <input type="hidden" name="quantidade_item" value="{{ $contador -1 }}" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="pagamentoModal" tabindex="-1" aria-labelledby="pagamentoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="pagamentoModalLabel">Pagamento</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="input-group mb-3">
                        <span class="input-group-text">R$</span>
                        <select name="forma_pagamento" onchange='mostraCampo(this)' class="form-select">
                            <option selected>Forma de Pagamento</option>
                            <option value="Dinheiro">Dinheiro</option>
                            <option value="Pix">Pix</option>
                            <option value="Crédito">Crédito</option>
                            <option value="Débito">Débito</option>
                        </select>
                    </div>

                    <div id="cartao" style="display:none">
                        <div class="input-group mb-3">
                            <span class="input-group-text icon fa fa-credit-card"></span>
                            <input type="number" name="numero_cartao" class="form-control" placeholder="N° Cartão" />
                        </div>

                        <div class="input-group mb-3">
                            <select class="form-select">
                                <option name="parcela" selected>Parcelas</option>
                                <option value="">Nenhuma</option>
                                <option value="1">1x</option>
                                <option value="2">2x</option>
                                <option value="3">3x</option>
                            </select>
                            <span class="input-group-text">X</span>
                            <input type="date" name="data_vencimento" class="form-control" />
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="number" name="valor_pago" value="1" placeholder="Pago" class="form-control" />
                        <span class="input-group-text">R$</span>
                        <input type="text" name="total" value="{{ number_format($total, 2, '.', ' ') }}" class="form-control" />
                        <input type="hidden" name="troco" />
                    </div>

                    <hr />
                    <h4>Total a Pagar: R$ {{ number_format($total, 2, ',', ' ') }}</h4>
                    <h4>Pago: R$ {{ number_format($pago, 2, ',', ' ') }}</h4>
                    <h4>Troco: R$ {{ number_format($troco, 2, ',', ' ') }}</h4>
                </div>

                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                    <span class="icon fa fa-xmark"></span>
                    Cancelar Venda
                </button>
                <button type="submit" class="btn btn-success">
                    <span class="icon fa fa-check"></span>
                    Finalizar Venda
                </button>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection