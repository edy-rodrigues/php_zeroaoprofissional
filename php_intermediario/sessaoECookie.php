<?php

session_start();

// Gerar sessão
$_SESSION["nome"] = "Edinei Rodrigues";
echo $_SESSION["nome"]."<br />";

// Gerar cookie
setcookie("nome", "Edinei Rodrigues", time()+3600);
echo $_COOKIE["nome"];

?>