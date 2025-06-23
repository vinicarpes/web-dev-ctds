<?php
 class Clientes
  {
  public $nome;
  public $endereco;
  public $email;
  public $celular;
  public $cpf;
  public $login;
  public $senha;

  function receberDadosDoFormulario($conexao)
   {
   $this->nome       = trim($conexao->escape_string($_POST['nome']));
   $this->endereco   = trim($conexao->escape_string($_POST['endereco']));
   $this->email      = trim($conexao->escape_string($_POST["email"]));
   $this->celular    = trim($conexao->escape_string($_POST["celular"]));
   $this->cpf        = trim($conexao->escape_string($_POST["cpf"]));
   $this->login      = trim($conexao->escape_string($_POST["login"]));
   $this->senha      = trim($conexao->escape_string($_POST["senha"]));
   }

  function cadastrar($conexao, $nomeDaTabela)
   {
   $sql = "INSERT INTO $nomeDaTabela VALUES(
             '$this->cpf',
             '$this->nome',
             '$this->endereco',
             '$this->email',
             '$this->celular',
             '$this->login',
             '$this->senha')";
   $conexao->query($sql) or die($conexao->error);
   }
 }