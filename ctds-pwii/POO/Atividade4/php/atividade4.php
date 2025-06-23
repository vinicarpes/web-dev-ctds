<!DOCTYPE html>
<html lang="pt-BR">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title> Introdução à POO com PHP </title>
 <link rel="stylesheet" href="../css/formata-pagina.css">
</head>
<body>
 <h1> Introdução à POO com PHP - atividade 4 </h1>

 <form action="atividade4.php" method="post">
  <fieldset>
   <legend> Livrarias AAAA - cadastro de livros </legend>
   <label class="alinha"> Título: </label>
   <input type="text" name="titulo" autofocus> <br> <br>

   <label class="alinha"> Autor: </label>
   <input type="text" name="autor"> <br> <br>

   <label class="alinha"> ISBN: </label>
   <input type="text" name="isbn">  <br> <br>

   <label class="alinha"> Preço de venda: </label>
   <input type="number" name="preco" min="0" max="50000" step="0.01">
  </fieldset>

  <fieldset>
   <legend> Taxa de desconto </legend>
   <label class="alinha"> Forneça a taxa de desconto: </label>
   <input type="number" min="0" max="100" name="taxa" step="0.1"> <label>%</label>
  </fieldset>

  <button name="enviar"> Criar objeto livro e mostrar resultados finais </button>
 </form>
 
 <?php
  require_once "../includes/atividade4.inc.php";

  if(isset($_POST["enviar"]))
   {
   $titulo   = $_POST['titulo'];
   $autor    = $_POST['autor'];
   $isbn     = $_POST['isbn'];
   $preco    = $_POST['preco'];
   $taxaDesc = $_POST['taxa'];

   $objLivro = new Livros($titulo, $autor, $isbn, $preco);

   $objLivro->calcularDesconto($taxaDesc);

   $objLivro->mostrarInformacoes();
   }
 ?>
</body>
</html>