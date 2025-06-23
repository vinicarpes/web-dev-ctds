<?php
 class Livros
  {
  public $titulo;
  public $autor;
  public $isbn;
  public $preco;

  function __construct($umTitulo, $umAutor, $umIsbn, $umPreco)
   {
   $this->titulo = $umTitulo;
   $this->autor  = $umAutor;
   $this->isbn   = $umIsbn;
   $this->preco  = $umPreco;
   }

  function calcularDesconto($umDesconto)
   {
   $desconto = $this->preco * $umDesconto/100;
   $this->preco = $this->preco - $desconto;   
   }

  function mostrarInformacoes()
   {
   echo "<p> Resultados do processamento de venda do objeto livro: <br>
             Título = <span>", $this->titulo, "</span> <br>
             Autor = <span>", $this->autor, "</span> <br>
             ISBN = <span>", $this->isbn, "</span> <br>
             Preço final = <span> R$", $this->preco, "</span> </p>";
   
   }

  }