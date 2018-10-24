<?php

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "http://www.checkitout.com.br/wb/pingpong");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, "nome=Edinei&idade=19&sexo=masculino");

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$resposta = curl_exec($ch);

curl_close($ch);

print_r($resposta);

?>