

let menu =  document.getElementById("menu");
let bt=  document.getElementById("bt");
bt.style.display = 'none';
console.log("ola");
function abrirMenu(){
    console.log("ola");
    if (bt.style.display === 'none') {
        bt.style.display = 'block';
      } else {
        bt.style.display = 'none';
      }
}

menu.addEventListener("click", abrirMenu);

