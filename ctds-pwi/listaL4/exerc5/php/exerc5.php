<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/formata-pagina.css">
    <title>Relatório de compra</title>
</head>

<body>

    <h1>Matrizes em PHP - Lista L4 - exerc4</h1>
    <?php

    $aluno1 = $_POST['nome1'];
    $aluno2 = $_POST['nome2'];
    $aluno3 = $_POST['nome3'];

    $mtcl1 = $_POST['mtcl1'];
    $mtcl2 = $_POST['mtcl2'];
    $mtcl3 = $_POST['mtcl3'];

    $nota1 = $_POST['media1'];
    $nota2 = $_POST['media2'];
    $nota3 = $_POST['media3'];

    //criando matrizes com php, com a matricula como índice
    $matrizAlunos = [
        $mtcl1 => [$aluno1, $nota1],
        $mtcl2 => [$aluno2, $nota2],
        $mtcl3 => [$aluno3, $nota3]
    ];

    foreach ($matrizAlunos as $mtcl => $vetorInterno) {
        $vetorAux[$mtcl] = $vetorInterno[1];
    }//criando vetor auxiliar para ordenar as notas por meio de um índice em comum: mtcl

    arsort($vetorAux); //ordenando de forma decrescente,junto dos indices

    $maiorMedia = max($vetorAux);
    $mtclMaiorNota = array_search($maiorMedia, $vetorAux);
    $nomeMaiorNota = $matrizAlunos[$mtclMaiorNota][0];

    echo "<table>
        <caption>Relação de dados acadêmicos dos alunos de PWI - ordenação por nota</caption>
        <tr>
            <th>Nome</th>
            <th>Matrícula</th>
            <th>Média</th>
        </tr>";

    // indice associativo refencia um vetor
    foreach ($vetorAux as $mtcl => $media) {
        echo "
        <tr>
            <td>{$matrizAlunos[$mtcl][0]}</td>
            <td>$mtcl</td>
            <td>$media</td>
        </tr>";
    }

    echo "</table>";
    echo "<p>Maior média obtida: $maiorMedia<br>
            Nome do aluno: $nomeMaiorNota<br>
            Matrícula: $mtclMaiorNota
            </p>"

    ?>
</body>

</html>