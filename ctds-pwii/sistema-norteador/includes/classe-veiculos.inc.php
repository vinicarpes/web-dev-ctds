<?php
 class Veiculos
  {
  public $fabricante;
  public $modelo;
  public $cpf_cliente;
  public $placa;

  function receberDadosDoFormulario($conexao)
   {
   $this->fabricante       = trim($conexao->escape_string($_POST["fabricante"]));
   $this->modelo   = trim($conexao->escape_string($_POST['modelo']));
   $this->cpf_cliente      = trim($conexao->escape_string($_POST["cpf"]));
   $this->placa    = trim($conexao->escape_string($_POST["placa"]));
   }

  function cadastrar($conexao, $nomeDaTabela)
   {
   $sql = "INSERT $nomeDaTabela VALUES(
              null,
             '$this->cpf_cliente',
             '$this->modelo',
             '$this->placa',
             '$this->fabricante')";
   $conexao->query($sql) or die($conexao->error);
   }
 }