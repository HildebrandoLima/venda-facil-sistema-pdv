@extends('components.main')

@section('title', 'VendaFácil')

@section('body')

    <div class="row">
        <div class="col-md-5">
            <img src="https://greenpng.com/wp-content/uploads/2022/09/Desenho-de-pastagem-1024x724.jpg" width="500" height="500" class=""/>
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
                            @php
                            $contador = 1;
                            @endphp
                            @if($contador == 0)
                                <h5><p class="text-center">Não há itens nessa venda</p></h5>
                            @else
                            @foreach ($item as $novoArray)
                                @foreach ($novoArray as $value)
                                <tbody>
                                    <tr>
                                        <th scope="row">{{ $contador++ }}</th>
                                        <td>{{ $value->nome }}</td>
                                        <td>{{ $value->codigo_barra }}</td>
                                        <td><input type="number" name="total" value="1" size="2" class="form-control" /></td>
                                        <td><input type="number" name="total" value="1" size="2" class="form-control" /></td>
                                        <td><input type="number" name="total" value="1" size="2" class="form-control" /></td>
                                        <td><button type="submit" class="btn btn-outline-danger">X</button></td>
                                    </tr>
                                </tbody>
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
                    <input type="number" name="total" class="form-control" />
                </div>
                <div class="col-3">
                    <label for="Valor" class="form-label">Valor Total</label>
                    <input type="number" name="total" class="form-control" />
                </div>
                <div class="col-3">
                    <button type="submit" class="btn btn-primary mt-4">Finalizar Venda</button>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection
