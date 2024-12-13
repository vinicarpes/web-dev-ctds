<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/formata-pagina.css">
    <title>Relatório de venda</title>
</head>
<body>

    <h1>Resumo de compra</h1>

        <?php
        define("DESC_CARTAO", 0.05);
        define("TAXA_ENTREGA",0.02);
        $valorCompra=0;
        $acrescimo = 0;
        $desconto = 0;

        if(isset($_POST["valor-compra"])){
            $valorCompra = $_POST["valor-compra"];
        }
        
        if(isset($_POST["entrega-domiciliar"])){
            //checkbox marcado
            $acrescimo = $valorCompra*TAXA_ENTREGA;
        }
        
        $valorFinal = $valorCompra + $acrescimo;
        
        if(isset($_POST["forma-pagamento"])){
            $desconto = $valorFinal*DESC_CARTAO;
            //checkbox marcado
        }
        
        $valorFinal = $valorFinal - $desconto;
        $valorFinal = number_format($valorFinal, 2, ",", ".");
        $desconto = number_format($desconto, 2, ",", ".");
        $acrescimo = number_format($acrescimo, 2, ",", ".");
        
        
        
        
        echo "<p><span>******RESUMO VENDA******<br>
        Valor da compra...: R$$valorCompra;<br>
        Taxa de entrega...: R$$acrescimo;<br>
        Desconto do cartão: R$$desconto;<br>
        Valor total.......: R$$valorFinal;<br>
        </span></p>";
        ?>
</body>
</html>