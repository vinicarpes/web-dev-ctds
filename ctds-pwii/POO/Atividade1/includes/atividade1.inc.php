<?php
 //criando a classe Item em PHP
 class Item
  {
  //definindo os atributos da instância da classe
  public $nome;
  public $preco;
  public $categoria;

  //definindo os métodos da instância da classe
  function mostrarCategoria()
   {
   return $this->categoria;
   }

  function modificarPreco($novoPreco)
   {
   $this->preco = $novoPreco;
   }

  function mostrarPreco()
   {
   return $this->preco;
   }
  }