<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/formata-pagina.css">
    <title>Conversor de câmbio</title>
</head>
<body>

    <h1>Resumo de compra</h1>

    <?php

        $percComissao =$_POST["comissao"];
        $valor = $_POST["valor"];

        $comissao = $valor*$percComissao;

        $comissaoFormatada = number_format($comissao,2, ",", ".");

        echo "<p>Comissão total do vendedor: R$$comissaoFormatada</p>";
    ?>
</body>
</html>