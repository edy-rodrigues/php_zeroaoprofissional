<?php

/**
 * ABS apenas números positivos
 */
echo abs(10)."\n"; // 10
echo abs(-5)."\n"; // 5

/**
 * ROUND Arendodamento
 */
echo round(2.4)."\n"; // 2
echo round(2.6)."\n"; // 3
echo round(2.5)."\n"; // 3

/**
 * CEIL Arendodamento pra cima
 */
echo ceil(2.1)."\n"; // 3
echo ceil(2.3)."\n"; // 3
echo ceil(2.0001)."\n"; // 3

/**
 * FLOOR Arendodamento pra baixo
 */
echo floor(2.9)."\n"; // 2
echo floor(2.8)."\n"; // 2
echo floor(2.9999)."\n"; // 2

/**
 * RAND Retorna número randomico
 */
echo rand(0, 10)."\n"; // $
echo rand(0, 100)."\n"; // $
echo rand(0, 1000)."\n"; // $
?>