<!DOCTYPE html>
<html lang="pt-BR">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title> Sistema Norteador - lavação de carros </title>
 <link rel="stylesheet" href="./../css/formata-geral-sn.css">
 <link rel="stylesheet" href="./../css/formata-cabecalho.css">
 <link rel="stylesheet" href="./../css/formata-navegacao.css">
 <link rel="stylesheet" href="./../css/principal.css">
 <link rel="stylesheet" href="./../css/formata-rodape.css">
</head>

<body>
 <div class="conteiner">
  <header>
   <h2> Desenvolvimento Web - CTDS - Sistema Norteador - Lavação de carros </h2>
  </header>

  <nav>
   <div class="menu">
    <ul>
     <li>
      <a href="home.php"> Home </a>
     </li>

     <li>
      <a href="cadastro-cliente.php"> Cadastrar Cliente </a>
     </li>

     <li>
      <a href="login-administrador.php"> Área do administrador </a>
     </li>

     <li>
      <a href="login-cliente.php"> Login do cliente </a>
     </li>
    </ul>
   </div>
  </nav>

  <main>
   <form action="cadastro-veiculo.php" method="post">
    <fieldset>
     <legend> Veículos - cadastro </legend>

     <div class="alinha">
      <label for="fabricante"> Fabricante: </label>
      <input type="text" id="fabricante" name="fabricante" autofocus>
     </div>

     <div class="alinha">
      <label for="modelo"> Modelo: </label>
      <input type="text" id="modelo" name="modelo">
     </div>

     <div class="alinha">
      <label for="placa"> Placa: </label>
      <input type="text" id="placa" name="placa">
     </div>

     <div class="alinha">
      <label for="cpf"> CPF do cliente: </label>
      <input type="text" name="cpf" id="cpf">
     </div>

     <div class="alinha">
      <button name="cadastrar-veiculo"> Cadastrar veículo </button>
     </div>
    </fieldset>
   </form>

   <?php
    require "../includes/classe-banco-de-dados.inc.php";
    require "../includes/classe-veiculos.inc.php";



    $banco = new BancoDeDados("localhost", "root", "", "Sistema_Lavacao_PRW2", "clientes", "veiculos", "administrador");

    $conexao = $banco->criarConexao();
    $banco->criarBanco($conexao);
    $banco->abrirBanco($conexao);
    $banco->definirCharset($conexao);
    $banco->criarTabelaClientes($conexao);
    $banco->criarTabelaVeiculos($conexao);
    $banco->criarTabelaAdministrador($conexao);
    
    $objVeiculo = new Veiculos();
    if(isset($_POST['cadastrar-veiculo'])){
        $objVeiculo->receberDadosDoFormulario($conexao);
        $objVeiculo->cadastrar($conexao, $banco->nomeDaTabelaVeiculos);
    }

    $banco->desconectar($conexao);
   ?>

  </main>

  <footer>
   <div class="rodape">
    <p> CTDS - Web Design, turma do semestre 2023/2 - primeira fase <br>
     Copyright &copy;2023 - todos os direitos reservados. <br>
     Entre em contato conosco:
     <a href="contato.html"> Contato </a>
    </p>
   </div>
  </footer>
 </div>
</body>

</html>