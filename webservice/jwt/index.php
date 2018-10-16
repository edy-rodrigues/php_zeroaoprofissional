<?php
require_once "jwt.php";

$jwt = new JWT();

$token = $jwt->create(array(
    "id_user" => 123,
    "nome" => "Edinei Rodrigues"
));

echo "TOKEN: ". $token;

?>