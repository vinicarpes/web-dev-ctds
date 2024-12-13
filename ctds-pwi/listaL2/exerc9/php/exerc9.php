<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/formata-pagina.css">
    <title>Relatório de venda</title>
</head>
<body>

    <h1>Relatório de venda - Lojas AAA</h1>
    <?php 

        define("DESC_AVISTA", 0.05); 
        define("ACRESC_PRAZO", 0.02);
        $valorCompra = $_POST["valor-compra"];
        $valorFinal =0;
        
        $concorreSorteio = "O cliente NÃO PAGOU a compra com cartão Visa e NÃO está concorrendo no sorteio do automóvel!";
        //validação da bandeira
        if(isset($_POST['bandeira'])){
            $bandeira = $_POST["bandeira"];
            if($bandeira == "visa"){
                $concorreSorteio = "O cliente PAGOU a cmopra com cartão Visa e está automaticamente concorrendo no sorteio do automóvel!";
            }
        }
        else{
            die("Você não indicou a bandeira!");
        }

        //validação forma de pagamento
        if(isset($_POST["forma-pagamento"])){
            $formaPagamento = $_POST["forma-pagamento"];
            if($formaPagamento=="a-vista"){
                $valorFinal = $valorCompra - $valorCompra*DESC_AVISTA;
            }else{
                $valorFinal = $valorCompra - $valorCompra*ACRESC_PRAZO;
            }
        }else{
            die("Você não indicou a forma de pagamento!");
        }
        
       echo "<p>$concorreSorteio</p>";
    ?>
</body>
</html>