<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/formata-pagina.css">
    <title>Resumo viagem</title>
</head>
<body>

    <h1>Resumo da viagem</h1>
    
    <?php

    $carro = $_POST['carro'];
    $distancia = $_POST['distancia'];
    $consumo = $_POST['consumo'];
    $precoComb = $_POST['preco-combustivel'];
    
    $gastoTotal = $precoComb*($distancia/$consumo);
    $litrosGastos = ($distancia/$consumo);

    echo "<p>O veículo $carro com consumo $consumo necessita de $litrosGastos litros para percorrer $distancia. <br>O valor total da viagem será R$$gastoTotal.</p>"

    
    ?>
</body>
</html>