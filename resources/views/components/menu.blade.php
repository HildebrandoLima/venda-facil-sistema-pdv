@if($data['status'] == 'Fechado')
<button class="btn btn-success col-sm" data-bs-toggle="modal" data-bs-target="#abrirCaixaModal">
    <span class="icon fa fa-money"></span>
    Abrir Caixa
</button>
@else
<button class="btn btn-danger col-sm" data-bs-toggle="modal" data-bs-target="#fechaCaixaModal">
    <span class="icon fa fa-money"></span>
    Fechar Caixa
</button>
@endif

<button type="button" class="btn btn-secondary col-sm" data-bs-toggle="modal" data-bs-target="#ajudaModal">
    <span class="icon fa fa-gear"></span>
    Ajuda
</button>

<button class="btn btn-warning col-sm">
    <span class="icon fa fa-search"></span>
    Consultar Preço
</button>

<button type="button" class="btn btn-info col-sm" data-bs-toggle="modal" data-bs-target="#itentificarClienteModal">
    <span class="icon fa fa-user"></span>
    Identificar Cliente
</button>

<!--<button class="btn btn-primary col-sm">
    <img src="image/desconto.png">Cupom Desconto</i>
</button> -->

<button type="button" class="btn btn-warning col-sm" data-bs-toggle="modal" data-bs-target="#adicionarItemModal">
    <span class="icon fa fa-plus"></span>
    Várias Unidades
</button>

<a href="{{ route('sair') }}">
    <button id="sair" class="btn btn-danger col-sm">
        <span class="icon fa fa-arrow-right"></span>
        Encerrar Sessão
    </button>
</a>