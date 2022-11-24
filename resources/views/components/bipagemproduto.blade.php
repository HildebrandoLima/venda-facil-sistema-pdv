<form action="{{ route('buscar') }}" method="post">
    @csrf
    <div class="input-group">
        <div class="form-outline">
            <input type="number" name="codigo_barra" id="codigo_barra" placeholder="Digite o Código de Barras" class="form-control" />
        </div>
        <button type="submit" class="btn btn-primary">+</button>
      </div>
</form>