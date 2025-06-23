<!DOCTYPE html>
<html lang="pt-BR">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title> Includes em PHP </title>
 <link rel="stylesheet" href="../css/formata-pagina.css">
</head>

<body>
 <h1> Funções de usuário e includes em PHP - exercício 8 da listaL1 </h1>

 <form action="exerc8.php" method="post">
  <fieldset>
   <legend> Funções de usuário e includes em PHP - Rendimento semestral dos alunos de PRWII </legend>

   <label class="alinha"> Forneça a primeira nota do aluno: </label>
   <input type="number" name="nota1"  autofocus step="0.1" min="0" max="10"> <br>

   <label class="alinha"> Forneça a segunda nota do aluno: </label>
   <input type="number" name="nota2"  step="0.1" min="0" max="10"> <br>

   <label class="alinha"> Forneça a terceira nota do aluno: </label>
   <input type="number" name="nota3"  step="0.1" min="0" max="10"> <br>

   <label> Escolha a média a ser utilizada: </label> <br>
   <input type="radio" name="media" value="média aritmética simples"> <label> Média aritmética simples </label> <br>

   <input type="radio" name="media" value="média aritmética ponderada"> <label> Média aritmética ponderada </label> <br>

   <button name="enviar-dados"> Calcular média </button>
  </fieldset>
 </form>

 <?php
 require_once "../includes/exerc8.inc.php";
 
 if(isset($_POST['enviar-dados']))
  {
  $nota1 = trim($_POST['nota1']);
  $nota2 = trim($_POST['nota2']);
  $nota3 = trim($_POST['nota3']);

  $tipoMedia = $_POST['media'];

  if($tipoMedia == "média aritmética simples" )
   {
   calcularMediaAritmeticaSimples($nota1, $nota2, $nota3);
   }
  else
   {
   calcularMediaAritmeticaPonderada($nota1, $nota2, $nota3);
   }
  }
 ?>
</body>
</html>