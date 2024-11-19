<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/formata-pagina.css">
    <title>Relatório de desempenho acadêmico</title>
</head>
<body>

    <h1>Avaliação I - Programação Web I</h1>
    <?php 
        $aluno1 = $_POST['aluno1'];
        $aluno2 = $_POST['aluno2'];
        $aluno3 = $_POST['aluno3'];

        $nota1 = $_POST['nota1'];
        $nota3 = $_POST['nota3'];
        $nota2 = $_POST['nota2'];

       $vetorNotas = [$aluno1 => $nota1, $aluno2 => $nota2, $aluno3 => $nota3];

    //    echo "<pre>"; 
    //    print_r($vetorNotas);
    //    echo "</pre>";

        echo "<table>
            <caption> Relação de dados acadêmicos dos alunos de CTDS/PRWI</caption>
        
            <tr>
                <th>Nome do aluno</th>
                <th>Nota de PRWI</th>
            </tr>";
            foreach($vetorNotas as $nomeAluno => $nota)
            {   

                $maiorNota= max($vetorNotas); //maior valor do vetor
                $alunoDestaque = array_search($maiorNota, $vetorNotas); //
                //fazendo a logica manuamente
                // if($maiorNota<$nota){
                //     $maiorNota = $nota;
                //     $alunoDestaque = $nomeAluno;
                // }
                echo
                "<tr>
                    <td>$nomeAluno</td>
                    <td>$vetorNotas[$nomeAluno]</td>
                </tr>
                ";
            }

        echo "</table>";
        echo "<p>Aluno destaque: $alunoDestaque<br>
                Nota destaque: $maiorNota</p>"
    ?>
</body>
</html>