<?php

require_once "template.php";

$array = array(
    "titulo" => "Título da página",
    "nome" => "Fulano",
    "idade" => 19
);

$tpl = new Template("template.phtml");
$tpl->render($array);

?>