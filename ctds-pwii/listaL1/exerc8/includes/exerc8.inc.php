<?php
function calcularMediaAritmeticaSimples($nota1, $nota2, $nota3)
   {
   $media = ($nota1 + $nota2 + $nota3) / 3;
   echo "<p> Dados do cálculo da média aritmética simples: <br>
             Nota 1 = <span> $nota1 </span> <br>
             Nota 2 = <span> $nota2 </span> <br>
             Nota 3 = <span> $nota3 </span> <br>
             Valor da média = <span> $media </span> </p>";
   }

  //================================================================
  
  function calcularMediaAritmeticaPonderada($nota1, $nota2, $nota3)
   {
   $media = ($nota1 * 5 + $nota2 * 3 + $nota3 * 2) / 10;
   echo "<p> Dados do cálculo da média aritmética ponderada: <br>
             Nota 1 = <span> $nota1 </span> <br>
             Nota 2 = <span> $nota2 </span> <br>
             Nota 3 = <span> $nota3 </span> <br>
             Valor da média = <span> $media </span> </p>";
   }
