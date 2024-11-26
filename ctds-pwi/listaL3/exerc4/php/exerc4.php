<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/formata-pagina.css">
    <title>Relatório de desempenho acadêmico</title>
</head>
<body>

    <h1>Vetores em PHP - Lista L3 - exerc4</h1>
    <?php 

        $vetorPrecos = ["Impressora"=>300.00,
                        "Mouse" => 30.85, 
                        "Teclado"=>278.99];

        $valorTotal = 0;
        if(isset($_POST['produto'])){
            //toda vez que o ph recebe dados de um checkbox, ele cria um vetor de indice numerico
            $produtosSelecionados = $_POST['produto'];

            foreach($produtosSelecionados as $produto){ //para cada produto selecionado como produto 
                $valorTotal+=$vetorPrecos[$produto]; //somatório de valor total com vetor preço na posição produto
            }

            $valorTotal = number_format($valorTotal, 2, ",", ".");
            
            echo "<p>Lista dos produtos adquiridos: <br>";
            foreach($produtosSelecionados as $produto){
                echo "$produto <br>";
            }
            echo "</p>";

            echo "<p>Valor total da compra: R$$valorTotal</p>";


        }
        

    ?>
</body>
</html>