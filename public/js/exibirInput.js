function mostraCampo(el) {
    var inputOutros = document.getElementById('cartao');
    if (el.value === 'Crédito' || el.value === 'Débito') {
        inputOutros.style.display = "block";
    }
    else {
        inputOutros.style.display = "none";
    }
}
