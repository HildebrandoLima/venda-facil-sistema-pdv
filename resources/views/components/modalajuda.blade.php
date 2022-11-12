<div class="modal fade" id="ajudaModal" tabindex="-1" aria-labelledby="ajudaModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h1 class="modal-title fs-5" id="ajudaModalLabel">Ajuda</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">
            <h5><b>Sobre o Sistema</b></h5>
            <span><b>Caixa: </b>00{{ $caixa }}<br /></span>
            <span><b>Operador: </b>0123456789<br /></span>
            <span><b>Cliente: </b>012.345.678-09<br /></span>
            <span><b>Data: </b>@php echo date('d-m-Y') @endphp<br /></span>
            <span><b>Hora: </b><div class="relogio"></div></b><br /></span>
          </div>

          <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
              <span class="icon fa fa-xmark"></span>
              Cancelar Venda
          </button>
          <button type="submit" class="btn btn-success">
              <span class="icon fa fa-check"></span>
              Finalizar Venda
          </button>
          </div>
      </div>
  </div>
</div>