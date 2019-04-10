<?php

$nome = "Edinei";
$nomeCriptografado = md5($nome); // Criptografia irreversível

echo "\n".$nomeCriptografado."\n";

$nome = "Edinei";
$nomeCriptografado = base64_encode($nome); // Criptografia reversível
$nomeDescriptografado = base64_decode($nomeCriptografado); // Descriptigrafa base64
echo "\nCriptografado: ".$nomeCriptografado."\n";
echo "\nDescriptografado: ".$nomeDescriptografado."\n";

?>