<?php
 class BancoDeDados
  {
  public $nomeDoBanco;
  public $nomeDaTabelaClientes;
  public $nomeDaTabelaVeiculos;
  public $nomeDaTabelaAdmin;
  public $servidor;
  public $usuario;
  public $senha;

  function __construct($umServidor, $umUsuario, $umaSenha, $umBanco, $nomeTabela1, $nomeTabela2, $nomeTabela3)
   {
   $this->servidor     = $umServidor;
   $this->usuario      = $umUsuario;
   $this->senha        = $umaSenha;
   $this->nomeDoBanco  = $umBanco;
   $this->nomeDaTabelaClientes = $nomeTabela1;   
   $this->nomeDaTabelaVeiculos = $nomeTabela2;   
   $this->nomeDaTabelaAdmin    = $nomeTabela3;   
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

  function criarTabelaClientes($conexao)
   {
   $sql = "CREATE TABLE IF NOT EXISTS $this->nomeDaTabelaClientes (
            CPF VARCHAR(50) PRIMARY KEY,
            nome VARCHAR(500),
            endereco VARCHAR(500),
            email VARCHAR(500),
            celular VARCHAR(100),
            usuario VARCHAR(100),
            senha VARCHAR(128)              
            )";
   $conexao->query($sql) or exit($conexao->error);
   }

  function criarTabelaVeiculos($conexao)
   {
   $sql = "CREATE TABLE IF NOT EXISTS $this->nomeDaTabelaVeiculos(
            ID INT PRIMARY KEY AUTO_INCREMENT,
            fabricante VARCHAR(300),
            modelo VARCHAR(300),
            placa VARCHAR(30),
            cpf_cliente VARCHAR(50),
            FOREIGN KEY (cpf_cliente) REFERENCES $this->nomeDaTabelaClientes(CPF)
            )";
   $conexao->query($sql) or exit($conexao->error);
   }

  function criarTabelaAdministrador($conexao)
   {
   $sql = "CREATE TABLE IF NOT EXISTS $this->nomeDaTabelaAdmin(
            ID INT PRIMARY KEY AUTO_INCREMENT,
            login_admin VARCHAR(100),
            senha_admin VARCHAR(128)
            )";
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