<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/formata-pagina.css">
    <title>Relatório de compra</title>
</head>

<body>

    <h1>Vetores em PHP - Lista L3 - exerc8</h1>
    <?php

    $vetorPrecos = [
        "doubleburger" => 22.50,
        "gorogonzolaburger" => 30.85,
        "vegieburger" => 25.99,
        "cheeseburger" => 15.55
    ];

    $valorTotal = 0;
    if (isset($_POST['lanche'])) {
        //toda vez que o ph recebe dados de um checkbox, ele cria um vetor de indice numerico
        $lanchesSelecionados = $_POST['lanche'];

        foreach ($lanchesSelecionados as $lanche) { //para cada produto selecionado como produto 
            $valorTotal += $vetorPrecos[$lanche]; //somatório de valor total com vetor preço na posição produto
        }
        if (isset($_POST['cartao-fidelidade'])) {
            $valorTotal -= $valorTotal * 0.05;
        }

        $valorTotal = number_format($valorTotal, 2, ",", ".");

        echo "<p>Lista dos produtos adquiridos: <br>";
        foreach ($lanchesSelecionados as $lanche) {
            echo "$lanche <br>";
        }
        echo "</p>";

        echo "<p>Valor total da compra: R$$valorTotal</p>";
    }


    ?>
</body>

</html>