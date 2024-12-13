<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/formata-pagina.css">
    <title>Conversor termométrico</title>
</head>
<body>

    <h1>Lista 2 - Fundamento do PHP</h1>

    <?php

        $tempF = $_POST['tempF'];
        $tempC = ($tempF-32)*5/9;
        $tempCFormatada = number_format($tempC, 1,",", ".");



        echo "<p>A temperatura de $tempF °F em °C é: <span>$tempCFormatada</span></p>"

    ?>
</body>
</html>