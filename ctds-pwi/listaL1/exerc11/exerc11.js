function calcularArea(){
    let objRaio = document.getElementById('raio');
    let raio = objRaio.value;

    let area = (raio*raio)*Math.PI;

    area = area.toFixed(2);

    let objConteiner = document.getElementById('conteiner');
    objConteiner.innerHTML = 'Área da circunferência de raio '+raio+' é: '+area;

    objConteiner.setAttribute('class', 'mostra');

}

let objBotao = document.getElementById('botao');
objBotao.addEventListener('click',calcularArea);