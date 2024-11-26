<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/formata-pagina.css">
    <title>Média com Vetores</title>
</head>
<body>

    <h1>Idade média</h1>
    <?php 
       $vetorIdades = $_POST['idade'];

       $media = number_format(array_sum($vetorIdades)/count($vetorIdades), 1, ",", ".");


       echo "<p>Média das idades: $media</p>";
    ?>
</body>
</html>