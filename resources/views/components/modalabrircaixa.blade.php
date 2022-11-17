<div class="modal fade" id="abreCaixaModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="">Abertura de Caixa</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <hr>
                        <form action="/caixa/movimentar/abrirCaixa" method="post">
                            @csrf
                            <input type="hidden" name="caixa_id" value="{{ $caixa }}" />
                            <input type="hidden" name="user_created_at" value="1" />
                            <input type="hidden" name="status" value="Aberto" />
                        <label align="center">Saldo inicial</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">R$</span>
                            <input type="text" name="saldo_inicial" value="" class="form-control" />
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                <span class="icon fa fa-xmark"></span>
                             Cancelar
                            </button>
                            <button type="submit" class="btn btn-success">
                                <span class="icon fa fa-check"></span>
                                Iniciar Caixa
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
</div>