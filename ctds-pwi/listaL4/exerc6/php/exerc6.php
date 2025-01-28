<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/formata-pagina.css">
    <title>Relatório de cadastro</title>
</head>

<body>

    <h1>Matrizes em PHP - Lista L4 - exerc6</h1>
    <?php

    $med1 = $_POST['med1'];
    $cod1 = $_POST['cod1'];
    $preco1 = $_POST['preco1'];

    $med2 = $_POST['med2'];
    $cod2 = $_POST['cod2'];
    $preco2 = $_POST['preco2'];

    $med3 = $_POST['med3'];
    $cod3 = $_POST['cod3'];
    $preco3 = $_POST['preco3'];


    $matrizMedicamentos = [
        $cod1 => [$med1, $preco1],
        $cod2 => [$med2, $preco2],
        $cod3 => [$med3, $preco3]
    ];

    foreach ($matrizMedicamentos as $cod => $vetorInterno) {
        $vetorAux[$cod] = $vetorInterno[1];
    }

    arsort($vetorAux); //ordenando de forma decrescente,junto dos indices

    $menorPreco = min($vetorAux);
    $codMenorPreco = array_search($menorPreco, $vetorAux);
    $nomeMenorCod = $matrizMedicamentos[$codMenorPreco][0];

    echo "<table>
        <caption>Medicamentos cadastrados - ordenação por nome</caption>
        <tr>
            <th>Código</th>
            <th>Medicamento</th>
            <th>Preço</th>
        </tr>";

    // indice associativo refencia um vetor
    foreach ($matrizMedicamentos as $cod => $vetorInterno) {
        echo "
        <tr>
            <td>$cod</td>
            <td>$vetorInterno[0]</td>
            <td>$vetorInterno[1]</td>
        </tr>";
    }

    echo "</table>";

    ?>
</body>

</html>