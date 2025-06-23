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