<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/formata-pagina.css">
    <title>Conversor de câmbio</title>
</head>
<body>

    <h1>Câmbio online</h1>

    <?php

         define("TAXA_CAMBIO",5.75);

        $valor = $_POST['valor'];


        $valorConvertido = $valor*TAXA_CAMBIO;

        echo "<p><li>Valor em USD: $valor</li>
        <li>Valor convertido em BRL: $valorConvertido</li> 
        <li>Taxa cambial de $TAXA_CAMBIO</li></ul>"

    ?>
</body>
</html>