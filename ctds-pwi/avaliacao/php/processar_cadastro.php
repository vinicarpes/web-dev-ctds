<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumo de cadastro</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Resumo de cadastro - Campeonato Brasileiro</h1>

    <?php
    
    $clube1 = $_POST['clube1'];
    $clube2 = $_POST['clube2'];
    $clube3 = $_POST['clube3'];

    $estado1 = $_POST['estado1'];
    $estado2 = $_POST['estado2'];
    $estado3 = $_POST['estado3'];

    $titulos1 = $_POST['titulo-estadual1'];
    $titulos2 = $_POST['titulo-estadual2'];
    $titulos3 = $_POST['titulo-estadual3'];

    $clubes= [
        $clube1 => [$estado1, $titulos1], 
        $clube2 => [$estado2, $titulos2], 
        $clube3 => [$estado3, $titulos3] 
    ];

    
    foreach($clubes as $clube => $vetorInterno){
        $vetorAux[$clube] = $vetorInterno[1];
    }
    
    $maiorTitulo = max($vetorAux);
    $maiorCampeao = array_search($maiorTitulo, $vetorAux); //nome do maior campeao
    $estadoMaiorCampeao = $clubes[$maiorCampeao][0];

    krsort($vetorAux);
    
    echo "<table>
    <caption>Clubes cadastrados</caption>
    <tr>
    <th>Clube</th>
    <th>Estado</th>
    <th>N° títulos</th>
    </tr>";
    
    foreach($vetorAux as $clube => $titulos){
        echo "
        <tr>
        <td>$clube</td>
        <td>{$clubes[$clube][0]}</td>
        <td>{$clubes[$clube][1]}</td>
        </tr>
        ";
    };
    
    echo "<p>Clube com maior quantidade de títulos: $maiorCampeao de $estadoMaiorCampeao</p>";
    ?>
</body>
</html>