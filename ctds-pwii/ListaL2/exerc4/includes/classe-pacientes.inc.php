<?php
 class Pacientes 
  {
  public $nome;
  public $crmMedicoAtende;
  public $dataInternacao;

  function receberDadosDoFormulario($conexao)
   {
   $this->nome            = trim($conexao->escape_string($_POST['paciente']));
   $this->crmMedicoAtende = trim($conexao->escape_string($_POST["crm-atendimento"]));
   $this->dataInternacao  = trim($conexao->escape_string($_POST["data-internacao"]));
   }

  function cadastrar($conexao, $nomeDaTabela)
   {
   $sql = "INSERT $nomeDaTabela VALUES(
              null,
             '$this->nome',
             '$this->dataInternacao',
             '$this->crmMedicoAtende')";
   $conexao->query($sql) or die($conexao->error);
   } 
  }