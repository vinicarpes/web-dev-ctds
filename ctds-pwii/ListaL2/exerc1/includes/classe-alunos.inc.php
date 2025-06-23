<?php
 //vamos criar a classe Alunos. Essa classe conterá métodos e atributos que o PHP necessita para interagir com o banco de dados e executar as operações pedidas no exercício

 class Alunos
  {
  public $matricula;
  public $nome;
  public $mediaFinal;

  //implementar o método que recebe os dados do formulário e insere esses dados em cada atributo do objeto
  function receberDadosDoFormulario($conexao)
   {
   //AVISO: cuidado ao receber dados de um formulário e enviá-los ao banco de dados. Se o seu código não contiver os comandos apropriados, o servidor estará sujeito ao tipo de invasão conhecido como INJEÇÃO DE SQL
   $this->matricula  = trim($conexao->escape_string($_POST["matric"]));
   $this->nome       = trim($conexao->escape_string($_POST['aluno']));
   $this->mediaFinal = trim($conexao->escape_string($_POST["media"]));
   }

  //método que cadastra os dados do objeto aluno no banco de dados
  function cadastrar($conexao, $nomeDaTabela)
   {
   $sql = "INSERT $nomeDaTabela VALUES(
             '$this->matricula',
             '$this->nome',
              $this->mediaFinal)";
   $conexao->query($sql) or die($conexao->error);
   }

  //implementar o método que tabula os dados de todos os alunos na página web
  function tabularDados($conexao, $nomeDaTabela)
   {
   $sql = "SELECT * FROM $nomeDaTabela";
   $resultado = $conexao->query($sql) or die($conexao->error);

   //criar um laço de repetição para percorrermos a matriz $resultado
   echo "<table>
           <caption> Dados dos alunos cadastrados no banco de dados </caption>
           <tr>
            <th> Matrícula do aluno </th>
            <th> Nome do aluno </th>
            <th> Média final de PRWII </th>";

   while($vetorLinha = $resultado->fetch_array())   
    {
    $matric = $vetorLinha[0];
    $aluno  = $vetorLinha[1];
    $media  = $vetorLinha[2];

    echo "<tr>
           <td> $matric </td>
           <td> $aluno </td>
           <td> $media </td>
          </tr>";    
    }
   echo "</table>";
   }

  //mostrar o número de alunos aprovados em PRWII
  function contarAprovados($conexao, $nomeDaTabela)
   {
   $sql = "SELECT COUNT(*) FROM $nomeDaTabela WHERE media >= 6";
   $resultado = $conexao->query($sql) or die($conexao->error);

   $vetorLinha = $resultado->fetch_array();
   $quantos = $vetorLinha[0];
   echo "<p> Número de alunos aprovados em Programação Web II = <span> $quantos alunos </span> </p>";
   }
  }