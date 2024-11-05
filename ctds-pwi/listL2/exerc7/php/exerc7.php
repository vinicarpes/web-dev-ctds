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
        $valorFinal=0;
        
        if(isset($_POST["valor-compra"])){
            $valInicial = $_POST["valor-compra"];
        }else{
            die("<p>Preencha os campos obrigatórios.</p>");
        }

        if(isset($_POST["entrega-domiciliar"])){
            $entregaDom = $_POST["entrega-domiciliar"];
            if($entregaDom == "sim"){
                $valorFinal = $valInicial + $valInicial*TAXA_ENTREGA; 
            }else{
                $valorFinal = $valInicial;
            }
        }else{
            die("<p>Preencha os campos obrigatórios.</p>");
        }

        if(isset($_POST["forma-pagamento"])){
            $tipoPagamento = $_POST["forma-pagamento"];
            if($tipoPagamento == "sim"){
                $valorFinal = $valorFinal-$valorFinal*DESC_CARTAO;
            }
        }else{
            die("<p>Preencha os campos obrigatórios.</p>");
        }
        
        echo "<p>******RESUMO VENDA******<br>
        Valor da compra: $valInicial;<br>
        Entrega domiciliar: $entregaDom;<br>
        Pagamento com cartão: $tipoPagamento;<br>
        Valor total: $valorFinal;<br>
        </p>";
        ?>
</body>
</html>
