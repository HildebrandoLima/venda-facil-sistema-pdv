<div class="modal fade" id="itentificarClienteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="">Itentificar Cliente</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('identificar.cliente') }}" method="post">
            @csrf

            <div class="modal-body">
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="icon fa fa-user"></i></span>
                    <input type="text" name="cpf" placeholder="CPF" class="form-control" />
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <span class="icon fa fa-xmark"></span>
                    Fechar
                </button>
                <button type="submit" class="btn btn-success" id="confirmar">
                    <span class="icon fa fa-check"></span>
                    Confirmar
                </button>
            </div>
            </form>
        </div>
    </div>
</div>