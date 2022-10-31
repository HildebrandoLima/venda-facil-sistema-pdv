@extends('components.main')

@section('title', 'VendaFácil')

@section('body')

@if($status === 'Aberto')
<div class="alert alert-success text-center" role="alert">
    <h3>Caixa Aberto</h3>
</div>
@else
<div class="alert alert-danger text-center" role="alert">
    <h3>Caixa Fechado</h3>
</div>
@endif


<form action="venda/salvar" action="item/salvar" method="post">
    @csrf
    <input type="hidden" name="caixa_id" value="1" />
    <input type="hidden" name="user_created_at" value="1" />
    <div class="row">
        <div class="col-md-6">
                <div class="row">
                    <div class="col-3">
                        <label for="Quantidade" class="form-label">Quantidade</label>
                        <input type="numer" name="quantidade" class="form-control" />
                    </div>
                    <div class="col">
                        <p class="text-center">X</p>
                    </div>
                    <div class="col-8">
                        <label for="DescricaoProduto" class="form-label">Descrição do Produto</label>
                        <input type="text" name="descricao" class="form-control" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-8">
                        <label for="CodigoBarra" class="form-label">Código de Barras</label>
                        <input type="number" name="codigo_barra" maxlength="13" class="form-control" />
                    </div>
                    <div class="col-3">
                        <label for="Valor" class="form-label">Valor</label>
                        <input type="number" name="valor" class="form-control" />
                    </div>
                </div>
                <div>
                <img class="imgtitulo" src="image/logo.png" />
                </div>
        </div>

        <div class="col-md-6 text-right">
            Resumo da Venda
            <div class="card shadow rounded">
                <div class="card-body">
                    <div class="table-response">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Item</th>
                                    <th scope="col">Descrição</th>
                                    <th scope="col">Quantidade</th>
                                    <th scope="col">Valor(U)</th>
                                    <th scope="col">Valor(T)</th>
                                    <th scope="col">Remover</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>@mdo</td>
                                    <td>X</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                    <td>@mdo</td>
                                    <td>X</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td colspan="2">Larry the Bird</td>
                                    <td>@twitter</td>
                                    <td>@mdo</td>
                                    <td>X</td>
                                </tr>
                            </tbody>
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
                    <p>
                        <button type="submit" class="btn btn-primary mt-4">Finalizar Venda</button>
                    </p>
                </div>
            </div>
        </div>
    </div>


</form>

<div  class="col menu">
<button id="menu" class="btn btn-primary col-sm-1 btmenu" >
  <i style="font-size:30px;" class="glyphicon glyphicon-th"></i>
</button>
<div id="bt" class="btabas">
    <button class="btn btn-primary col-sm">
        <img height="30" width="30" src="image/chave-inglesa.png">Ajuda</i>
        </button>
    <button class="btn btn-primary col-sm">
    <img height="30" width="30" src="image/avatar-de-perfil.png">Identif Cliente</i>
        </button>
    <button class="btn btn-primary col-sm">
    <img height="30" width="30" src="image/cancelar.png">Cancelar Item</i>
        </button>
    <button height="30" width="30" class="btn btn-primary col-sm">
        <img height="30" width="30" src="image/lupa.png">Consultar Preço</i>
        </button>
    <button class="btn btn-primary col-sm">
    <img height="30" width="30" src="image/tag-de-porcentagem.png">Cupom Desconto</i>
        </button>
        <button class="btn btn-primary col-sm">
        <img height="30" width="30" src="image/botao-adicionar.png">Varias Unidades</i>
        </button>
        <button  type="button" data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-primary col-sm">
        <img height="30" width="30" src="image/dinheiro.png">Fechar Venda</i>
        </button>
        <button class="btn btn-primary col-sm">
        <a onclick="location.href='login.blade.php'" onclick="event.preventDefault();"><img height="30" width="30" src="image/sair.png">Encerrar Sessão</a>
    </button>
</div>




@extends('components.modal')



@endsection
