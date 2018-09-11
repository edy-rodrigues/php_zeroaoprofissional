<?php

/**
 * Explode Retorna Array
 * @param Demiter
 * @param String
 */
$nome = "Edinei Rodrigues";
$nomeExplode = explode(" ", $nome);
print_r($nomeExplode); // [0] Edinei, [1] Rodrigues

/**
 * Implode Retorna Array
 * @param Demiter
 * @param Array
 */
$nomeImplode = implode(" ", $nomeExplode);
print_r($nomeImplode."\n"); // Edinei Rodrigues

/**
 * Numer_format
 * @param Number
 * @param Number
 * @param Delimiter
 * @param Delimiter
 */
$numero = number_format(8487481.2345465184651, 2, ",", ".");
print_r($numero."\n"); // 8.487.481,23

/**
 * Str_replace
 * @param String
 * @param String
 * @param String
 */
$texto = "O rato roeu a roupa!";
$string = str_replace("roeu", "comeu", $texto);
print_r($string."\n"); // O rato comeu a roupa

/**
 * Strtolower
 * @param String
 */
$texto = "O RATO ROEU A ROUpa!";
$string = strtolower($texto);
print_r($string."\n"); // o rato roeu a roupa!

/**
 * Strtoupper
 * @param String
 */
$texto = "O rato roeu a roupa!";
$string = strtoupper($texto);
print_r($string."\n"); // O RATO ROEU A ROUPA!

/**
 * Substr
 * @param String
 */
$texto = "Edinei";
$string = substr($texto, 0, 3);
print_r($string."\n"); // Edi

/**
 * Ucfirst
 * @param String
 */
$texto = "edinei rodrigues filho";
$string = ucfirst($texto);
print_r($string."\n"); // Edinei rodrigues filho

/**
 * Ucwords
 * @param String
 */
$texto = "edinei rodrigues filho";
$string = ucwords($texto);
print_r($string."\n"); // Edinei Rodrigues Filho
?>