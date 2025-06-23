<!DOCTYPE html>
<html lang="pt-BR">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title> Introdução à POO com PHP </title>
 <link rel="stylesheet" href="../css/formata-pagina.css">
</head>
<body>
 <h1> Introdução à POO com PHP - atividade 1 </h1>

 <?php
  require_once "../includes/atividade1.inc.php";

  //criando um objeto em PHP
  $produto1 = new Item();

  //atribuindo propriedades ao objeto criado
  $produto1->nome      = "Impressora";
  $produto1->preco     = 350.28;
  $produto1->categoria = "Hardware - periférico";
  //invocando o método que retorna a categoria do produto criado
  $categ  = $produto1->mostrarCategoria();
  echo "<p> A categoria do produto criado é <span> $categ </span> </p>";

  //invocando o método que mostra o preço atual do produto
  $precoAtual = $produto1->mostrarPreco();
  echo "<p> O preço atual do produto criado é <span> R$$precoAtual </span> </p>";

  //invocando o método que altera o preço atual do produto
  $produto1->modificarPreco(500.00);

  //invocando o método que mostra o preço alterado
  $precoAtual = $produto1->mostrarPreco();
  echo "<p> O novo preço do produto criado é <span> R$$precoAtual </span> </p>";
 ?> 
</body>
</html>