function changeTextColor(event){

    let corOriginal = this.style.color;
    alert(corOriginal);






    this.style.color = 'red'
    //caso o button type seja submit, é preciso invalidar o evento padrão causado pelo tipo
    event.preventDefault();// impede o evento padrão de ser disparado
}


let objBotao = document.getElementById('botao');
objBotao.addEventListener('click', changeTextColor);
