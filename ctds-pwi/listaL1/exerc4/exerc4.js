function gerarTexto(){
// criar um objeto que representa o paragrafopvazio

    let objParag = document.getElementById('parag');

//adicionar o texto na tag
    objParag.innerHTML = 'Este texto foi criado dinâmicamente pela linguaen JavaScript! <a href="https://www.ifsc.edu.br/"> Clique aqui para visitar o site do IFSC </a>';
}



let objBotao = document.getElementById('botao');
objBotao.addEventListener('click', gerarTexto);