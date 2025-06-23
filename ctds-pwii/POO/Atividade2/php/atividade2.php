<!DOCTYPE html>
<html lang="pt-BR">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title> Introdução à POO com PHP </title>
 <link rel="stylesheet" href="../css/formata-pagina.css">
</head>
<body>
 <h1> Introdução à POO com PHP - atividade 2 </h1>

 <form action="atividade2.php" method="post">
  <fieldset>
   <legend> Curso 1 </legend>

   <label class="alinha"> Nome do curso: </label>
   <input type="text" name="nome1" autofocus> <br>

   <label class="alinha"> Duração do curso: </label>
   <input type="number" min="0" max="20" name="duracao1">
  </fieldset>

  <fieldset>
   <legend> Curso 2 </legend>

   <label class="alinha"> Nome do curso: </label>
   <input type="text" name="nome2"> <br>

   <label class="alinha"> Duração do curso: </label>
   <input type="number" min="0" max="20" name="duracao2">
  </fieldset>

  <button name="enviar"> Criar objetos Curso e classificá-los </button>
 </form>
 
 <?php
  require_once "../includes/atividade2.inc.php";

  if(isset($_POST["enviar"]))
   {
   //recebendo os dados dos dois cursos, vindos do formulário
   $nome1    = $_POST['nome1'];
   $duracao1 = $_POST['duracao1'];

   $nome2    = $_POST['nome2'];
   $duracao2 = $_POST['duracao2'];

   //criando os objetos curso por meio do método construtor
   $curso1 = new Curso($nome1, $duracao1);
   $curso2 = new Curso($nome2, $duracao2);

   //invocando o método para classificar os dois cursos
   $classific1 = $curso1->classificarCurso();
   $classific2 = $curso2->classificarCurso();

   //relatório básico
   echo "<p> Dados dos dois cursos cadastrados: <br>
             Nome do curso 1 = <span> $curso1->nome </span> <br>
             Duração do curso 1 = <span> $curso1->duracao semestres </span> <br>
             Classificação do curso 1 = <span> $classific1 </span> <br> <br>
             
             Nome do curso 2 = <span> $curso2->nome </span> <br>
             Duração do curso 2 = <span> $curso2->duracao semestres </span> <br>
             Classificação do curso 2 = <span> $classific2 </span> </p>";

   }
 ?>
</body>
</html>