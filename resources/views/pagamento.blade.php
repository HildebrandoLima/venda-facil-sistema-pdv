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

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/logo.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css' />
    <script type="text/javascript" src={{ asset('js/exibirInput.js') }}></script>
    <script type="text/javascript" src={{ asset('js/menu.js') }}></script>
    <script type="text/javascript" src={{ asset('js/relogio.js') }}></script>
    <link rel="stylesheet" href="{{ asset('css/background-image.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/barra-vertical.css') }}" type="text/css">
</head>

<body>
    <div class="row">
        <div class="col-lg-8">
            <!-- ============== COMPONENT PAY =============== -->
            <article class="card">
                <div class="card-body">
                    <h5 class="card-title">Método de Pagamento</h5>
                    <div class="accordion" id="accordion_payment">
                        <article class="accordion-item">
                            <h6 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne"> Pix
                                </button>
                            </h6>
                            <div id="collapseOne" data-bs-parent="#accordion_payment"
                                class="accordion-collapse collapse show">
                                <div class="accordion-body">
                                    <p class="text-center text-muted"> Connect your PayPal account and use it to pay
                                        your bills. <br> You'll be redirected to PayPal to add your billing information.
                                        <br><br> <a href="#"> <img
                                                src="bootstrap5-ecommerce/images/misc/btn-paypal.webp" height="32"> </a>
                                    </p>
                                </div>
                            </div>
                        </article> <!-- accardion-item end.// -->
                        <article class="accordion-item">
                            <h2 class="accordion-header"> <button class="accordion-button collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseThree"> Tranferencia Bancaria</button>
                            </h2>
                            <div id="collapseThree" data-bs-parent="#accordion_payment"
                                class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    <p> Bank of America, Account number: 12345678912346 <br> IBAN: 12345, SWIFT: 987654
                                    </p>
                                </div>
                            </div>
                        </article> <!-- accardion-item end.// -->
                    </div> <!-- accardion-item end.// -->
                </div> <!-- card-body end.// -->
            </article> <!-- card end.// -->
            <!-- ============== COMPONENT PAY .// =============== -->
        </div> <!-- col.// -->
        <aside class="col-lg-4">
            <!-- ============== COMPONENT PAYMENT MINI =============== -->
            <article class="card">
                <div class="card-body">
                    <h5 class="card-title">Forma de Pagamento</h5>
                    <form role="form">
                        <div class="col mb-3"> <label class="form-label">Nome ou Cartão</label> <input type="text"
                                class="form-control" name="username" placeholder="Ex. João Carlos" required=""> </div>
                        <!-- col end.// -->
                        <div class="col mb-3"> <label class="form-label">Numero do Cartão</label>
                            <div class="input-group"> <input type="text" class="form-control" id="cardNumber"
                                    name="cardNumber"> <span class="input-group-text"> <i class="fab fa-cc-visa"></i>
                                    &nbsp; <i class="fab fa-cc-amex"></i> &nbsp; <i class="fab fa-cc-mastercard"></i>
                                </span> </div> <!-- input-group end.// -->
                        </div> <!-- col end.// -->
                        <div class="row mb-4">
                            <div class="col-auto mb-3"> <label class="form-label"> Expiração </label>
                                <div class="input-group"> <select class="form-select" style="width: 120px;">
                                        <option value="0">MM</option>
                                        <option value="1">01 - Janiary</option>
                                        <option value="2">02 - February</option>
                                        <option value="3">03 - February</option>
                                    </select> <select class="form-select" style="width: 120px;">
                                        <option value="1">YY</option>
                                        <option value="2">2018</option>
                                        <option value="3">2019</option>
                                    </select> </div>
                            </div> <!-- col end.// -->
                            <div class="col-3"> <label class="form-label" data-bs-toggle="tooltip"
                                    title="3 digits on back side of the card"> CVV <i class="fa fa-question-circle"></i>
                                </label> <input class="form-control" id="cvv" required="" type="text"
                                    style="width: 110px;"> </div> <!-- col end.// -->
                        </div> <!-- row end.// --> <button class="btn w-100 btn-success">Pay $230</button>
                    </form>
                </div>
            </article><!-- ============== COMPONENT PAYMENT MINI .// =============== -->
        </aside> <!-- col.// -->


    </div>

    <div class="container mt-3">
        <form action="{{ route('pagamento') }}" method="post">
            @csrf
            <input type="hidden" name="venda_id" value="{{ $vendaId }}">
            <input type="hidden" name="user_created_at" value="{{ session()->get('matricula') }}">
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

                    <h4><input type="number" name="valor_pago" placeholder="Digite o valor dado" class="form-control" />
                    </h4>
                    <h4><input type="number" name="troco" placeholder="Troco" value="{{ $troco < 0 ? '' : $troco }}"
                            class="form-control" /></h4>
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
                    <input type="text" name="total" value="{{ number_format($total, 2, '.', ' ') }}"
                        class="form-control" />
                </div>
            </div>

            <button type="submit" class="btn btn-success">
                <span class="icon fa fa-check"></span>
                Pagar
            </button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
