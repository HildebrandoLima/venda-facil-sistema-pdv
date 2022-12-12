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
                        <center><b>***ABERTURA DE CAIXA***</b></center>
                    </tr>
                </thead>
            </table>
            -----------------------------------------------------------------------------------------------------
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">SALDO INICIAL</th>
                        <th scope="col">SALDO DO DIA ANTERIOR</th>
                    </tr>
                    <tbody>
                        <td>R${{ $data->saldo_inicial ? number_format($data->saldo_inicial, 2, ',', ' ') : '00,00' }}</td>
                        <td>R${{ $data->acrescentar_valor ? number_format($data->acrescentar_valor, 2, ',', ' ') : '00,00' }}</td>
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