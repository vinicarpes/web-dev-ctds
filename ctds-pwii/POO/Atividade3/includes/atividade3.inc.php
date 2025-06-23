<?php
 class ContaBancaria
  {
  public $saldo;

  function __construct($inicializaSaldo)
   {
   $this->saldo  = $inicializaSaldo;
   }

  function depositar($valor)
   {
   $this->saldo = $this->saldo + $valor;
   }

  function sacar($valor)
   {
   $this->saldo = $this->saldo - $valor;
   }

  function mostrarSaldo()
   {
   return $this->saldo;
   }
 }
