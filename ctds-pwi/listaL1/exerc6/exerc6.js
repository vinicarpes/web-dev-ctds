function acrescentarTexto(){
    let objParag = document.getElementById("parag");
    let objCabec = document.getElementById("cabec")

    //salvando o texto que já existe no h1 no cabeçalho h1 antes de  inserirmos mais texto no innerHTML
    let textoCabec = objCabec.innerHTML;
    let textoParag =objParag.innerHTML;

    textoCabec += " Este texto foi adicionado na tag h1 por meio de JS";
    textoParag += " Este texto foi adicionado na tag p por meio de JS";

    objCabec.innerHTML = textoCabec;
    objParag.innerHTML = textoParag;
}

let objBotao = document.getElementById("botao");

objBotao.addEventListener('click', acrescentarTexto);