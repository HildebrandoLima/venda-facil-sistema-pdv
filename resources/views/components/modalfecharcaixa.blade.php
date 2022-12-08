<div class="modal fade" id="fechaCaixaModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="">Fechamento do Caixa {{ session()->get('caixaId') }} @php echo ' | ' . date('d-m-Y') @endphp</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('fechar') }}" method="post">
            @csrf
            @method('PUT')
            @php
                @$saldo_final = $movimentacao->saldo_inicial - $movimentacao->total_venda_real;
            @endphp
            <input type="hidden" name="caixa_id" value="{{ session()->get('caixaId') }}" />
            <input type="hidden" name="usuario_id" value="{{ session()->get('matricula') }}" />
            <input type="hidden" name="status" value="Fechado" />

            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <br />
                        <span><b>Total de Vendas: </b></span><input type="hidden" name="total_venda" value="{{ $movimentacao->total_venda ?? 0 }}" />{{ $movimentacao->total_venda ?? 0 }} (+)<br />
                        <span><b>Total de Sangrias: </b></span><input type="hidden" name="total_sangria" value="{{ $movimentacao->total_sangria ?? 0 }}" />{{ $movimentacao->total_sangria ?? 0 }} (-)<br />
                        <span><b>Devolução(ões): </b></span><input type="hidden" name="total_devolucao" value="{{ $movimentacao->total_devolucao ?? 0 }}" />{{ $movimentacao->total_devolucao ?? 0 }} (+/-)<br />
                        <span><b>Troca(s): </b></span><input type="hidden" name="total_troca" value="{{ $movimentacao->total_troca ?? 0 }}" />{{ $movimentacao->total_troca ?? 0 }} (+/-)<br />
                        <span><b>Total de Vendas em Dinheiro: </b></span><input type="hidden" name="total_venda_dinheiro" value="{{ $movimentacao->total_venda_dinheiro ?? 0 }}" />{{ $movimentacao->total_venda_dinheiro ?? 0 }}<br />
                        <span><b>Total de Vendas em PIX: </b></span><input type="hidden" name="total_venda_pix" value="{{ $movimentacao->total_venda_pix ?? 0 }}" />{{ $movimentacao->total_venda_pix ?? 0 }}<br />
                        <span><b>Total de Vendas em Cartão de Crédito: </b></span><input type="hidden" name="total_venda_cartao_credito" value="{{ $movimentacao->total_venda_cartao_credito ?? 0 }}" />{{ $movimentacao->total_venda_cartao_credito ?? 0 }}<br />
                        <span><b>Total de Vendas em Cartão de Débito: </b></span><input type="hidden" name="total_venda_cartao_debito" value="{{ $movimentacao->total_venda_cartao_debito ?? 0 }}" />{{ $movimentacao->total_venda_cartao_debito ?? 0 }}<br />
                        <span><b>Saldo Final: </b></span><input type="hidden" name="" value="1.00" />R$1,00<br />
                    </div>
                    <div class="col">
                        <span><b>Saldo Inicial: </b></span><input type="hidden" name="saldo_inicial" value="{{ $movimentacao->saldo_inicial ?? 0 }}" />R${{ number_format($movimentacao->saldo_inicial ?? 0, 2, ',', ' ') }} (+)<br />
                        <span><b>Total de Vendas: </b></span><input type="hidden" name="total_venda_real" value="{{ $movimentacao->total_venda_real ?? 0 }}" />R${{ number_format($movimentacao->total_venda_real ?? 0, 2, ',', ' ') }} (+)<br />
                        <span><b>Total de Sangrias: </b></span><input type="hidden" name="total_sangria_real" value="{{ $movimentacao->total_sangria_real ?? 0 }} " />R${{ number_format($movimentacao->total_sangria_real ?? 0, 2, ',', ' ') }} (-)<br />
                        <span><b>Devolução(ões): </b></span><input type="hidden" name="total_devolucao_real" value="{{ $movimentacao->total_devolucao_real ?? 0 }}" />R${{ number_format($movimentacao->total_devolucao_real ?? 0, 2, ',', ' ') }} (+/-)<br />
                        <span><b>Troca(s): </b></span><input type="hidden" name="total_troca_real" value="{{ $movimentacao->total_troca_real ?? 0 }}" />R${{ number_format($movimentacao->total_troca_real ?? 0, 2, ',', ' ') }} (+/-)<br />
                        <span><b>Total de Vendas em Dinheiro: </b></span><input type="hidden" name="total_venda_dinheiro_real" value="{{ $movimentacao->total_venda_dinheiro_real ?? 0 }}" />R${{ number_format($movimentacao->total_venda_dinheiro_real ?? 0, 2, ',', ' ') }} (+)<br />
                        <span><b>Total de Vendas em PIX: </b></span><input type="hidden" name="total_venda_pix_real" value="{{ $movimentacao->total_venda_pix_real ?? 0 }}" />R${{ number_format($movimentacao->total_venda_pix_real ?? 0, 2, ',', ' ') ?? 0 }} (+)<br />
                        <span><b>Total de Vendas em Cartão de Crédito: </b></span><input type="hidden" name="total_venda_cartao_credito_real" value="{{ $movimentacao->total_venda_cartao_credito_real ?? 0 }}" />R${{ number_format($movimentacao->total_venda_cartao_credito_real ?? 0, 2, ',', ' ') }} (+)<br />
                        <span><b>Total de Vendas em Cartão de Débito: </b></span><input type="hidden" name="total_venda_cartao_debito_real" value="{{ $movimentacao->total_venda_cartao_debito_real ?? 0 }}" />R${{ number_format($movimentacao->total_venda_cartao_debito_real ?? 0, 2, ',', ' ') }} (+)<br />
                        <span><b>Saldo Final: </b></span><input type="hidden" name="saldo_final" value="{{ $saldo_final ?? 0 }}" />R${{ number_format($saldo_final, 2, ',', ' ') ?? 0 }}<br />
                    </div>
                </div>

                <hr />

                <div class="input-group mb-3">
                    <span class="input-group-text">Valor Atual em Caixa: R$</span>
                    <input type="number" name="saldo_atual" placeholder="Informe o Valor Atual em Caixa" value="{{ $movimentacao->total_venda_real ?? 0 }}"  class="form-control" required />
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Fundo do Caixa para o Próximo Dia: R$</span>
                    <input type="number" name="saldo_proximo_dia" placeholder="Fundo do Caixa para o Próximo Dia" value="{{ $saldo_final ?? 0 }}" class="form-control" />
                </div>
                <span><b>Saldo Final: </b>R${{ number_format($saldo_final ?? 0, 2, ',', ' ') }}</span>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                    <span class="icon fa fa-xmark"></span>
                    Cancelar
                </button>
                <button type="submit" class="btn btn-success" id="confirmar">
                    <span class="icon fa fa-check"></span>
                    Fechar Caixa
                </button>
            </div>
            </form>
        </div>
    </div>
</div>