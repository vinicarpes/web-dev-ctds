<?php

//área de declaração das funções
  function testarNome($aluno)
   {
   //retirar os espaços em branco do nome do aluno
  //  $aluno = trim($aluno);
   //contar o número de caracteres do nome do aluno
   $numeroDeCaracteres = strlen($aluno);

   //testar a condição de erro
   if($numeroDeCaracteres == 0)
    {
    exit("<p> A caixa nome do aluno não pode estar vazia. Aplicação encerrada! </p>");
    }
   }

  //==============================================================

  function testarNota1($nota1)
   {
   //usando uma função pronta do PHP para testar valores numéricos
   $valorTestado = filter_var($nota1, FILTER_VALIDATE_FLOAT);

   //testar se o valor retornado do filter_var é falso. Note que, para o zero ser aceito como nota válida, estamos usando o operador de identidade do PHP ===
   if($valorTestado === false OR $valorTestado < 0 OR $valorTestado > 10)
    {
    exit("<p> A caixa da primeira nota do aluno deve  ser um valor numérico maior ou igual a zero E menor ou igual a 10. Aplicação encerrada! </p>");
    }
   }

  //=============================================================
  
  function testarNota2($nota2)
    {
    $valorTestado = filter_var($nota2, FILTER_VALIDATE_FLOAT);

    if($valorTestado === false OR $valorTestado < 0 OR $valorTestado > 10)
      {
      exit("<p> A caixa da segunda nota do aluno deve  ser um valor numérico maior ou igual a zero E menor ou igual a 10. Aplicação encerrada! </p>");
      }
  }

  //===================================================

  function calcularMedia($nota1, $nota2)
   {
   $media = ($nota1 + $nota2)/2;
   return $media;
   }

  //===================================================

  function verificarAprovado($media)
   {
   echo "<p> Média do aluno: <span> $media </span><br>";

   if($media >= 6)
    {
    echo "De acordo com a média obtida, o aluno está APROVADO. </p>";
    }
   else
    echo "De acordo com a média obtida, o aluno está REPROVADO. </p>";
   }