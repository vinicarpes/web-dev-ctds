<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/formata-pagina.css">
    <title>Relatório de venda</title>
</head>
<body>

    <h1>Relatório de venda - Farmácias AAA</h1>
    <?php 
        $valorInicial = $_POST['valor-inicial'];

        if(isset($_POST['faixa-etaria'])){
            $faixaEtaria = $_POST['faixa-etaria'];
        }else{
            die("<p>A faixa etária é informação necesssária!</p>");
        }

        //para cada faixa etaria haverá descontos diferentes

        if($faixaEtaria == "menor-55"){
            $desconto = 0;
        }else if($faixaEtaria=="maior-55-menor-70"){
            $desconto = 0.05;
        }else{
            $desconto = 0.07;
        }

        if(isset($_POST['cartao-fidelidade'])){
            $desconto += 0.05;
        }

        $valorFinal = $valorInicial - $valorInicial*$desconto;
        $desconto *=100;

        $valorFinal = number_format($valorFinal,2, ",",".");

        echo "<p>********Resumo da compra********
        <br>Valor inicial: R$$valorInicial
        <br>Desconto: $desconto%
        <br>Valor final: R$$valorFinal
        </p>";

    ?>
</body>
</html>