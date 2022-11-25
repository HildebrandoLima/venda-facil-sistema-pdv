<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/logo.png') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">	
        <link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'/>
        <script type="text/javascript" src={{ asset('js/exibirInput.js') }}></script>
        <script type="text/javascript" src={{ asset('js/menu.js') }}></script>
        <script type="text/javascript" src={{ asset('js/relogio.js') }}></script>
        <link rel="stylesheet" href="{{ asset('css/background-image.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/barra-vertical.css') }}" type="text/css">
        <title>Pagamento</title>
    </head>
    <body>

        <div class="container mt-3">
            <form action="{{ route('pagamento') }}" method="post">
                @csrf
                <input type="hidden" name="venda_id" value="{{ $vendaId }}">
                <input type="hidden" name="user_created_at" value="1">
                <div class="row">
                    <div class="col mb-6">
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
                    </div>
                    <div class="col mb-6">
                        @php $troco = @$pago - $total @endphp

                        <h4><input type="number" name="valor_pago" placeholder="Digite o valor dado" class="form-control"/></h4>
                        <h4><input type="number" name="troco" placeholder="Troco" value="{{ $troco < 0 ? '' : $troco }}" class="form-control"/></h4>
                        <h4>Total a Pagar: R$ {{ number_format($total, 2, ',', ' ') }}</h4>
                    </div>
                </div>

                <div id="cartao" style="display:none">
                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text icon fa fa-credit-card"></span>
                        <input type="number" name="numero_cartao" class="form-control" placeholder="N° Cartão" />
                        <span class="input-group-text">X</span>
                        <select class="form-select">
                            <option name="parcela" selected>Parcelas</option>
                            <option value="1">1x</option>
                            <option value="2">2x</option>
                            <option value="3">3x</option>
                        </select>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">X</span>
                        <input type="date" name="data_vencimento" class="form-control" />
                        <span class="input-group-text">R$</span>
                        <input type="text" name="total" value="{{ number_format($total, 2, '.', ' ') }}" class="form-control" />
                    </div>
                </div>

                <button type="submit" class="btn btn-success">
                    <span class="icon fa fa-check"></span>
                    Pagar
                </button>
            </form>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>