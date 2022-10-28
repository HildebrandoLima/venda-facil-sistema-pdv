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
                            @if($contador == 0)
                                <h5><p class="text-center">Não há itens nessa venda</p></h5>
                            @else
                            @foreach ($itens as $item)
                                @foreach ($item as $indice)
                                    @foreach ($indice as $value)
                                        <tbody>
                                            <tr>
                                                <th scope="row">{{ $contador++ }}</th>
                                                <td>{{ $value->nome }}</td>
                                                <td>{{ $value->codigo_barra }}</td>
                                                <td><input type="number" name="total" value="1" size="2" class="form-control" /></td>
                                                <td><input type="number" name="total" value="1" size="2" class="form-control" /></td>
                                                <td><input type="number" name="total" value="1" size="2" class="form-control" /></td>
                                                <td>
                                                    <a href="{{ url('caixa/deletar', $contador) }}">
                                                        <button type="button" class="btn btn-outline-danger">X</button>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                @endforeach
                            @endforeach
                            @endif
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
                            <label for="Total" class="form-label">Valor Total</label>
                            <input type="number" name="total" class="form-control" />
                        </div>
                        <div class="col-3">
                            <label for="Troco" class="form-label">Troco</label>
                            <input type="number" name="troco" class="form-control" />
                        </div>
                        <div class="col-3 mt-3">
                            <button type="submit" class="btn btn-primary mt-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z"/>
                                    <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z"/>
                                    <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z"/>
                                    <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z"/>
                                </svg>
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
