<?php

$peso = 74;
$altura = 1.77;
$imc = $peso / $altura ** 2;

echo "Seu IMC é de $imc. Você está com o IMC ";

if ($imc < 18) {
    echo "abaixo do ideal";
} else if ($imc < 25) {
    echo "ideal";
} else {
    echo "acima do ideal";
}