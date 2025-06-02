if('serviceWorker' in navigator){
    navigator.serviceWorker.register("./service-worker.js");
}

let pedidoInstalacao;
window.addEventListener('beforeinstallprompt', function(installPrompt) {
    if(installPrompt){
        $("#installAppBt").show();
        pedidoInstalacao = installPrompt;
    }
});

var pgAtual = "#home";
function mostraPagina(pg) {
    $(pgAtual).hide();
    $(pg).show();
    pgAtual = pg;
}

function navega(destino){
    let telas = document.getElementsByClassName('tela')
    Array.from(telas).forEach(element => {
        element.classList.remove('show')
        element.classList.add('collapse')
    });
    document.getElementById(destino).classList.remove('collapse')
    document.getElementById(destino).classList.add('show')
}

function installApp() {
    pedidoInstalacao.prompt(); 
}