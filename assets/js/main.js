
const botaoMobile = document.getElementById('botao-mobile');
const menu = document.getElementById('menu');

botaoMobile.addEventListener("click", function() { 
    menu.classList.toggle('menu-ativo');
})
