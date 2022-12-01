function mostraCampo(el) {
    var inputCartao = document.getElementById('cartao');
    if (el.value === '1') {
        inputCartao.style.display = "block";
    }
    else {
        inputCartao.style.display = "none";
    }
}
