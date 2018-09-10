<?php

/**
 * OBS: O php ele pega a hora do servidor e não do computador.
 * 
 * DIA
 * d - dia do mês = 01, 03, 10, 15
 * D - dia da semana = Mon, Sun em inglês
 * j - dia do mês = 1, 3, 10, 15
 * 
 * MES
 * m - mês do ano = 01(January), 11(November)
 * 
 * ANO
 * y - ano = 18, 19, 20
 * Y - ano = 2018, 2019, 2020
 * 
 * HORA
 * H - hora do dia = 00:00 até 23:59
 * h - hora do dia = 01:00 até 12:59
 * 
 * MINUTOS
 * i - Minuto da hora = 1 até 59
 * 
 * SEGUNDOS
 * s - Segundos do minuto = 1 até 59
 */
$dataAtual = date('Y-m-d H:i:s');

echo $dataAtual;

?>