<!DOCTYPE html>
<html lang="pt-BR">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title> Banco de dados com PHP </title>
 <link rel="stylesheet" href="../css/formata-banco.css">
</head>
<body>
 <h1> Fundamentos do PHP com Banco de Dados MySQL </h1>

 <form action="exerc3.php" method="post">
  <fieldset>
   <legend> Controle de estoque - cadastro dos produtos (simplificado) </legend> 

   <label class="alinha"> Preço: </label>
   <input type="number" name="preco" min="0" step="0.01"> <br>

   <label class="alinha"> Quantidade em estoque: </label>
   <input type="number" name="estoque" min="0"> <br>
  
   <button name="cadastrar"> Cadastrar produto </button>
  </fieldset>

  <fieldset>
   <legend> Controle de estoque - alteração de preço </legend>

   <label class="alinha"> Forneça o ID pesquisado: </label>
   <input type="number" name="id-pesquisado" min="0"> <br>

   <label class="alinha"> Forneça o novo preço do produto: </label>
   <input type="number" name="altera-preco" min="0" step="0.01"> <br>

   <button name="alterar"> Alterar preço </button>
  </fieldset>

  <fieldset>
   <legend> Controle de estoque - exclusão de produto </legend>

   <label class="alinha"> Forneça um estoque mínimo: </label>
   <input type="number" name="estoque-minimo" min="0"> <br>

   <button name="excluir"> Excluir produtos com estoque abaixo do mínimo </button>
  </fieldset>
 </form>

 <?php
  require_once "../includes/classe-banco-de-dados.inc.php";
  require_once "../includes/classe-produtos.inc.php";
  $banco = new BancoDeDados("localhost", "root", "", "CTDS_2025_1_EXERC3", "produtos");
  $conexao = $banco->criarConexao();
  $banco->criarBanco($conexao);
  $banco->abrirBanco($conexao);
  $banco->definirCharset($conexao);
  $banco->criarTabela($conexao);

  $umProduto = new Produtos();

  if(isset($_POST["cadastrar"]))
   {
   $umProduto->receberDadosDoFormulario($conexao);
   $umProduto->cadastrar($conexao, $banco->nomeDaTabela);
   echo "<p> Dados do produto cadastrados com sucesso no banco de dados. </p>";
   }

  if(isset($_POST['alterar']))
   {
   $umProduto->alterarPreco($conexao, $banco->nomeDaTabela);
   }

  if(isset($_POST['excluir']))
   {
   $umProduto->excluirProduto($conexao, $banco->nomeDaTabela);
   }
 
  $banco->desconectar($conexao);
 ?> 
</body>
</html>