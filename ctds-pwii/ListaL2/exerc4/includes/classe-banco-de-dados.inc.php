<?php
 class BancoDeDados
  {
  public $nomeDoBanco;
  public $nomeDaTabelaMedicos;
  public $nomeDaTabelaPacientes;
  public $servidor;
  public $usuario;
  public $senha;

  function __construct($umServidor, $umUsuario, $umaSenha, $umBanco, $umaTabelaMedicos, $umaTabelaPacientes)
   {
   $this->servidor     = $umServidor;
   $this->usuario      = $umUsuario;
   $this->senha        = $umaSenha;
   $this->nomeDoBanco  = $umBanco;
   $this->nomeDaTabelaMedicos   = $umaTabelaMedicos;
   $this->nomeDaTabelaPacientes = $umaTabelaPacientes;   
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

  //criar a consulta da tabela médicos
  function criarTabelaMedicos($conexao)
   {
   $sql = "CREATE TABLE IF NOT EXISTS $this->nomeDaTabelaMedicos (
              CRM VARCHAR(50) PRIMARY KEY,
              nome VARCHAR(300))";
   $conexao->query($sql) or exit($conexao->error);
   }

  //criar a consulta da tabela pacientes
  function criarTabelaPacientes($conexao)
   {
   $sql = "CREATE TABLE IF NOT EXISTS $this->nomeDaTabelaPacientes(
           ID INT PRIMARY KEY AUTO_INCREMENT,
           nome VARCHAR(300),
           data_internacao DATE,
           crm_medico VARCHAR(50),
           FOREIGN KEY (crm_medico) REFERENCES $this->nomeDaTabelaMedicos(CRM))";

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