@php
    $itemId = 1;
@endphp
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>NF-e</title>
    </head>
    <body>
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <center><b>VENDA FÁCIL - PDV</b></center>
                        <center><b>CNPJ: 99.999.999/9999</b></center>
                        <center><b>RUA PRINCIPAL N°123, CENTRO - CE</b></center>
                    </tr>
                </thead>
            </table>
            -----------------------------------------------------------------------------------------------------
            <center><b>***CUPOM NÃO FISCAL***</b></center>
            -----------------------------------------------------------------------------------------------------
            <p class="text-center"><b>DETALHE VENDA</b></p>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ITEM</th>
                        <th scope="col">COD DE BARRAS</th>
                        <th scope="col">DESCRIÇÃO</th>
                        <th scope="col">QTD</th>
                        <th scope="col">V (U)</th>
                        <th scope="col">X</th>
                        <th scope="col">V (T)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['itens'] as $item)
                    <tr>
                        <th scope="row">00{{ $itemId++ }}</th>
                        <td>{{ $item->codigo_barra }}</td>
                        <td>{{ $item->nome }}</td>
                        <td>{{ $item->quantidade }}</td>
                        <td>R${{ number_format($item->preco, 2, ',', ' ') }}</td>
                        <td>X</td>
                        <td>R${{ number_format($item->sub_total, 2, ',', ' ') }}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td><b>TOTAL:</b></td>
                        <td></td><td></td><td></td><td></td><td></td>
                        <td><b>R${{ number_format($data['nfe']->total ?? 0, 2, ',', ' ') }}</b></td>
                    </tr>
                </tbody>
            </table>
            -----------------------------------------------------------------------------------------------------
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">FORMA DE PAGAMENTO</th>
                        <th scope="col">VALOR PAGO</th>
                        <th scope="col">TROCO</th>
                        <th scope="col">TOTAL</th>
                    </tr>
                    <tbody>
                        <td>{{ isset($data['nfe']->numero_cartao) ? 'CARTÃO' : 'DINHEIRO' }}</td>
                        <td>R${{ number_format($data['nfe']->valor_pago ?? 0, 2, ',', ' ') }}</td>
                        <td>R${{ number_format($data['nfe']->troco ?? 0, 2, ',', ' ') }}</td>
                        <td>R${{ number_format($data['nfe']->total ?? 0, 2, ',', ' ') }}</td>
                    </tbody>
                </thead>
            </table>
            -----------------------------------------------------------------------------------------------------
            <center><b>DADOS DO CONSUMIDOR</b></center>
            <table class="table">
                <thead>
                    <tr>
                        <center><b>NOME: {{ $data['nfe']->nome ?? 'NÃO INFORMADO' }}</b></center>
                        <center><b>CPF: {{ $data['nfe']->cpf ?? 'NÃO INFORMADO' }}</b></center>
                    </tr>
                </thead>
            </table>
            -----------------------------------------------------------------------------------------------------
            <table class="table">
                <thead>
                    <tr>
                        <center><b>N°: {{ $data['nfe']->numero ?? 0 }} SÉRIE: {{ $data['nfe']->serie ?? 0 }}</b></center>
                        <center><b>{{ date_format(new DateTime($data['nfe']->data_emissao ?? ''), 'd-m-Y H:m:s') }}</b></center>
                    </tr>
                    <tr>
                        <center>ATENÇÃO: ESTÁ NOTA NÃO É FISCAL</center>
                    </tr>
                </thead>
            </table>
        </div>

        @if(isset($data['nfe']->numero_cartao))
        <p class="break"></p>

        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">FORMA DE PAGAMENTO</th>
                        <th scope="col">VALOR PAGO</th>
                        <th scope="col">TROCO</th>
                        <th scope="col">TOTAL</th>
                    </tr>
                    <tbody>
                        <td>{{ $data['nfe']->numero_cartao ? 'CARTÃO' : 'DINHEIRO' }} {{ $data['nfe']->parcela }}X</td>
                        <td>R$00,00</td>
                        <td>R$00,00</td>
                        <td>R${{ number_format($data['nfe']->total ?? 0, 2, ',', ' ') }}</td>
                    </tbody>
                </thead>
            </table>
        </div>
        @endif
    </body>

    <style type="text/css">
        .container {
            background-color:#ffffff;
            width: 150mm !important;
            border: 1px solid black;
            margin: 0 auto 0 auto;
        }
        .break { page-break-before: always; }
    </style>
</html>