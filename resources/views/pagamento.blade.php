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

@php
    $troco = 0;
    $troco = session()->get('valorPago') - session()->get('total');
    $valorPago = session()->get('valorPago');
@endphp

    <body>
        <div class="container mt-3">
            <h5 class="card-title text-center">Método de Pagamento</h5>
                <div class="row">
                    @if(isset($valorPago))
                        <aside class="col-lg-15 mt-3">
                            <form action="{{ route('salvarpagamento') }}" method="post">
                            @csrf
                            <input type="hidden" name="venda_id" value="{{ session()->get('vendaId') }}" />
                            <input type="hidden" name="user_created_at" value="{{ session()->get('matricula') }}" />
                                <article class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Método Escolhido - Dinheiro</h5>
                                            <div class="col mb-3">
                                                <label class="form-label">Total</label>
                                                <div class="input-group">
                                                    <input type="number" name="total" value="{{ session()->get('total') }}" class="form-control" required />
                                                    <span class="input-group-text"><i class="icon fa fa-money"></i></span>
                                                </div>
                                            </div>

                                            <div class="col mb-3">
                                                <label class="form-label">Pago</label>
                                                <div class="input-group">
                                                    <input type="text" name="valor_pago" value="{{ session()->get('valorPago') }}" class="form-control" required />
                                                    <span class="input-group-text"><i class="icon fa fa-money"></i></span>
                                                </div>
                                            </div>

                                            <div class="col mb-3">
                                                <label class="form-label">Troco</label>
                                                <div class="input-group">
                                                    <input type="hidden" name="troco" value="{{ $troco }}" class="form-control" required />
                                                    <input type="text" value="{{ number_format($troco, 2, ',', ' ') }}" class="form-control" required />
                                                    <span class="input-group-text"><i class="icon fa fa-money"></i></span>
                                                </div>
                                            </div>

                                            <div class="col mb-3">
                                                <div class="input-group">
                                                    <select name="metodo_pagamento_id" class="form-select">
                                                        <option value="" selected>Tipo de Pagamento</option>
                                                        <option value="2">Dinheiro</option>
                                                        <option value="4">Pix</option>
                                                    </select>
                                                    <span class="input-group-text"><i class="icon fa fa-money"></i></span>
                                                </div>
                                            </div>
                                        <button class="btn w-100 btn-success">Total a Pagar R${{ number_format(session()->get('total'), 2, ',', ' ') }}</button>
                                    </div>
                                </article>
                            </form>
                        </aside>
                    @else
                        <aside class="col-lg-15 mt-3">
                            <form action="{{ route('salvarpagamento') }}" method="post">
                            @csrf
                            <input type="hidden" name="venda_id" value="{{ session()->get('vendaId') }}" />
                            <input type="hidden" name="user_created_at" value="{{ session()->get('matricula') }}" />
                            <input type="hidden" name="total" value="{{ session()->get('total') }}" />
                            <input type="hidden" name="identificador_metodo_pagamento_id" value="102" />
                                <article class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Método Escolhido - Cartão</h5>
                                            <div class="col mb-3">
                                                <label class="form-label">Número do Cartão</label>
                                                <div class="input-group">
                                                    <input type="text" name="numero_cartao" value="1111222233334444" class="form-control" required />
                                                    <span class="input-group-text"><i class="icon fa fa-credit-card"></i></span>
                                                </div>
                                            </div>

                                            <div class="col mb-3">
                                                <label class="form-label">Expiração</label>
                                                <div class="input-group">
                                                    <input type="date" name="data_credito" class="form-control" required />
                                                    <span class="input-group-text"><i class="icon fa fa-calendar"></i></span>
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col mb-3">
                                                    <div class="input-group">
                                                        <select name="metodo_pagamento_id" onchange='mostraCampo(this)' class="form-select">
                                                            <option value="" selected>Tipo de Cartão</option>
                                                            <option value="1">Crédito</option>
                                                            <option value="3">Débito</option>
                                                        </select>
                                                        <span class="input-group-text"><i class="icon fa fa-credit-card"></i></span>
                                                        <div id="cartao" style="display:none">
                                                            <select name="parcela" class="form-select">
                                                                <option value="0" selected>Parcelas</option>
                                                                <option value="1">1x</option>
                                                                <option value="2">2x</option>
                                                                <option value="3">3x</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <button class="btn w-100 btn-success">Total a Pagar R${{ number_format(session()->get('total'), 2, ',', ' ') }}</button>
                                    </div>
                                </article>
                            </form>
                        </aside>
                    @endif
                </div>
            </form>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>