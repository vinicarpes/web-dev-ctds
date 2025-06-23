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

 <form action="exerc2.php" method="post">
  <fieldset>
   <legend> Dados cadastrais dos produtos </legend>

   <label class="alinha"> ID: </label>
   <input type="text" name="id" autofocus placeholder="Forneça o id do produto"> <br>

   <label class="alinha"> Preço: </label>
   <input type="number" name="preco" min="0" step="0.01"> <br>

   <label class="alinha"> Quantidade em estoque: </label>
   <input type="number" name="estoque" min="0"> <br>

   <label> Classificação do produto: </label> <br>
   <input type="radio" name="classific" value="Produto perecível" checked> <label> Produto perecível </label> <br>
   <input type="radio" name="classific" value="Produto não-perecível"> <label> Produto não-perecível </label> <br> <br>

   <label> Descrição do produto: </label>
   <textarea name="descricao"></textarea> <br>
   <button name="cadastrar"> Cadastrar produto </button>
  </fieldset>

  <fieldset>
   <legend> Outras operações no banco de dados </legend>
   <select name="operacoes">
    <option value="1"> Tabular produtos perecíveis </option>
    <option value="2"> Mostrar descrição do produto com menor estoque </option>
    <option value="3"> Calcular faturamento com produtos não-perecíveis </option>
   </select>
   <button name="outras-operacoes"> Executar operação selecionada </button>
  </fieldset>
 </form>

 <?php
  require_once "../includes/classe-banco-de-dados.inc.php";
  require_once "../includes/classe-produtos.inc.php";
  $banco = new BancoDeDados("localhost", "root", "", "CTDS_2025_1_EXERC2", "produtos");
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

  //testar o botão "Executar operação selecionada"
  if(isset($_POST["outras-operacoes"]))
   {
   //vamos receber qual option do select o usuário escolheu
   $operacao = $_POST["operacoes"];

   //vamos testar os values de option e invocar o método apropriado para cada operação no banco de dados
   if($operacao == "1")
    {
    $umProduto->tabularDados($conexao, $banco->nomeDaTabela);
    }
   elseif($operacao == "2")
    {
    $umProduto->mostrarDescricao($conexao, $banco->nomeDaTabela);
    }
   else
    {
    $umProduto->calcularFaturamento($conexao, $banco->nomeDaTabela);    
    }
   }

  $banco->desconectar($conexao);
 ?> 
</body>
</html>