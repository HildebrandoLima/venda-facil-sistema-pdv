@extends('components.main')

@section('title', 'VendaFácil')

@section('body')

@php
$contador = 1;
@endphp

@if($status == 'Aberto')
    <div class="alert alert-success" role="alert">
@else
    <div class="alert alert-danger" role="alert">  
@endif
        <h3 class="text-center">Caixa {{ $status }}</h3>
    </div>

    <div class="row">
        <div class="col-md-5">
            <img src="{{ asset('images/5954b954deaf2c03413be345.png') }}" width="500" height="500" class=""/>
        </div>

        <div class="col-md-7 text-right">
            <form method="get" action="">
                <div class="input-group">
                    <div class="form-outline">
                        <input type="number" name="codigo_barra" id="codigo_barra" placeholder="Código de Barras" class="form-control" />
                    </div>
                    <button type="submit" class="btn btn-outline-primary">+</button>
                  </div>
            </form>

            <h5><p>Resumo da Venda</p></h5>

            <div class="card shadow rounded">
                <div class="card-body">

<form action="venda/salvar" method="post">
@csrf
<input type="hidden" name="caixa_id" value="1" />
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
                                    @forelse ($indice as $value)
                                        <tbody>
                                            <tr>
                                                <th scope="row">{{ $contador++ }}</th>
                                                <td><input type="hidden" name="nome" value="{{ $value->nome }}" />{{ $value->nome }}</td>
                                                <td><input type="hidden" name="codigo_barra" value="{{ $value->codigo_barra }}" />{{ $value->codigo_barra }}</td>
                                                <td><input type="hidden" name="quantidade" value="1" />2</td>
                                                <td><input type="hidden" name="preco" value="1" />1,00</td>
                                                <td><input type="hidden" name="sub_total" value="1" />2,00</td>
                                                <td>
                                                    <a href="{{ url('caixa/deletar', $contador) }}">
                                                        <button type="button" class="btn btn-outline-danger">X</button>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                        @empty
                                        <h5><p class="text-center">Não há itens nessa venda</p></h5>
                                    @endforelse
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
            <u><b>Sobre o Sistema</b></u><br />
            <span><b>Terminal: </b>00{{ $terminal }}<br /></span>
            <span><b>Operador: </b>0123456789<br /></span>
            <span><b>Cliente: </b>012.345.678-09<br /></span>
            <span><b>@php echo date('d-m-Y') @endphp <div class="relogio"></div></b><br /></span>
        </div>

        <div class="col-md-7 text-right">
            <div class="card shadow rounded">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            Total: R$ 8,00
                            <input type="hidden" name="total" value="1" />
                        </div>
                        <div class="col-3">
                            <button type="submit" class="btn btn-primary">
                                <span class="icon fa fa-money"></span>
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
