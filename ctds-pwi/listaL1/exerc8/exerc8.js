let objParag1 = document.getElementById('parag1');
let objParag2 = document.getElementById('parag2');
let objLista = document.getElementById('lista');

let textoParag1 = objParag1.innerHTML;
let textoParag2 = objParag2.innerHTML;

let textoFinal = "<li>" + textoParag1 + "</li><li>" + textoParag2 + "</li>";

objLista.innerHTML = textoFinal;