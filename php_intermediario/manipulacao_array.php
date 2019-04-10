<?php

$array = array(
    "nome" => "Edinei",
    "idade" => 18,
    "cidade" => "São José do Rio Preto",
    "pais" => "Brasil"
);

/**
 * Array_keys
 * @param Array
 */
$keys = array_keys($array);
print_r($keys); // [0] => nome ,[1] => idade, [2] => cidade, [3] => pais

/**
 * Array_values
 * @param Array
 */
$values = array_values($array);
print_r($values); // [0] => Edinei ,[1] => 18, [2] => São José do Rio Preto, [3] => Brasil

/**
 * Array_pop
 * Remove o ultimo elemento
 * @param Array
 */
array_pop($array);
print_r($array); // [nome] => Edinei, [idade] => 18, [cidade] => São José do Rio Preto

/**
 * Array_shift
 * Remove o primeiro elemento
 * @param Array
 */
array_shift($array);
print_r($array); // [idade] => 18, [cidade] => São José do Rio Preto

$array = array(
    "nome" => "Edinei",
    "idade" => 18,
    "cidade" => "São José do Rio Preto",
    "pais" => "Brasil"
);

/**
 * Asort
 * Realoca array em ordem alfabética decrescente
 * @param Array
 */
asort($array);
print_r($array); // [pais] => Brasil ,[nome] => Edinei, [cidade] => São José do Rio Preto, [idade] => 18

/**
 * Arsort
 * Realoca array em ordem alfabética crescente
 * @param Array
 */
arsort($array);
print_r($array); // [idade] => 18, [cidade] => São José do Rio Preto, [nome] => Edinei, [pais] => Brasil

/**
 * Arsort
 * Realoca array em ordem alfabética crescente
 * @param Array
 */
arsort($array);
print_r($array); // [idade] => 18, [cidade] => São José do Rio Preto, [nome] => Edinei, [pais] => Brasil

/**
 * Count
 * Conta o número de elementos do array
 * @param Array
 */
print_r("\n".count($array)."\n"); // 4

/**
 * In_array
 * Verifica se o elemento existe no array
 * @param Array
 */
in_array("Teste", $array) ? print_r("\n".$array["nome"]."\n") : print_r("\n"."Não existe"."\n");


?>