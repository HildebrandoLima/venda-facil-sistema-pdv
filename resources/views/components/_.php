@if($status == 'Aberto')
    <div class="alert alert-success" role="alert">
        <h3 class="text-center">Caixa {{ $status }}</h3>
    </div>
@else
    <div class="alert alert-danger" role="alert">  
        <h3 class="text-center">Caixa {{ $status }}</h3>
    </div>
@endif

    <div class="alert alert-secondary" role="alert">
@if(isset($descricao))
        <h3 class="text-center">{{ $descricao }}</h3>
@else
        <h3 class="text-center">Nenhum produto bipado</h3>
@endif
    </div>