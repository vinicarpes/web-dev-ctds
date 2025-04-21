<!DOCTYPE html>
<html lang="pt-BR">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title> Funções de usuário em PHP </title>
   <link rel="stylesheet" href="../css/formata-pagina.css">
</head>

<body>
   <h1> Funções de usuário em PHP - exercício 8 da listaL1 </h1>

   <form action="exerc7.php" method="post">
      <fieldset>
         <legend> Funções de usuário em PHP - Rendimento semestral </legend>

         <label class="alinha"> Forneça a primeira nota: </label>
         <input type="number" name="nota1" autofocu step="0.1" min="0" max="10"> <br>

         <label class="alinha"> Forneça a segunda nota: </label>
         <input type="number" name="nota2" autofocu step="0.1" min="0" max="10"> <br>

         <label class="alinha"> Forneça a terceira nota: </label>
         <input type="number" name="nota3" autofocu step="0.1" min="0" max="10"> <br>

         <label> Escolha a média a ser calculada: </label> <br>
         <input type="radio" name="media" value="ponderada"> <label>Ponderada </label> <br>

         <input type="radio" name="media" value="aritmetica"> <label>Aritmética Simples</label> <br>

         <button name="enviar-dados"> Calcular Média </button>
      </fieldset>
   </form>

   <?php

   require_once("../include/exerc8.inc.php");

   if (isset($_POST['enviar-dados'])) {
      $vetorNotas = [$_POST['nota1'], $_POST['nota2'], $_POST['nota3']];

      $tipoMedia = $_POST['media'];

      if ($escala == "ponderada") {
         calcularMediaAritmetica($vetorNotas);
      } else {
         calcularMediaPonderada($vetorNotas);
      }
   }
   ?>
</body>

</html>