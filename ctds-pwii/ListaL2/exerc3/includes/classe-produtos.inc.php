<?php
 class Produtos
  {
  public $id;
  public $preco;
  public $estoque;


  function receberDadosDoFormulario($conexao)
   {
   $this->preco         = trim($conexao->escape_string($_POST['preco']));
   $this->estoque       = trim($conexao->escape_string($_POST["estoque"]));
   }

  function cadastrar($conexao, $nomeDaTabela)
   {
   //note o uso do valor null no INSERT para campo de autoincremento
   $sql = "INSERT $nomeDaTabela VALUES(
             null,
             $this->preco,
             $this->estoque)";
   $conexao->query($sql) or die($conexao->error);
   }

  //método para alterar o preço de um produto, sendo pesquisado pelo seu id
  function alterarPreco($conexao, $nomeDaTabela)
   {
   $idPesquisado = trim($conexao->escape_string($_POST['id-pesquisado']));
   $novoPreco    = trim($conexao->escape_string($_POST['altera-preco']));

   $sql = "UPDATE $nomeDaTabela SET preco = $novoPreco WHERE id = $idPesquisado";
   $conexao->query($sql) or die($conexao->error);

   if($conexao->affected_rows)
    {
    echo "<p> Preço alterado com sucesso no banco de dados. </p>";
    }
   else
    {
    echo "<p> O id fornecido para o produto não foi localizado no banco de dados. </p>";
    }  
  }

 //método que exclui qualquer produto com estoque abaixo do mínimo, fornecido no formulário
 function excluirProduto($conexao, $nomeDaTabela)
  {
  $estoqueMinimo = trim($conexao->escape_string($_POST['estoque-minimo']));
  $sql = "DELETE FROM $nomeDaTabela WHERE estoque < $estoqueMinimo";

  $conexao->query($sql) or die($conexao->error);

  //testamos se algum produto com estoque abaixo do mínimo foi excluído
  if($conexao->affected_rows)
   {
   echo "<p> Exclusão de produtos abaixo do estoque mínimo feita com sucesso no banco de dados. Foram excluídos <span>  $conexao->affected_rows </span> produto. </p>";
   }
  else
   {
   echo "<p> Nenhum produto excluído do banco de dados. Todos os produtos cadastrados estão com estoque igual ou acima do estoque mínimo. </p>";
   }  
  }  
 }