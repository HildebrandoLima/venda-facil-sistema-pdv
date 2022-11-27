function mostraCampo(el) {
    var inputOutros = document.getElementById('cartao');
    hideOrShowCartao(el)

    if (el.value === 'Crédito' || el.value === 'Débito') {
        inputOutros.style.display = "block";
    }
    else {
        inputOutros.style.display = "none";
    }
}

function hideOrShowCartao(el){
    var cartao = document.getElementById('forma_pagamento_cartao');
    if (el.value === 'Crédito') {
        cartao.style.display = "block";
    }
    else {
        cartao.style.display = "none";
    }
}


//coloquei meu pix pra testar, testa ai com 10 conto kkkkk
var pix = 'maxwor123@gmail.com';
let finalURL = 'https://chart.googleapis.com/chart?cht=qr&chl=' + pix +'&chs=150x150&chld=L|0'
$('.qr-code').attr('src', finalURL);



