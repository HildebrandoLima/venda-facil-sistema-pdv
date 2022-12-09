<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>Abertura de Caixa</title>
    </head>
    <body>
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <center><b>VENDA FÁCIL - PDV</b></center>
                        <center><b>CNPJ: 99.999.999/9999</b></center>
                        <center><b>RUA PRINCIPAL N°123, CENTRO - CE</b></center>
                        <br />
                        <center><b>***FECHAMENTO DE CAIXA***</b></center>
                    </tr>
                </thead>
            </table>
            -----------------------------------------------------------------------------------------------------
            <center><b>***RESUMO DA VENDA***</b></center>
            -----------------------------------------------------------------------------------------------------
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">TOTAL VENDA</th>
                        <th scope="col">SALDO INICAL</th>
                        <th scope="col">VENDA R$</th>
                        <th scope="col">SALDO FINAL</th>
                        <th scope="col">SALDO ATUAL</th>
                        <th scope="col">SALDO PROX. DIA</th>
                    </tr>
                    <tbody>
                        <td>{{ $data->total_venda ?? 0 }}</td>
                        <td>{{ $data->saldo_inicial ? number_format($data->saldo_inicial, 2, ',', ' ') : '00,00' }}</td>
                        <td>{{ $data->total_venda_real ? number_format($data->total_venda_real, 2, ',', ' ') : '00,00' }}</td>
=                        <td>{{ $data->saldo_final ? number_format($data->saldo_final, 2, ',', ' ') : '00,00' }}</td>
                        <td>{{ $data->saldo_atual ? number_format($data->saldo_atual, 2, ',', ' ') : '00,00' }}</td>
                        <td>{{ $data->saldo_proximo_dia ? number_format($data->saldo_proximo_dia, 2, ',', ' ') : '00,00' }}</td>
                    </tbody>
                </thead>
            </table>
            -----------------------------------------------------------------------------------------------------
            <center><b>***RESUMO SANGRIA***</b></center>
            -----------------------------------------------------------------------------------------------------
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">TOTAL SANGRIA</th>
                        <th scope="col">SANGRIA R$</th>
                    </tr>
                    <tbody>
                        <td>{{ $data->total_sangria ?? 0 }}</td>
                        <td>{{ $data->total_sangria_real ? number_format($data->total_sangria_real, 2, ',', ' ') : '00,00' }}</td>
                    </tbody>
                </thead>
            </table>
            -----------------------------------------------------------------------------------------------------
            <center><b>***RESUMO TROCA E DEVOLUÇÃO***</b></center>
            -----------------------------------------------------------------------------------------------------
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">TOTAL DEVOLUÇÃO</th>
                        <th scope="col">TOTAL TROCA</th>
                        <th scope="col">DEVOLUÇÃO R$</th>
                        <th scope="col">TROCA R$</th>
                    </tr>
                    <tbody>
                        <td>{{ $data->total_devolucao ?? 0 }}</td>
                        <td>{{ $data->total_troca ?? 0 }}</td>
                        <td>{{ $data->total_devolucao_real ? number_format($data->total_devolucao_real, 2, ',', ' ') : '00,00' }}</td>
                        <td>{{ $data->total_troca_real ? number_format($data->total_troca_real, 2, ',', ' ') : '00,00' }}</td>
                    </tbody>
                </thead>
            </table>
            -----------------------------------------------------------------------------------------------------
            <center><b>***RESUMO EM DINHEIRO/PIX***</b></center>
            -----------------------------------------------------------------------------------------------------
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">TOTAL DINHEIRO</th>
                        <th scope="col">TOTAL PIX</th>
                        <th scope="col">DINHEIRO R$</th>
                        <th scope="col">PIX R$</th>
                    </tr>
                    <tbody>
                        <
                        <td>{{ $data->total_venda_dinheiro ?? 0 }}</td>
                        <td>{{ $data->total_venda_pix ?? 0 }}</td>
                        <td>{{ $data->total_venda_dinheiro_real ? number_format($data->total_venda_dinheiro_real, 2, ',', ' ') : '00,00' }}</td>
                        <td>{{ $data->total_venda_pix_real ? number_format($data->total_venda_pix_real, 2, ',', ' ') : '00,00' }}</td>
                    </tbody>
                </thead>
            </table>
            -----------------------------------------------------------------------------------------------------
            <center><b>***RESUMO DE CARTÃO***</b></center>
            -----------------------------------------------------------------------------------------------------
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">TOTAL CRÉDIDO</th>
                        <th scope="col">TOTAL DÉBITO</th>
                        <th scope="col">CRÉDITO R$</th>
                        <th scope="col">DÉBITO R$</th>
                    </tr>
                    <tbody>
                        <
                        <td>{{ $data->total_venda_cartao_credito ?? 0 }}</td>
                        <td>{{ $data->total_venda_cartao_debito ?? 0 }}</td>
                        <td>{{ $data->total_venda_cartao_credito_real ? number_format($data->total_venda_cartao_credito_real, 2, ',', ' ') : '00,00' }}</td>
                        <td>{{ $data->total_venda_cartao_debito_real ? number_format($data->total_venda_cartao_debito_real, 2, ',', ' ') : '00,00' }}</td>
                    </tbody>
                </thead>
            </table>
            -----------------------------------------------------------------------------------------------------
            <center><b>DADOS DO OPERADOR</b></center>
            <table class="table">
                <thead>
                    <tr>
                        <center><b>CAIXA: {{ $data->caixa_id ?? 'NÃO INFORMADO' }}</b></center>
                        <center><b>MATRICULA: {{ $data->user_created_at ?? 'NÃO INFORMADO' }}</b></center>
                    </tr>
                </thead>
            </table>
        </div>
    </body>

    <style type="text/css">
        .container {
            background-color:#ffffff;
            width: 150mm !important;
            border: 1px solid black;
            margin: 0 auto 0 auto;
        }
    </style>
</html>