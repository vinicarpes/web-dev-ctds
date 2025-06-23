<?php
 function calcularComissao($valorVenda, $percentualComissao)
  {
  $comissao = $valorVenda * $percentualComissao/100;
  return $comissao;
  }

 //==================================================================

 function calcularDesconto($valorVenda)
  {
  define("PERCENT_DESC", 5);

  $desconto = 0;
  if(isset($_POST['forma-pagamento']))
   {
   $desconto = $valorVenda * PERCENT_DESC/100;
   }

  return $desconto;
  }

 //===================================================================

 function calcularValorFinalVenda($valorVenda, $valorDesconto)
  {
  $valorFinal = $valorVenda - $valorDesconto;
  return $valorFinal;
  }

 //==================================================================

 function mostrarResultados($valorVenda, $percentualComissao, $valorComissao, $valorDesconto, $valorFinalVenda)
  {
  $valorVendaFormatado = number_format($valorVenda, 2, ",", ".");
  $percentualComissaoFormatado = number_format($percentualComissao, 1, ",", ".");
  $valorComissaoFormatado = number_format($valorComissao, 2, ",", ".");
  $valorDescontoFormatado = number_format($valorDesconto, 2, ",", ".");
  $valorFinalVendaFormatado = number_format($valorFinalVenda, 2, ",", ".");

  echo "<p> Resultado do processamento da venda <br>
            Valor inicial da venda = <span> R$$valorVendaFormatado </span> <br>
            Percentual de comissão do vendedor = <span> {$percentualComissaoFormatado}% </span> <br>
            Valor da comissão do vendedor = <span> R$ $valorComissaoFormatado </span> <br>
            Valor do desconto do cliente = <span> R$$valorDescontoFormatado </span> <br>
            Valor final da venda = <span> $valorFinalVendaFormatado </span> </p>";
  }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title> Funções de usuário em PHP </title>
 <link rel="stylesheet" href="formata-pagina.css">
</head>

<body>
 <h1> Funções de usuário em PHP - exercício 4 da listaL6 </h1>

 <form action="exerc4.php" method="post">
  <fieldset>
   <legend> Processamento de vendas </legend>

   <label class="alinha"> Forneça o valor da venda: </label>
   <input type="number" name="venda"  autofocus step="0.01" min="0"> <br>

   <label class="alinha"> Forneça o percentual de comissão do vendedor: </label>
   <input type="number" name="percent-comissao"  min="0" max="100" step="0.1"> <label>%</label> <br>

   <label> Escolha a forma de pagamento: </label> <br>
   <input type="checkbox" name="forma-pagamento"> <label> Marque esta opção se o cliente pagou com cartão de fidelidade </label> <br>

   <button name="enviar"> Processar venda da loja </button>
  </fieldset>
 </form>

 <?php

 if(isset($_POST["enviar"]))
  {
   //área do script principal
   $valorVenda = $_POST["venda"];
   $percentualComissao = $_POST['percent-comissao'];

   //invocar a função (precisa ter retorno) que calcula o valor da comissão do vendedor
   $valorComissao = calcularComissao($valorVenda, $percentualComissao);

   //invocar a função (com retorno) que calcular e devolve o valor do desconto dado ao cliente
   $valorDesconto = calcularDesconto($valorVenda);

   //invocar a função para calcular o valor final da venda (com retorno), considerando o  desconto dado
   $valorFinalVenda = calcularValorFinalVenda($valorVenda, $valorDesconto);

   //invocar a função para mostrar os resultados da operação de venda
   mostrarResultados($valorVenda, $percentualComissao, $valorComissao, $valorDesconto, $valorFinalVenda);
  }
 ?>
</body>
</html>