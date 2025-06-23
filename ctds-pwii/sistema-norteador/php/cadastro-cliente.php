<!DOCTYPE html>
<html lang="pt-BR">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title> Sistema Norteador - lavação de carros </title>
 <link rel="stylesheet" href="./../css/formata-cabecalho.css">
 <link rel="stylesheet" href="./../css/formata-principal.css">
 <link rel="stylesheet" href="./../css/formata-geral-sn.css">
 <link rel="stylesheet" href="./../css/formata-navegacao.css">
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
      <a href="cadastro-veiculo.php"> Cadastrar veículo </a>
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
   <form action="cadastro-cliente.php" method="post">
    <fieldset>
     <legend> Clientes - cadastro </legend>

     <div class="alinha">
      <label for="nome"> Nome: </label>
      <input type="text" id="nome" name="nome" autofocus>
     </div>

     <div class="alinha">
      <label for="endereco"> Endereço: </label>
      <input type="text" id="endereco" name="endereco">
     </div>

     <div class="alinha">
      <label for="email"> E-mail: </label>
      <input type="email" id="email" name="email">
     </div>

     <div class="alinha">
      <label for="fone"> Celular: </label>
      <input type="tel" id="fone" name="celular">
     </div>

     <div class="alinha">
      <label for="cpf"> CPF: </label>
      <input type="text" id="cpf" name="cpf">
     </div>

     <div class="alinha">
      <label for="login"> Usuário: </label>
      <input type="text" id="login" name="login">
     </div>

     <div class="alinha">
      <label for="senha"> Senha: </label>
      <input type="password" id="senha" name="senha">
     </div>

     <div class="alinha">
      <button name="cadastrar-cliente"> Cadastrar cliente </button>
     </div>
    </fieldset>
   </form>

   <?php
    require "../includes/classe-banco-de-dados.inc.php";
    require "../includes/classe-clientes.inc.php";



    $banco = new BancoDeDados("localhost", "root", "", "Sistema_Lavacao_PRW2", "clientes", "veiculos", "administrador");

    $conexao = $banco->criarConexao();
    $banco->criarBanco($conexao);
    $banco->abrirBanco($conexao);
    $banco->definirCharset($conexao);
    $banco->criarTabelaClientes($conexao);
    $banco->criarTabelaVeiculos($conexao);
    $banco->criarTabelaAdministrador($conexao);
    
    $objCliente = new Clientes();
    if(isset($_POST['cadastrar-cliente'])){
        $objCliente->receberDadosDoFormulario($conexao);
        $objCliente->cadastrar($conexao, $banco->nomeDaTabelaClientes);
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