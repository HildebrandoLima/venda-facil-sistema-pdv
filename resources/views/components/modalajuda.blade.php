<div class="modal fade" id="ajudaModal" tabindex="-1" aria-labelledby="ajudaModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h1 class="modal-title fs-5" id="ajudaModalLabel">Ajuda</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">
            <h5><b>Sobre o Sistema</b></h5>
            <span><b>Caixa: </b>00{{ session()->get('caixaId') }}<br /></span>
            <span><b>Operador: </b>{{ session()->get('matricula') }}<br /></span>
            <span><b>Cliente: </b>{{ session()->get('cpf') ?? 'NÃO IDENTIFICADO' }}<br /></span>
            <span><b>Data: </b>@php echo date('d-m-Y') @endphp<br /></span>
            <span><b>Hora: </b><div class="relogio"></div></b><br /></span>

            <div class="table-response">
              <table class="table table-striped table-hover table-overflow">
                <thead>
                  <tr>
                    <th scope="col">Descrição</th>
                    <th scope="col">Atalho</th>
                  </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Ajuda</td>
                      <td>Shif+j</td>
                    </tr>
                    <tr>
                      <td>Fechar Tela</td>
                      <td>Esc</td>
                    </tr>
                    <tr>
                      <td>Navegar</td>
                      <td>TAB</td>
                    </tr>
                    @if($status == 'Fechado')
                    <tr>
                      <td>Abrir Caixa</td>
                      <td>Shif+a</td>
                    </tr>
                    @else
                    <tr>
                      <td>Fechar Caixa</td>
                      <td>Shif+f</td>
                    </tr>
                    @endif
                    <tr>
                      <td>Consultar Preço</td>
                      <td>Shif+c</td>
                    </tr>
                    <tr>
                      <td>Identificar Cliente</td>
                      <td>Shif+i</td>
                    </tr>
                    <tr>
                      <td>Adicionar Várias Unidades</td>
                      <td>Shif+u</td>
                    </tr>
                    <tr>
                      <td>Finalizar Venda</td>
                      <td>Shif+v</td>
                    </tr>
                    <tr>
                      <td>Realizar Pagamento</td>
                      <td>ENTER</td>
                    </tr>
                    <tr>
                      <td>Encerrar Sessão</td>
                      <td>Shif+s</td>
                    </tr>
                </tbody>
              </table>
              </div>
          </div>

          <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
              <span class="icon fa fa-xmark"></span>
              Fechar
          </button>
          </div>
      </div>
  </div>
</div>