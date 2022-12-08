<h5 class="card-title text-center">Método Escolhido - Dinheiro</h5>
<hr />
<form action="{{ route('salvarpagamento') }}" method="post">
    @csrf
    <input type="hidden" name="venda_id" value="{{ session()->get('vendaId') }}" />
    <input type="hidden" name="user_created_at" value="{{ session()->get('matricula') }}" />

    <div class="col mb-3">
        <label class="form-label">Total</label>
        <div class="input-group">
            <input type="hidden" name="total" value="{{ session()->get('total') }}" class="form-control" required />
            <input type="number" name="total" value="{{ session()->get('total') }}" class="form-control" required disabled />
            <span class="input-group-text"><i class="icon fa fa-money"></i></span>
        </div>
    </div>

    <div class="col mb-3">
        <label class="form-label">Pago</label>
        <div class="input-group">
            <input type="hidden" name="valor_pago" value="{{ session()->get('valorPago') }}" class="form-control" required />
            <input type="text" name="valor_pago" value="{{ session()->get('valorPago') }}" class="form-control" required disabled />
            <span class="input-group-text"><i class="icon fa fa-money"></i></span>
        </div>
    </div>

    <div class="col mb-3">
        <label class="form-label">Troco</label>
        <div class="input-group">
            <input type="hidden" name="troco" value="{{ $troco ?? 0 }}" class="form-control" required />
            <input type="text" value="{{ number_format($troco ?? 0, 2, ',', ' ') }}" class="form-control" required disabled />
            <span class="input-group-text"><i class="icon fa fa-money"></i></span>
        </div>
    </div>

    <div class="col mb-3">
        <div class="input-group">
            <select name="metodo_pagamento_id" class="form-select">
                <option value="" selected>Tipo de Pagamento</option>
                <option value="2">Dinheiro</option>
                <option value="4">Pix</option>
            </select>
            <span class="input-group-text"><i class="icon fa fa-money"></i></span>
        </div>
    </div>
    <button class="btn w-100 btn-success mt-2" id="realizarPagamento" autofocus>
        Pagar
    </button>
</form>