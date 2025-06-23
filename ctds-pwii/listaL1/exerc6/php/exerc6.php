<!DOCTYPE html>
<html lang="pt-BR">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title> Includes em PHP </title>
 <link rel="stylesheet" href="../css/formata-pagina.css">
</head>

<body>
 <h1> Funções de usuário e includes em PHP - exercício 6 da listaL1 </h1>

 <form action="exerc6.php" method="post">
  <fieldset>
   <legend> Includes em PHP - processando idades </legend>

   <label class="alinha"> Forneça a idade da pessoa: </label>
   <input type="number" name="idade" min="0" max="130" autofocus> <br>
   
   <button name="enviar-dados"> A pessoa pode votar? </button>
  </fieldset>
 </form>

 <?php
 require_once("../includes/exerc6.inc.php");
 
 if(isset($_POST['enviar-dados']))
  {
  //área do script principal
  $idade = trim($_POST['idade']);

  //invocar a função que testa a idade
  testarIdade($idade);

  //invocar a função que diz se a pessoa está apta - ou não - a votar
  podeVotar($idade); 
  }
 ?>
</body>
</html>