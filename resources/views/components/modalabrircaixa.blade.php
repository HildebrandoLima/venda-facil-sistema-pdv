<div class="modal fade" id="abrirCaixaModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">  
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="">Abertura de Caixa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
            <form action="{{ route('abrir') }}" method="post">
                @csrf
                <input type="hidden" name="caixa_id" value="{{ session()->get('caixaId') }}" />
                <input type="hidden" name="user_created_at" value="{{ session()->get('matricula') }}" />
                <input type="hidden" name="status" value="Aberto" />

                <div class="input-group mb-3">
                    <span class="input-group-text">Valor Atual em Caixa: R$</span>
                    <input type="number" name="saldo_inicial" value="{{ $saldoAnterior->saldoProximoDia }}" placeholder="Informe o Valor Atual em Caixa"  class="form-control" required />
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Acrescentar Valor: R$</span>
                    <input type="number" name="acrescentar_valor" placeholder="Acrescentar Valor" class="form-control" />
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                    <span class="icon fa fa-xmark"></span>
                    Cancelar
                </button>
                <button type="submit" class="btn btn-success" id="confirmar">
                    <span class="icon fa fa-money"></span>
                    Abrir Caixa
                </button>
            </div>
            </form>
        </div>
    </div>
</div>