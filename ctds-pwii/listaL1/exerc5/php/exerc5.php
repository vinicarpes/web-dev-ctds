<!DOCTYPE html>
<html lang="pt-BR">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title> Funções de include em PHP </title>
 <link rel="stylesheet" href="../css/formata-pagina.css">
</head>

<body>
 <h1> Funções de usuário em PHP - exercício 5 da lista L1 </h1>

 <form action="exerc5.php" method="post">
  <fieldset>
   <legend> Funções de usuário em PHP - processando notas de alunos </legend>

   <label class="alinha"> Forneça o nome do aluno: </label>
   <input type="text" name="aluno" autofocus> <br>

   <label class="alinha"> Forneça a primeira nota de PRWII do aluno: </label>
   <input type="number" name="nota1" min="0" max="10" step="0.1"> <br>

   <label class="alinha"> Forneça a segunda nota de PRWII do aluno: </label>
   <input type="number" name="nota2" min="0" max="10" step="0.1"> <br>

   <button name="enviar-dados"> Processar dados do aluno usando subrotinas em PHP </button>
  </fieldset>
 </form>

 <?php

    // include("../includes/exerc5.inc.php");
    require_once("../includes/exerc5.inc.php");

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