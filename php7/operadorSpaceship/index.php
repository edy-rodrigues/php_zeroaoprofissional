<?php

$n1 = 30; $n2 = 20;

/**
 * $r == 0 -> Quandos os valores forem iguais
 * $r == -1 -> $n1 é MENOR que o $b
 * $r == 1 -> $n1 é MAIOR que o $b
 */
$r = $n1 <=> $n2;

if(($n1 <=> $n2) == 1) {
    echo "N2 é menor";
}

var_dump($r);

?>