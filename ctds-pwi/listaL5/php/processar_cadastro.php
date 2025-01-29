<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/style.css" rel="stylesheet">
    <title>Resumo de cadastro</title>
</head>
<body>
    <h1>Resumo de dados cadastrados</h1>

    <?php
    $chassi1 = $_POST['chassi1'];
    $chassi2 = $_POST['chassi2'];
    $chassi3 = $_POST['chassi3'];
    $chassi4 = $_POST['chassi4'];
    
    $fabricante1 = $_POST['fabricante1'];
    $fabricante2 = $_POST['fabricante2'];
    $fabricante3 = $_POST['fabricante3'];
    $fabricante4 = $_POST['fabricante4'];
    
    $preco1 = $_POST['preco1'];
    $preco2 = $_POST['preco2'];
    $preco3 = $_POST['preco3'];
    $preco4 = $_POST['preco4'];

    $veiculos = [
        $chassi1 => [$fabricante1, $preco1],
        $chassi2 => [$fabricante2, $preco2],
        $chassi3 => [$fabricante3, $preco3],
        $chassi4 => [$fabricante4, $preco4]
    ];

    $somaPrecos= 0;

    foreach ($veiculos as $chassi => $vetorInterno) {
        $vetorAux[$chassi] = $vetorInterno[1];
        $somaPrecos +=$vetorInterno[1];
    }

    $mediaPrecos = $somaPrecos/sizeof($vetorAux);

    arsort($vetorAux); //ordenando de forma decrescente,junto dos indices

    $menorPreco = min($vetorAux);
    $chassiMenorPreco = array_search($menorPreco, $vetorAux);
    $fabricanteMenorPreco = $veiculos[$chassiMenorPreco][0];
    
    echo "<table class='container'>
        <caption>Veículos cadastrados</caption>
        <tr>
            <th>Chassi</th>
            <th>Fabricante</th>
            <th>Preço</th>
        </tr>";

    foreach($vetorAux as $chassi => $preco){
        echo "
        <tr>
            <td>$chassi</td>
            <td>{$veiculos[$chassi][0]}</td>
            <td>".number_format($preco,2,',', '.')."</td>
        </tr>
        ";
    };

    echo "</table>";
    echo "<p>Preço médio: R$". number_format($mediaPrecos,2,',', '.')."";
    echo "<br>Fabricante com carro mais barato: $fabricanteMenorPreco</p>";


    ?>
</body>
</html>