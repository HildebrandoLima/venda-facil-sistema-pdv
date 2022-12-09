@extends('components.main')

@section('title', 'Pagamento')

@section('body')

@php
    $troco = 0;
    $troco = session()->get('valorPago') - session()->get('total');
    $valorPago = session()->get('valorPago');
@endphp

<h5 class="card-title text-center">Método de Pagamento</h5>
<div class="row">
    <div class="col-sm-6">
        <div class="card shadow rounded">
            <div class="card-body">
                <div class="card shadow rounded">
                    <div class="card-body">
                        @if(isset($valorPago))
                            @include('components.payment.dinheiro', [$troco])
                        @else
                            @include('components.payment.cartao')
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="card shadow rounded">
            <div class="card-body">
                <div class="card shadow rounded">
                    <div class="card-body">
                        <h4>Valor Pago: R${{ number_format($valorPago ?? 0, 2, ',', ' ') }}</h4>
                        <h4>Troco: R${{ number_format($troco ?? 0, 2, ',', ' ') }}</h4>
                        <h4>Total a Pagar R${{ number_format(session()->get('total'), 2, ',', ' ') }}</h4>
                        <br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection