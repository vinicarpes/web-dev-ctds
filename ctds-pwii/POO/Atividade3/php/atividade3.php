<!DOCTYPE html>
<html lang="pt-BR">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title> Introdução à POO com PHP </title>
 <link rel="stylesheet" href="../css/formata-pagina.css">
</head>
<body>
 <h1> Introdução à POO com PHP - atividade 3 </h1>

 <form action="atividade3.php" method="post">
  <fieldset>
   <legend> Conta 1 </legend>
   <label class="alinha"> Forneça o saldo inicial: </label>
   <input type="number" min="0" name="saldo1" step="0.01" autofocus>
  </fieldset>

  <fieldset>
   <legend> Conta 2 </legend>
   <label class="alinha"> Forneça o saldo inicial: </label>
   <input type="number" min="0" name="saldo2" step="0.01">
  </fieldset>

  <button name="enviar"> Criar contas e mostrar saldo final </button>
 </form>
 
 <?php
  require_once "../includes/atividade3.inc.php";

  if(isset($_POST["enviar"]))
   {
   $saldo1   = $_POST['saldo1'];
   $saldo2   = $_POST['saldo2'];

   $conta1 = new ContaBancaria($saldo1);
   $conta2 = new ContaBancaria($saldo2);

   //depositar
   $conta1->depositar(1000);
   $conta2->depositar(2000);

   //sacar
   $conta1->sacar(500);
   $conta2->sacar(500);

   $saldoAtual1 = $conta1->mostrarSaldo();
   $saldoAtual2 = $conta2->mostrarSaldo();

   //relatório final das operações bancárias
   echo "<p> Saldos finais das duas contas: <br>
             Saldo final da conta 1 = <span>  $saldoAtual1 </span> <br>
             Saldo final da conta 2 = <span>  $saldoAtual2 </span> </p>";
   }
 ?>
</body>
</html>