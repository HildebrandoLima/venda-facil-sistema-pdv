function mostraCard(el) {
    var inputCardDinheiro = document.getElementById('metodoDinheiro');
    var inputCardCartao = document.getElementById('metodoCartao');
    if (el.value === 'Dinheiro') {
        inputCardDinheiro.style.display = "block";
    }
    else {
        inputCardDinheiro.style.display = "none";
    }

    if (el.value === 'Cartão') {
        inputCardCartao.style.display = "block";
    }
    else {
        inputCardCartao.style.display = "none";
    }
}
