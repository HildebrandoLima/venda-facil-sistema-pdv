///AQUI VC COLOCAR IDS DOS BOTOES QUE VAO SOLTAR O LOADING.
const idsAceitos = ['finalizarVenda'];

$('button[type="button"]').on('click', function () {
    var id = this.id;
    const found = idsAceitos.includes(id);
    if (found) {
        showLoad(id)
    }
    console.log(id);
});

const showLoad = (id) => {
    $('#myModal').modal('show')
    ///Caso SEJA O BOTAO DE FINALIZAR VENDA É COLOCADO UM TEXTO INFORMANDO ISSO. Vc pode fazer outro if
    /// Caso seja outro id, assim colocando outro texto que quiser.
    if (id == 'finalizarVenda') {
        $('#txtLoad').html('Finalizando Venda...')
    } else {
        $('#txtLoad').html('');
    }

    setTimeout(function () {
        $('#myModal').modal('hide')
    }, 2000);
}