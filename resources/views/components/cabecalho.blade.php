@if(session('msg'))
<div class="alert alert-success mt-3" role="alert">
    <h3 class="text-center">{{ session('msg') }}</h3>
</div>
@endif

@if($status == 'Aberto')
    <div class="alert alert-success" role="alert">
        <h3 class="text-center">Caixa {{ $status }}</h3>
    </div>
@else
    <div class="alert alert-danger" role="alert">  
        <h3 class="text-center">Caixa {{ $status }}</h3>
    </div>
@endif

@if(isset($descricao))
    <div class="alert alert-secondary" role="alert">
        <h3 class="text-center">{{ $descricao }}</h3>
    </div>
@else
    <div class="alert alert-secondary" role="alert">
        <h3 class="text-center">Nenhum Produto Bipado</h3>
    </div>
@endif