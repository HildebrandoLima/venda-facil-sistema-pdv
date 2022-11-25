<div class="modal fade" id="adicionarItemModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="">Adicione Mais Unidades</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="item_id" value="" />

            <div class="modal-body">
                <div class="input-group mb-3">
                    <input type="number" name="quantidade" placeholder="Quantidade" class="form-control" />
                </div>

                <div class="input-group mb-3">
                    <input type="number" name="sub_total" placeholder="Sub Total" class="form-control" />
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Fechar
                </button>
                <button type="submit" class="btn btn-success">
                    Adicionar Item
                </button>
            </div>
            </form>
        </div>
    </div>
</div>