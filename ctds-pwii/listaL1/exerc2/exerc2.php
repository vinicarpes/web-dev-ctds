<!DOCTYPE html>
<html lang="pt-BR">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title> Funções de usuário em PHP </title>
 <link rel="stylesheet" href="formata-pagina.css">
</head>

<body>
 <h1> Funções de usuário em PHP - exercício 2 da listaL6 </h1>

 <form action="exerc2.php" method="post">
  <fieldset>
   <legend> Funções de usuário em PHP - processando idades </legend>

   <label class="alinha"> Forneça a idade da pessoa: </label>
   <input type="number" name="idade" min="0" max="130" autofocus> <br>
   
   <button name="enviar-dados"> A pessoa pode votar? </button>
  </fieldset>
 </form>

 <?php
  //área de declaração das funções
  function testarIdade($idade)
   {
   $valorTestado = filter_var($idade, FILTER_VALIDATE_INT);

   //observe o operador de identidade (===) utilizado abaixo, que impede que o valor seja convertido para falso no teste lógico

   if($valorTestado === false OR $valorTestado < 0 OR $valorTestado > 130)
    {
    exit("<p> A caixa da idade exige um valor numérico maior ou igual a zero. Aplicação encerrada! </p>");
    }
   }

 //======================================================================

 function podeVotar($idade)
  {
  if($idade >= 16)
   {
   echo "<p> A pessoa tem <span> $idade anos </span> e já pode votar. </p>";
   }
  else
   {
   echo "<p> A pessoa tem <span> $idade anos </span> e ainda não pode votar. </p>";
   }
  }

 //======================================================================
  
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