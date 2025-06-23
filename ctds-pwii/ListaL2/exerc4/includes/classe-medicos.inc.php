<?php
 class Medicos
  {
  public $crm;
  public $nome;


  function receberDadosDoFormulario($conexao)
   {
   $this->crm           = trim($conexao->escape_string($_POST['crm']));
   $this->nome          = trim($conexao->escape_string($_POST["medico"]));
   }

  function cadastrar($conexao, $nomeDaTabela)
   {
   $sql = "INSERT $nomeDaTabela VALUES(
             '$this->crm',
             '$this->nome')";
   $conexao->query($sql) or die($conexao->error);
   }
  
  //vamos implementar, nessa classe, o método que recebe o nome do médico pesquisado. Com esse nome, vamos até o banco de dados para descobrir, usando o seu CRM - que é chave estrangeira da tabela pacientes - quantos pacientes são atendidos por esse médico

  function contarPacientes($conexao, $nomeTabelaMedicos, $nomeTabelaPacientes)
   {
   $nomeMedicoPesquisado = trim($conexao->escape_string($_POST['pesquisa-medico']));

   //depois de receber o nome do médico, o passo seguinte do nosso método é criar a consulta, para verificar se o nome do médico buscado está cadastrado no banco e, se estiver cadastrado, recuperamos seu crm
   $sql = "SELECT CRM FROM $nomeTabelaMedicos WHERE nome='$nomeMedicoPesquisado'";

   $resultado = $conexao->query($sql) or die($conexao->error);

   //testamos se a consulta anterior não encontrou o médico pesquisado
   if(!$conexao->affected_rows)
    {
    exit("<p> O nome do médico pesquisado <span> $nomeMedicoPesquisado </span> não foi encontrado em nossa base de dados. Aplicação encerrada. Tente novamente! </p>");
    }

   //se o PHP chegar até aqui, o médico foi encontrado no banco de dados. Vamos recuperar seu CRM
   $vetorRegistro = $resultado->fetch_array();
   $crm = $vetorRegistro[0];
   $crm = htmlentities($crm, ENT_QUOTES, "UTF-8"); //evita aataque XSS

   //por fim, criamos outra consulta que vai até a tabela pacientes e usa a chave estrangeira (CRM) para contar o número de pacientes atendidos pelo médico pesquisado
   $sql = "SELECT COUNT(*) FROM $nomeTabelaPacientes WHERE crm_medico='$crm'";
   $resultado = $conexao->query($sql) or die($conexao->error);

   $vetorRegistro = $resultado->fetch_array();
   $quantosPacientesAtendidos = $vetorRegistro[0];
   $quantosPacientesAtendidos = htmlentities($quantosPacientesAtendidos, ENT_QUOTES, "UTF-8");

   echo "<p> Neste momento, há um total de <span> $quantosPacientesAtendidos pacientes </span> atendidos pelo médico <span> $nomeMedicoPesquisado  </span> </p>";
   }    
 }