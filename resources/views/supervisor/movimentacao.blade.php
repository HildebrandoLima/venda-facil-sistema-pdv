@extends('supervisor.components.main')

@section('title', 'Admin | Venda Fácil - PDV')

@section('body')

<div class="card">
    <div class="card-body border border-primary shadow rounded">
        {{ session('msg') }}
        <h4>MOVIMENTAÇÃO</h4>
        <hr />
        <form action="" method="post">
            <div class="input-group mb-3">
                <select name="data" class="form-control">
                    <option value="" selected>Data</option>
                    <option value="dia">Dia</option>
                    <option value="mes">Mês</option>
                    <option value="ano">Ano</option>
                </select>
                <select name="caixa" class="form-control">
                    <option value="" selected>Caixa</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
                <button type="submit" id="finalizarVenda" class="btn btn-success">
                    <span class="icon fa fa-search"></span>
                    Buscar
                </button>
            </div>
        </form>
        <p class="text-center">Caixa: caixa_id | Operador: user_created_at | Movimentação: 001 | Data: created_at</p>
        <div class="table-response">
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th scope="col">Abertura</th>
                        <th scope="col">Fechamento</th>
                        <th scope="col">Saldo Inicial</th>
                        <th scope="col">Saldo Final</th>
                        <th scope="col">Total Vendas</th>
                        <th scope="col">Vendas (R$)</th>
                        <th scope="col">Saldo Atual em Caixa (R$)</th>
                        <th scope="col">Saldo Próximo (R$)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>abertura</td>
                        <td>fechamento</td>
                        <td>saldo_inicial</td>
                        <td>saldo_final</td>
                        <td>total_venda</td>
                        <td>venda_real</td>
                        <td>saldo_atual</td>
                        <td>proximo_dia</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <hr />

        <div class="table-response">
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th scope="col">Total Sangria</th>
                        <th scope="col">Sangria (R$)</th>
                        <th scope="col">Total Devolução</th>
                        <th scope="col">Devolução (R$)</th>
                        <th scope="col">Total Troca</th>
                        <th scope="col">Troca (R$)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>total_sangria</td>
                        <td>sangria_real</td>
                        <td>total_devolucao</td>
                        <td>devolucao_real</td>
                        <td>total_troca</td>
                        <td>troca_real</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <hr />

        <div class="table-response">
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th scope="col">Total Dinheiro</th>
                        <th scope="col">Dinheiro (R$)</th>
                        <th scope="col">Total Pix</th>
                        <th scope="col">Pix (R$)</th>
                        <th scope="col">Total Crédito</th>
                        <th scope="col">Crédito (R$)</th>
                        <th scope="col">Total Débito</th>
                        <th scope="col">Débito (R$)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>total_venda_dinheiro</td>
                        <td>venda_dinheiro_real</td>
                        <td>total_venda_pix</td>
                        <td>venda_pix_real</td>
                        <td>total_credito</td>
                        <td>credito_real</td>
                        <td>total_debito</td>
                        <td>debito_real</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection