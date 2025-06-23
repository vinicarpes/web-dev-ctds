<?php
 class BancoDeDados
  {
  public $nomeDoBanco;
  public $nomeDaTabela;
  public $servidor;
  public $usuario;
  public $senha;

  function __construct($umServidor, $umUsuario, $umaSenha, $umBanco, $umaTabela)
   {
   $this->servidor     = $umServidor;
   $this->usuario      = $umUsuario;
   $this->senha        = $umaSenha;
   $this->nomeDoBanco  = $umBanco;
   $this->nomeDaTabela = $umaTabela;   
   }

  function criarConexao() 
   {
   $conexao = new mysqli($this->servidor, $this->usuario, $this->senha) or exit($conexao->error);
   return $conexao;
   }

  function criarBanco($conexao)
   {
   $sql = "CREATE DATABASE IF NOT EXISTS $this->nomeDoBanco";
   $conexao->query($sql) or exit($conexao->error);
   }

  function abrirBanco($conexao)
   {
   $conexao->select_db($this->nomeDoBanco);
   }

  function criarTabela($conexao)
   {
   $sql = "CREATE TABLE IF NOT EXISTS $this->nomeDaTabela (
              id VARCHAR(50) PRIMARY KEY,
              preco DECIMAL(7,2),
              estoque INT,
              classificacao VARCHAR(50),
              descricao VARCHAR(500))";
   $conexao->query($sql) or exit($conexao->error);
   }

  function definirCharset($conexao)
   {
   $conexao->set_charset("utf8");
   }

  function desconectar($conexao)
   {
   $conexao->close();
   }
  }