function somarIdadeSaldo(){
    let objIdade = document.getElementById('idade');
    let objSaldo = document.getElementById('saldo');

    let saldo = objSaldo.value;
    let idade = objIdade.value;

    let soma;
    soma= saldo + idade;


    // criando o objeto div
    let objDiv = document.getElementById('conteiner');
    objDiv.innerHTML = "O valor da soma da idade com o saldo bancário é: "+ soma;
    objDiv.setAttribute("class", 'mostra');
}


let objBotao = document.getElementById('botao');
objBotao.addEventListener('click', somarIdadeSaldo);