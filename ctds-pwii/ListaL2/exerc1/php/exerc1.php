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

 <form action="exerc1.php" method="post">
  <fieldset>
   <legend> Dados cadastrais do aluno - UC PRWII </legend>

   <label class="alinha"> Nome: </label>
   <input type="text" name="aluno" autofocus placeholder="Forneça o nome do aluno"> <br>

   <label class="alinha"> Matrícula: </label>
   <input type="text" name="matric"> <br>

   <label class="alinha"> Média final de PRWII: </label>
   <input type="number" name="media" min="0" max="10" step="0.1"> <br>

   <button name="cadastrar"> Cadastrar aluno no banco de dados </button>
  </fieldset>

  <fieldset>
   <legend> Outras operações no banco de dados </legend>
   <button name="tabular-dados"> Tabular dados dos alunos </button>
   <button name="contar-aprovados"> Mostrar número de alunos aprovados </button>
  </fieldset>
 </form>

 <?php
  //vamos incluir o arquivo que define e classe da conexão com o banco de dados
  require_once "../includes/classe-banco-de-dados.inc.php";

  //vamos incluir o caminho do arquivo que define a classe Alunos
  require_once "../includes/classe-alunos.inc.php";

  //criar o objeto banco de dados que, nesse momento, armazena a conexão com o servidor, inicializando o construtor da nossa classe
  $banco = new BancoDeDados("localhost", "root", "", "CTDS_2025_1", "alunos");

  //criar a conexão física com o servidor MySQL
  $conexao = $banco->criarConexao();

  //o próximo passo é criar o banco de dados, de fato, no servidor
  $banco->criarBanco($conexao);

  //agora, vamos abrir o banco de dados criado
  $banco->abrirBanco($conexao);

  //definindo o utf-8 como tabela de símbolos do MySQL
  $banco->definirCharset($conexao);

  //invocando o método para criar a tabela 
  $banco->criarTabela($conexao);

  //a partir desse ponto no arquivo principal, vamos criar o objeto aluno e invocar os métodos da classe classe-alunos.inc.php
  $aluno = new Alunos();

  //para cadastrarmos o dados do objeto aluno no banco, precisamos fazer com o PHP teste se o botão de cadastro foi acionado no formulário
  if(isset($_POST["cadastrar"]))
   {
   $aluno->receberDadosDoFormulario($conexao);
   $aluno->cadastrar($conexao, $banco->nomeDaTabela);
   echo "<p> Dados do aluno foram cadastrados com sucesso no banco de dados. </p>";
   }

  //testamos se o botão de tabular dados foi acionado no formulário
  if(isset($_POST["tabular-dados"]))
   {
   //invocar o método do objeto aluno que tabula os dados na página web
   $aluno->tabularDados($conexao, $banco->nomeDaTabela);
   }

  //testamos o botão para contar os alunos aprovados em PRWII
  if(isset($_POST['contar-aprovados']))
   {
   $aluno->contarAprovados($conexao, $banco->nomeDaTabela);
   }

  //após finalizar toda a execução da nossa aplicação, "matamos" a conexão com o MySQL
  $banco->desconectar($conexao);
 ?> 
</body>
</html>