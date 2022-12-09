<form action="{{ route('buscar') }}" method="post">
    @csrf
    <div class="input-group">
        @if($data['status'] == 'Fechado')
        <div class="form-outline">
            <input type="number" name="codigo_barra" id="codigo_barra" placeholder="Digite o Código de Barras" class="form-control" style="min-width:530px;" disabled/>
        </div>
        <button type="submit" class="btn btn-primary" disabled>+</button>
        @else
        <div class="form-outline">
            <input type="number" name="codigo_barra" id="codigo_barra" placeholder="Digite o Código de Barras" class="form-control" style="min-width:530px;" autofocus/>
        </div>
        <button type="submit" class="btn btn-primary">+</button>
        @endif
      </div>
</form>