function converterTemperatura(){
    //criando o objeto que representa a caixa onde será registrada a temperatura Fahrenheit

    let objCaixaTemp = document.getElementById("temp");
    let tempF = objCaixaTemp.value;
    
    let tempC = (5/9)*(tempF -32)

    // cuidar com operadores de soma no JS.


    //formatando a temperatura para decimais
    tempC = tempC.toFixed(2);   


    //mostrar a temperatura transformada

    let objConteiner = document.getElementById('conteiner');
    objConteiner.innerHTML = "Resultado da conversão termométrica: <br>Temperatura original em °F = " + tempF + "<br>Temperatura em °C = " + tempC;

    // neste ponto, a div está oculta em razão do atributo hidden 
    

    objConteiner.setAttribute('class', 'mostra'); //atribuindo o atributo class para a div
}

function esconderDiv(){
    objDiv.setAttribute('class', '');
}

let objBotao = document.getElementById('botao');
objBotao.addEventListener('click', converterTemperatura);

let objDiv = document.getElementById('conteiner');
objDiv.addEventListener('click', esconderDiv);