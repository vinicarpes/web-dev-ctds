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
