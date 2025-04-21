<!DOCTYPE html>
<html lang="pt-BR">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title> Funções de usuário em PHP </title>
 <link rel="stylesheet" href="formata-pagina.css">
</head>

<body>
 <h1> Funções de usuário em PHP - exercício 1 da listaL6 </h1>

 <form action="exerc1.php" method="post">
  <fieldset>
   <legend> Funções de usuário em PHP - processando notas de alunos </legend>

   <label class="alinha"> Forneça o nome do aluno: </label>
   <input type="text" name="aluno" autofocus> <br>

   <label class="alinha"> Forneça a primeira nota de PRWI do aluno: </label>
   <input type="number" name="nota1" min="0" max="10" step="0.1"> <br>

   <label class="alinha"> Forneça a segunda nota de PRWI do aluno: </label>
   <input type="number" name="nota2" min="0" max="10" step="0.1"> <br>

   <button name="enviar-dados"> Processar dados do aluno usando subrotinas em PHP </button>
  </fieldset>
 </form>

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

  //quando misturamos, em um mesmo arquivo .php, elementos de formulário com comandos para receber e processar este formulário, devemos usar a linha de comando abaixo, evitando o surgimento de mensagens de erro

  if(isset($_POST['enviar-dados']))
   {
   //essas área é chamada de script principal no PHP
   //se o PHP entrar neste bloco, ele sabe, com certeza, que o botão submit foi pressionado e, portanto, os dados do formulásrio já estão disponíveis para serem recebidos
   $aluno = $_POST['aluno'];
   $nota1 = $_POST['nota1'];
   $nota2 = $_POST['nota2'];

   //invocar uma função de usuário do PHP para testar se o nome do aluno não está vazio
   testarNome($aluno);

   //invocar uma subrotina para testar a primeira nota do aluno
   testarNota1($nota1);

   //invocar uma subrotina para testar a segunda nota do aluno
   testarNota2($nota2);

   //invocar uma função de usuário para calcular e RETORNAR a média das duas notas do aluno
   $mediaRetornada = calcularMedia($nota1, $nota2);

   //invocar uma função que mostra se o aluno foi aprovado ou reprovado, de acordo com a média obtida acima
   verificarAprovado($mediaRetornada);
   
   }
 ?>
</body>
</html>