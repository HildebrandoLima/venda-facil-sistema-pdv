<div class="modal fade" id="adicionarItemModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="">Adicione Mais Unidades</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="table-response table-overflow">
                    @if (isset($itens) && count($itens) > 0)
                    <form action="{{ route('mudar') }}" method="post">
                        @csrf
                        @method('PUT')
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ITEM</th>
                                    <th scope="col">PRODUTO</th>
                                    <th scope="col">QTD</th>
                                    <th scope="col">MUDAR</th>
                                </tr>
                            </thead>
                            @foreach ($itens as $key => $item)
                            @php
                                $sub_total = $item->preco * $item->quantidade;
                            @endphp
                            <tbody>
                                <tr>
                                    <input type="hidden" name="codigo_barra" value="{{ $item->codigo_barra }}" />
                                    <input type="hidden" name="preco" value="{{ $item->preco }}" />
                                    <th scope="row">{{ $item->id }}</th>
                                    <td>{{ $item->nome }}</td>
                                    <td><input type="number" name="quantidade" value="{{ $item->quantidade }}" class="form-control" /></td>
                                    <td>
                                        <button type="submit" class="btn btn-success" id="confirmar">
                                            Adicionar Item
                                        </button>    
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </form>
                    @else
                    <h3 class="text-center">Nenhum Item na Venda</h3>
                    @endif
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Fechar
                </button>
            </div>
        </div>
    </div>
</div>