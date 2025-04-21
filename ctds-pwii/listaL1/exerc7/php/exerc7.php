<!DOCTYPE html>
<html lang="pt-BR">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title> Funções de usuário em PHP </title>
 <link rel="stylesheet" href="../css/formata-pagina.css">
</head>

<body>
 <h1> Funções de usuário em PHP - exercício 6 da listaL1 </h1>

 <form action="exerc7.php" method="post">
  <fieldset>
   <legend> Funções de usuário em PHP - conversão termométrica </legend>

   <label class="alinha"> Forneça o valor numérico para a conversão: </label>
   <input type="number" name="temp"  autofocus step="0.1"> <br>

   <label> Escolha a escala de conversão: </label> <br>
   <input type="radio" name="escala" value="deCparaF"> <label> De celsius para Fahrenheit </label> <br>

   <input type="radio" name="escala" value="deFparaC"> <label> De Fahrenheit para celsius </label> <br>

   <button name="enviar-dados"> Converter temperatura </button>
  </fieldset>
 </form>

 <?php

    require_once("../include/exerc7.inc.php");

 if(isset($_POST['enviar-dados']))
  {
  $temp = trim($_POST['temp']);

  $escala = $_POST['escala'];

  if($escala == "deCparaF" )
   {
   converterDeCparaF($temp);
   }
  else
   {
   converterDeFparaC($temp);
   }
  }
 ?>
</body>
</html>