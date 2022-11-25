<div class="text-left mt-3">
    <button type="button" class="btn btn-primary text-left" onclick="Mudarestado('menu')">
        <span class="icon fa fa-bars"></span>
        Menu
    </button>
</div>

<div id="menu" class="mt-3">
    @if($status == 'Fechado')
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

    <!-- <button class="btn btn-primary col-sm">
        <img src="image/user.png">Identif Cliente</i>
    </button> -->

    <!-- <button class="btn btn-primary col-sm">
        <img src="image/x.png">Cancelar Item</i>
    </button> -->

    <button class="btn btn-info col-sm">
        <span class="icon fa fa-search"></span>
        Consultar Preço
    </button>

    <!--<button class="btn btn-primary col-sm">
        <img src="image/desconto.png">Cupom Desconto</i>
    </button> -->

    <button type="button" class="btn btn-warning col-sm" data-bs-toggle="modal" data-bs-target="#addItemModal">
        <span class="icon fa fa-plus"></span>
        Várias Unidades
    </button>
    <!-- <button type="submit" class="btn btn-success">
        <span class="icon fa fa-check"></span>
        Finalizar Venda
    </button> -->

    <button class="btn btn-danger col-sm">
        <span class="icon fa fa-arrow-right"></span>
        Encerrar Sessão
    </button>
</div>
