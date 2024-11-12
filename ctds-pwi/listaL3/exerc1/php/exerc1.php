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
       $vetorNotas = [$_POST['nota1'], $_POST['nota2'], $_POST['nota3']];
       $media = 0;
       
        for($i=0;$i<3;$i++){
            $media += $vetorNotas[$i];
        }

        $media = number_format($media/3, 1, ",", ".");

       echo "<p>Média da turma: $media</p>";
    ?>
</body>
</html>