function calcularMedia(){
    let objName = document.getElementById('name');
    let ObjNota1 = document.getElementById('n1');
    let ObjNota2 = document.getElementById('n2');
    let ObjNota3 = document.getElementById('n3');

    let n1 = parseFloat(ObjNota1.value);
    let n2 = parseFloat(ObjNota2.value);
    let n3 = parseFloat(ObjNota3.value);
    let name = objName.innerText;

    let media = (n1+n2+n3)/3;
    media = media.toFixed(2);

    let objConteiner = document.getElementById('conteiner');

    objConteiner.innerHTML = "Prezado(a) " + name + "<br>Seu desempenho final na disciplina de PWI foi: <br>Nota 1: " + n1 + "<br>Nota 2: " + n2 + "<br>Nota 3: " +n3 + "<br>Média: " + media;

    if(media>=6){
        objConteiner.innerHTML += "<br>Você está aprovado(a)!!";
    }else{
        objConteiner.innerHTML += "<br>Você está reprovado(a).";
    }
    
    objConteiner.setAttribute('class', 'mostra');
}

let objButton = document.getElementById('button');
objButton.addEventListener('click', calcularMedia);