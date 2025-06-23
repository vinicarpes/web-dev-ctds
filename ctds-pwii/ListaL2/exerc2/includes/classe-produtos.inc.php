<?php
 class Produtos
  {
  public $id;
  public $preco;
  public $estoque;
  public $classificacao;
  public $descricao;

  function receberDadosDoFormulario($conexao)
   {
   $this->id            = trim($conexao->escape_string($_POST["id"]));
   $this->preco         = trim($conexao->escape_string($_POST['preco']));
   $this->estoque       = trim($conexao->escape_string($_POST["estoque"]));
   $this->classificacao = trim($conexao->escape_string($_POST["classific"]));
   $this->descricao     = trim($conexao->escape_string($_POST["descricao"]));
   }

  function cadastrar($conexao, $nomeDaTabela)
   {
   $sql = "INSERT $nomeDaTabela VALUES(
            '$this->id',
             $this->preco,
             $this->estoque,
             '$this->classificacao',
             '$this->descricao')";
   $conexao->query($sql) or die($conexao->error);
   }

  function tabularDados($conexao, $nomeDaTabela)
   {
   $sql = "SELECT * FROM $nomeDaTabela WHERE classificacao ='Produto perecível' ORDER BY estoque DESC";
   $resultado = $conexao->query($sql) or die($conexao->error);

   //antes de o PHP começar o desenho da tabela, vamos perguntar se algum registro retornou da consulta anterior
   $quantosRegistrosRetornados = $conexao->affected_rows;
   if($quantosRegistrosRetornados == 0)
    {
    exit("<p> nenhum produto perecível encontrado no banco de dados! </p>");
    }

   echo "<table>
           <caption> Relação de produtos perecíveis cadastrados no banco de dados </caption>
           <tr>
            <th> ID </th>
            <th> Preço </th>
            <th> Estoque </th>
            <th> Classificação </th>
            <th> Descrição </th>";

   while($vetorLinha = $resultado->fetch_array())   
    {
    //a função htmlentities() evita o tipo de ataque chamado de XSS
    $id           = htmlentities($vetorLinha[0], ENT_QUOTES, "UTF-8");
    $preco        = htmlentities($vetorLinha[1], ENT_QUOTES, "UTF-8");
    $estoque      = htmlentities($vetorLinha[2], ENT_QUOTES, "UTF-8");
    $classific    = htmlentities($vetorLinha[3], ENT_QUOTES, "UTF-8");
    $descricao    = htmlentities($vetorLinha[4], ENT_QUOTES, "UTF-8");

    $precoFormatado = number_format($preco, 2, ",", ".");

    echo "<tr>
           <td> $id </td>
           <td> $precoFormatado </td>
           <td> $estoque </td>
           <td> $classific </td>
           <td> $descricao </td>
          </tr>";    
    }
   echo "</table>";
   }

  function mostrarDescricao($conexao, $nomeDaTabela)
   {
   $sql = "SELECT descricao FROM $nomeDaTabela WHERE estoque = (SELECT MIN(estoque) FROM $nomeDaTabela)";  

   $resultado = $conexao->query($sql) or die($conexao->error);

   $vetorLinha = $resultado->fetch_array();
   $descricao  = htmlentities($vetorLinha[0], ENT_QUOTES, "UTF-8");
   echo "<p> Confira, a seguir, a descrição do produto com a menor quantidade em estoque no banco de dados: <span> $descricao </span> </p>";
   }  

 function calcularFaturamento($conexao, $nomeDaTabela)
  {
  $sql = "SELECT SUM(preco * estoque) FROM $nomeDaTabela WHERE classificacao = 'Produto não-perecível'";

  $resultado = $conexao->query($sql) or die($conexao->error);
  $vetorLinha = $resultado->fetch_array();
  $faturamento = htmlentities($vetorLinha[0], ENT_QUOTES, "UTF-8");
  $faturamentoFormatado = number_format($faturamento, 2, ",", ".");

  echo "<p> Caro usuário, ao vender todos os produtos não-perecíveis do banco de dados, seu faturamento será de <span>R$$faturamentoFormatado </span> </p>";
  }
 }