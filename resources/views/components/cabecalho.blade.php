@if(session('msg'))
<div class="alert alert-success mt-3 shadow rounded" role="alert">
    <h3 class="text-center">{{ session('msg') }}</h3>
</div>
@endif

@if(isset($data['descricao']))
    <div class="alert alert-secondary shadow rounded" role="alert">
        <h3 class="text-center">{{ $data['descricao'] }}</h3>
    </div>
@else
    <div class="alert alert-secondary" role="alert">
        <h3 class="text-center">Nenhum Produto Bipado</h3>
    </div>
@endif