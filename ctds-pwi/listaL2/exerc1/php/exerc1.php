<!DOCTYPE html>
<html lang="pt-BR">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programação web com PHP</title>
    <link rel="stylesheet" href="../css/formata-pagina.css">
</head>
<body>

    <h1>Fundamentos de PHP - listaL2</h1>

    <?php

        //nesta área só serão aceitos comando em PHP
        //criando variáveis em php para os dados provenientes do formulário

        $nomeAluno = $_POST['nome-aluno'];

        $nota1 = $_POST['primeira-nota'];
        $nota2 = $_POST['segunda-nota'];
        $peso1 = $_POST['peso1'];
        $peso2 = $_POST['peso2'];

        //usando os valores das variáveis para calcular a média

        $media = ($nota1*$peso1+$nota2*$peso2)/($peso1+$peso2);

        //saída de dados a ser exibida pelo navegador

        echo "<p>O aluno de nome $nomeAluno obteve média ponderada igual a $media</p>";

    ?>
    
</body>
</html>