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


    //para encontrar o aluno  dejesado na matriz, basta

    $alunoPesquisado = $_POST['pesquisa-aluno'];

    $encontrou = false;
    foreach($matrizAlunos as $mtcl => $vetorInterno){//=> indica que vetorInterno é um vetor de mtcl
        if($vetorInterno[0] == $alunoPesquisado){
            $encontrou = true;
            $mtclPesquisada = $mtcl;
            $notaPesquisada = $vetorInterno[1];
        }
    }
    
    if($encontrou){
        echo "<p>
        DADOS DA BUSCA: <br>
        Nome: $alunoPesquisado <br>
        Matrícula: $mtclPesquisada <br>
        Média: $notaPesquisada </p>";
    }else{
        echo "<p>Aluno(a) $alunoPesquisado não encontrado(a)!</p>";
    }

    foreach ($matrizAlunos as $mtcl => $vetorInterno) {
        $vetorAux[$mtcl] = $vetorInterno[1];
    }

    $maiorMedia = max($vetorAux);
    $mtclMaiorNota = array_search($maiorMedia, $vetorAux);
    $nomeMaiorNota = $matrizAlunos[$mtclMaiorNota][0];

    echo "<table>
        <caption>Relação de dados acadêmicos dos alunos de PWI - CTDS</caption>
        <tr>
            <th>Nome</th>
            <th>Matrícula</th>
            <th>Média</th>
        </tr>";

    // indice associativo refencia um vetor
    foreach ($matrizAlunos as $mtcl => $vetorInterno) {
        echo "
        <tr>
            <td>$vetorInterno[0]</td>
            <td>$mtcl</td>
            <td>$vetorInterno[1]</td>
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