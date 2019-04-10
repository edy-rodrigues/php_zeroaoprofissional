<?php

/**
 * Retorna os segundos do dia 1 de janeiro de 1970 até hoje
 */
$time = time();
echo $time . "\n";

$dataProxima = date('d/m/Y', strtotime("+0 week"));

echo $dataProxima;

?>