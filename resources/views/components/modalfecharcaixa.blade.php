<div class="modal fade" id="fechaCaixaModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="">Fechamento de Caixa</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <hr>
                        <form action="/caixa/movimentar/fecharCaixa" method="post">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="Fechado" />
                        <label align="center">Saldo Final</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">R$</span>
                            <input type="text" name="saldo_final" value="" class="form-control" />
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                <span class="icon fa fa-xmark"></span>
                             Cancelar
                            </button>
                            <button type="submit" class="btn btn-success">
                                <span class="icon fa fa-check"></span>
                            Fechar Caixa
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
</div>