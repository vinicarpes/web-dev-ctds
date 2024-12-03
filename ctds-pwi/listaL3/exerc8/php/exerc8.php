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
        "loratadina" => 5.50,
        "dipirona" => 3.85,
        "paracetamol" => 8.99
    ];

    $valorTotal = 0;
    if (isset($_POST['medicacao'])) {
        //toda vez que o ph recebe dados de um checkbox, ele cria um vetor de indice numerico
        $medicacoesSelecionados = $_POST['medicacao'];

        foreach ($medicacoesSelecionados as $medicacao) { //para cada produto selecionado como produto 
            $valorTotal += $vetorPrecos[$medicacao]; //somatório de valor total com vetor preço na posição produto
        }
        if (isset($_POST['idoso'])) {
            $valorTotal -= $valorTotal * 0.05;
        }

        $valorTotal = number_format($valorTotal, 2, ",", ".");

        echo "<p>Lista dos produtos adquiridos: <br>";
        foreach ($medicacoesSelecionados as $medicacao) {
            echo "$medicacao <br>";
        }
        echo "</p>";

        echo "<p>Valor total da compra: R$$valorTotal</p>";
    }


    ?>
</body>

</html>