// Shift + j
$(document).bind('keypress', function (event) {
    if (event.which === 74 && event.shiftKey) {
        $("#ajudaModal").modal("show");
    }
});

// Shift + a
$(document).bind('keypress', function (event) {
    if (event.which === 65 && event.shiftKey) {
        $("#abrirCaixaModal").modal("show");
    }
});

// Shift + i
$(document).bind('keypress', function (event) {
    if (event.which === 73 && event.shiftKey) {
        $("#itentificarClienteModal").modal("show");
    }
});

// Shift + u
$(document).bind('keypress', function (event) {
    if (event.which === 85 && event.shiftKey) {
        $("#adicionarItemModal").modal("show");
    }
});

// Shift + r
$(document).bind('keypress', function (event) {
    if (event.which === 82 && event.shiftKey) {
        $("#removerItem").click();
    }
});

// Shift + v
$(document).bind('keypress', function (event) {
    if (event.which === 86 && event.shiftKey) {
        $("#finalizarVenda").click();
    }
});

// Enter
$(document).bind('keypress', function (event) {
    if (event.which === 13 && event.Enter) {
        $("#realizarPagamento").click();
    }
});

// Shift + f
$(document).bind('keypress', function (event) {
    if (event.which === 70 && event.shiftKey) {
        $("#fecharCaixa").click();
    }
});

// Shift + s
$(document).bind('keypress', function (event) {
    if (event.which === 83 && event.shiftKey) {
        $("#encerrarSessao").click();
    }
});