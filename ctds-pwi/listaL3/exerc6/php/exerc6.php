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

        $pessoa1 = $_POST['pessoa1'];
        $pessoa2 = $_POST['pessoa2'];
        $pessoa3 = $_POST['pessoa3'];

        $idade1 = $_POST['idade1'];
        $idade2 = $_POST['idade2'];
        $idade3 = $_POST['idade3'];

        $vetorIdades = [$pessoa1 => $idade1, $pessoa2 => $idade2, $pessoa3 => $idade3];
        $menorIdade= min($vetorIdades); //menor valor do vetor
        
        echo '<table>
            <caption> Relação de idades</caption>
            <tr>
                <th>Nome</th>
                <th>Idade</th>
            </tr>';
            foreach($vetorIdades as $nome => $idade)
            {   
                echo
                "<tr>
                <td>$nome</td>
                <td>$vetorIdades[$nome]</td>
                </tr>
                ";
            }
            
        echo "</table>";
        echo "<p>Menor idade cadastrada: $menorIdade</p>";
       
    ?>
</body>
</html>