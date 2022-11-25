@extends('components.main')

@section('title', 'VendaFácil')

@section('body')

@include('components.cabecalho')

    <div class="row">
        <div class="col-md-5">
            @if (isset($imagem))
                <img src="{{ asset('images/' . $imagem) }}" width="500" height="500" class=""/>
            @else
                <img src="{{ asset('images/logo.png') }}" width="550" height="350" class=""/>
            @endif
        </div>

        <div class="col-md-7 text-right">
            @include('components.bipagemproduto')

            <h5><p>Resumo da Venda</p></h5>

            <div class="card shadow rounded">
                <div class="card-body">

<form action="{{ route('venda') }}" method="post">
@csrf
<input type="hidden" name="caixa_id" value="{{ $caixa }}" />
<input type="hidden" name="user_created_at" value="1" />

                    <div class="table-response table-overflow">
                        @if (isset($itens) && count($itens) > 0)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Item</th>
                                    <th scope="col">Produto</th>
                                    <th scope="col">Código Barra</th>
                                    <th scope="col">Quantidade</th>
                                    <th scope="col">Valor(U)</th>
                                    <th scope="col">Valor(T)</th>
                                    <th scope="col">Remover</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $produto = 1;
                                    $sub_total = 0;
                                    $total = 0;
                                    $troco = 0;
                                    $pago = 0;
                                @endphp
                                @foreach ($itens as $key => $item)
                                @php
                                    $sub_total = $item->preco * $item->quantidade;
                                    $total += $sub_total;
                                    $troco = $pago - $total;
                                @endphp
                                    <tr>
                                        <th scope="row">{{ $produto++ }}</th>
                                        <td><input type="hidden" name="nome" value="{{ $item->nome }}" />{{ $item->nome }}</td>
                                        <td><input type="hidden" name="codigo_barra" value="{{ $item->codigo_barra }}" />{{ $item->codigo_barra }}</td>
                                        <td><input type="hidden" name="quantidade" value="{{ $item->quantidade }}" />{{ $item->quantidade }}</td>
                                        <td><input type="hidden" name="preco" value="{{ $item->preco }}" />{{ number_format($item->preco, 2, ',', ' ') }}</td>
                                        <td><input type="hidden" name="sub_total" value="{{ $sub_total }}" />{{ number_format($sub_total, 2, ',', ' ') }}</td>
                                        <td>
                                            <a href="{{ url('caixa/deletar', ['produtoId' => 0]) }}">
                                                <button type="button" class="btn btn-danger">X</button>
                                            </a>
                                        </td>
                                    </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @else
                            <h3 class="text-center">Nenhum Item Bipado</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="row mt-3">
        <div class="col-md-5">
        </div>

        <div class="col-md-7">
            <div class="card shadow rounded">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3 text-left">
                            <h4>Total a Pagar: R$ {{ number_format(@$total, 2, ',', ' ') }}</h4>
                            <input type="hidden" name="quantidade_item" value="{{ @$produto -1 }}" />
                            <input type="hidden" name="total" value="{{ @$total }}" />
                        </div>
                        <div class="col-sm-8 mt-3 text-right">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <button type="submit" class="btn btn-success">
                                <span class="icon fa fa-check"></span>
                                Finalizar Venda
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection