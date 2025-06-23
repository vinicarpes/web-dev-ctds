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

 <form action="exerc4.php" method="post">
  <fieldset>
   <legend> Clínica médica AAA - cadastro de médicos </legend> 

   <label class="alinha"> Nome do médico: </label>
   <input type="text" name="medico" placeholder="Forneça o nome do médico a ser cadastrado" autofocus> <br>

   <label class="alinha"> CRM do médico: </label>
   <input type="text" name="crm" placeholder="Forneça o CRM do médico a ser cadastrado"> <br>
  
   <button name="cadastrar-medico"> Cadastrar Médico </button>
  </fieldset>

  <fieldset>
   <legend> Clínica médica AAA - cadastro de pacientes </legend>

   <label class="alinha"> Nome do paciente: </label>
   <input type="text" name="paciente" placeholder="Forneça o nome do paciente a ser cadastrado"> <br>

   <label class="alinha"> Forneça o CRM do médico que atende este paciente: </label>
   <input type="text" name="crm-atendimento" placeholder="CRM do médico atendendo este paciente"> <br>

   <label class="alinha"> Forneça a data de internação do paciente: </label>
   <input type="date" name="data-internacao"> <br>

   <button name="cadastrar-paciente"> Cadastrar paciente </button>
  </fieldset>

  <fieldset>
   <legend> Clínica médica AAA - pesquisa por médico </legend>

   <label class="alinha"> Forneça o nome do médico pesquisado: </label>
   <input type="text" name="pesquisa-medico"> <br>

   <button name="pesquisar"> Mostrar número de pacientes atendidos pelo médico </button>
  </fieldset>
 </form>

 <?php
  require_once "../includes/classe-banco-de-dados.inc.php";
  require_once "../includes/classe-medicos.inc.php";
  require_once "../includes/classe-pacientes.inc.php";

  $banco = new BancoDeDados("localhost", "root", "", "CTDS_2025_1_EXERC4", "medicos", "pacientes");

  $conexao = $banco->criarConexao();
  $banco->criarBanco($conexao);
  $banco->abrirBanco($conexao);
  $banco->definirCharset($conexao);

  //vamos invocar o método que cria a tabela medicos
  $banco->criarTabelaMedicos($conexao);

  //vamos invocar o método que cria a tabela pacientes
  $banco->criarTabelaPacientes($conexao);

  //criando os objetos da entidades médico e paciente
  $umMedico   = new Medicos();
  $umPaciente = new Pacientes();

  if(isset($_POST["cadastrar-medico"]))
   {
   $umMedico->receberDadosDoFormulario($conexao);
   $umMedico->cadastrar($conexao, $banco->nomeDaTabelaMedicos);
   echo "<p> Dados do médico cadastrados com sucesso no banco de dados. </p>";
   }

  if(isset($_POST['cadastrar-paciente']))
   {
   $umPaciente->receberDadosDoFormulario($conexao);
   $umPaciente->cadastrar($conexao, $banco->nomeDaTabelaPacientes);
   echo "<p> Dados do paciente cadastrados com sucesso no banco de dados. </p>";
   }

  if(isset($_POST['pesquisar']))
   {
   $umMedico->contarPacientes($conexao, $banco->nomeDaTabelaMedicos, $banco->nomeDaTabelaPacientes);
   }
   
  $banco->desconectar($conexao);
 ?> 
</body>
</html>