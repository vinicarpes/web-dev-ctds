<?php
 class Curso
  {
  public $nome;
  public $duracao;

  //criando método construtor na linguagem PHP
  function __construct($inicializaNome, $inicializaDuracao)
   {
   $this->nome    = $inicializaNome;
   $this->duracao = $inicializaDuracao;
   }

  function classificarCurso()
   {
   //classificar o curso segundo sua duração
   if($this->duracao <= 1)
    {
    $mensagem = "Curso de curta duração";
    }
   elseif($this->duracao > 1 AND $this->duracao <= 3)
    {
    $mensagem = "Curso de média duração";
    }
   else
    {
    $mensagem = "Curso de longa duração";
    }
   return $mensagem;
   }
  
  }