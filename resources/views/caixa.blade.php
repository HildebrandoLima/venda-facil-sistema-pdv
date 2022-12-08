@extends('components.main')

@section('title', 'VendaFácil')

@section('body')

@include('components.cabecalho')

@extends('components.modalajuda')
@extends('components.modalabrircaixa')
@extends('components.modalfecharcaixa')
@extends('components.modalidentificarcliente')
@extends('components.modaladicionarunidade')

@php
    $produto = 1;
    $sub_total = 0;
    $total = 0;
@endphp

<div class="row">
    <div class="col-sm-6">
        <div class="card shadow rounded">
            <div class="card-body">
                <div class="card shadow rounded">
                    <div class="card-body">
                        @include('components.bipagemproduto')
                    </div>
                </div>

                <div class="card shadow rounded mt-3">
                    <div class="card-body d-flex justify-content-center">
                        @if (isset($data['imagem']))
                        <img src="{{ asset('images/' . $data['imagem']) }}" width="400" height="400" class="mt-3"/>
                    @else
                        <img src="{{ asset('images/carrinho-compras.png') }}" width="450" height="300" class="mt-3"/>
                    @endif
                    </div>
                </div>

                <div class="card shadow rounded mt-3">
                    <div class="card-body">
                        <div class="input-group mb-3">
                            <input type="text" value="QTD: {{ $data['quantidade'] ?? 0 }}" class="form-control" disabled />
                            <input type="text" value="V(U) R${{ number_format($data['preco'] ?? 0, 2, ',', ' ') }}" class="form-control" disabled />
                            <input type="text" value="V(T) R${{ number_format($data['preco'] ?? 0, 2, ',', ' ') }}" class="form-control" disabled />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="card shadow rounded">
            <div class="card-body">
                <div class="card shadow rounded mt-3">
                    <div class="card-body">
                        <p class="text-center">Resumo da Venda</p>
                        <div class="table-response table-overflow">
                            @if (isset($itens) && count($itens) > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ITEM</th>
                                        <th scope="col">COD BARRA</th>
                                        <th scope="col">PRODUTO</th>
                                        <th scope="col">QTD</th>
                                        <th scope="col">V(U)</th>
                                        <th scope="col">V(T)</th>
                                        <th scope="col">REMOVER</th>
                                    </tr>
                                </thead>
                                @foreach ($itens as $key => $item)
                                @php
                                    $sub_total = $item->preco * $item->quantidade;
                                    $total += $sub_total;
                                @endphp
                                <tbody>
                                    <tr>
                                        <th scope="row">{{ $produto++ }}</th>
                                        <td>{{ $item->codigo_barra }}</td>
                                        <td>{{ $item->nome }}</td>
                                        <td>{{ $item->quantidade }}</td>
                                        <td>R${{ number_format($item->preco, 2, ',', ' ') }}</td>
                                        <td>R${{ number_format($sub_total, 2, ',', ' ') }}</td>
                                        <td>
                                            <a href="{{ route('remover', $item->id) }}">
                                                <button type="button" id="removerItem" class="btn btn-danger">X</button>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                            <h3 class="text-center">Nenhum Item na Venda</h3>
                        @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="card shadow rounded mt-3">
                            <div class="card-body">
                                @if($data['status'] == 'Aberto')
                                <div class="alert alert-success mt-3" role="alert">
                                    <h4 class="text-center">Caixa {{ $data['status'] }}</h4>
                                </div>
                                @else
                                <div class="alert alert-danger mt-3" role="alert">
                                    <h4 class="text-center">Caixa {{ $data['status'] }}</h4>
                                </div>
                                @endif
                                <br />
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow rounded mt-3">
                            <div class="card-body">
                                <h4>Total de Itens: {{ @$produto -1 }}</h4>
                                <h4>Total a Pagar R${{ number_format(@$total, 2, ',', ' ') }}</h4>

                                <form action="{{ route('venda') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="quantidade_item" value="{{ @$produto -1 }}" />
                                    <input type="hidden" name="total" value="{{ @$total }}" />
                                    <input type="hidden" name="caixa_id" value="{{ session()->get('caixaId') }}" required />
                                    <input type="hidden" name="usuario_id" value="{{ session()->get('usuarioId') }}" />
                                    <input type="hidden" name="user_created_at" value="{{ session()->get('matricula') }}" />

                                    <div class="input-group mb-3">
                                        <input type="number" name="valor_pago" placeholder="A Pagar" class="form-control" />
                                        <button type="submit" id="finalizarVenda" class="btn btn-success">
                                            <span class="icon fa fa-check"></span>
                                            Finalizar Venda
                                        </button>         
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card shadow rounded mt-3">
    <div class="card-body">
       <center>
            @include('components.menu')
       </center>
    </div>
</div>

@endsection