<h5 class="card-title text-center">Método Escolhido - Cartão</h5>
<hr />
<form action="{{ route('salvar.pagamento') }}" method="post">
    @csrf
    <input type="hidden" name="venda_id" value="{{ session()->get('vendaId') }}" />
    <input type="hidden" name="user_created_at" value="{{ session()->get('matricula') }}" />
    <input type="hidden" name="total" value="{{ session()->get('total') }}" />
    <input type="hidden" name="identificador_metodo_pagamento_id" value="102" />
    <div class="col mb-3">
        <label class="form-label">Número do Cartão</label>
        <div class="input-group">
            <input type="hidden" name="numero_cartao" value="1111222233334444" class="form-control" required />
            <input type="text" name="numero_cartao" value="1111222233334444" class="form-control" required disabled />
            <span class="input-group-text"><i class="icon fa fa-credit-card"></i></span>
        </div>
    </div>

    <div class="col mb-3">
        <label class="form-label">Expiração</label>
        <div class="input-group">
            <input type="date" name="data_credito" class="form-control" required />
            <span class="input-group-text"><i class="icon fa fa-calendar"></i></span>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col mb-3">
            <div class="input-group">
                <select name="metodo_pagamento_id" onchange='mostraCampo(this)' class="form-select" required >
                    <option value="" selected>Tipo de Cartão</option>
                    <option value="1">Crédito</option>
                    <option value="3">Débito</option>
                </select>
                <span class="input-group-text"><i class="icon fa fa-credit-card"></i></span>
                <div id="cartao" style="display:none">
                    <select name="parcela" class="form-select">
                        <option value="1" selected>Parcelas</option>
                        <option value="2">2x</option>
                        <option value="3">3x</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <button class="btn w-100 btn-success mt-2" id="realizarPagamento" autofocus>
        Pagar
    </button>
</form>