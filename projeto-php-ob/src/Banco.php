<?php

require_once 'Conta.php';
require_once 'Titular.php';
require_once 'CPF.php';

//$primeiraConta = new Conta(new Titular('123.456.789-10', 'Vinicius'));
//var_dump($primeiraConta);
$tit1 = new Titular(new CPF('123.456.789-10'), 'Vinicius'); // recebe um novo objeto do tipo cpf, criado no desafio
$primeiraConta = new Conta($tit1); //primeira conta recebe o titular 1
$primeiraConta->depositar(500);
$primeiraConta->sacar(300); //forma correta
//$primeiraConta->saldo -=300; incorreta, por o acesso ser por fora, sendo que saldo esta privado

echo $primeiraConta->recuperaNomeTitular() . PHP_EOL;
echo $primeiraConta->recuperarSaldo () . PHP_EOL;
echo $primeiraConta->recuperarCpfTitular() . PHP_EOL;

//$segundaConta = new Conta(new Titular('333.444.55-66', 'Dias'));
$tit2 = new Titular(new CPF('333.444.55-66'), 'Dias');
$segundaConta = new Conta($tit2);
var_dump($segundaConta);

echo Conta::$recuperanumeroDeContas;
