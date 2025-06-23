<!DOCTYPE html>
<html lang="pt-BR">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title> Funções de usuário em PHP </title>
 <link rel="stylesheet" href="formata-pagina.css">
</head>

<body>
 <h1> Funções de usuário em PHP - exercício 3 da listaL6 </h1>

 <form action="exerc3.php" method="post">
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
  function converterDeCparaF($temp)
   {
   $tempConvertida = ($temp * 9/5) + 32;
   echo "<p> Dados da conversão termométrica: <br>
             Temperatura em celsius = <span> $temp ºC </span> <br>
             Temperatura convertida para Fahrenheit = <span> $tempConvertida ºF </span> </p>";
   }

  //================================================================
  
  function converterDeFparaC($temp)
   {
   $tempConvertida = ($temp - 32) * 5/9;
   echo "<p> Dados da conversão termométrica: <br>
             Temperatura em Fahrenheit = <span> $temp ºF </span> <br>
             Temperatura convertida para celsius = <span> $tempConvertida ºC </span> </p>";
   }
  
  //===============================================================

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