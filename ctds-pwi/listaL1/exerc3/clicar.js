//declarando e implementando a função que será chamada pelo JS assim que o evento click for disparado sobre o parágrafo com id igual a "cliqueAqui"
function trocarCorDoTexto(){
    //referencia ao proprio objeto. neste caso, o paragrafo
    this.style.color = 'red';
};
//representando uma tag como objeto por meio do id
let objParagrafo = document.getElementById('parag');

//Associando o objeto ao evento onclick
objParagrafo.addEventListener('click', trocarCorDoTexto);




