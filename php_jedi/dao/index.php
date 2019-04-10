<?php
require_once "classes.php";

$UsuarioDAO = new UsuarioDAO();

$novoUsuario = new Usuario(array(
    "nome" => "beltrano",
    "email" => "beltrano@gmail.com",
    "senha" => md5("123")
));

// $UsuarioDAO->insert($novoUsuario);

$Usuario = $UsuarioDAO->get();

foreach ($Usuario as $u) {
    echo "Nome: ". $u->getName() ." - Email: ". $u->getEmail() ."<hr>";
}

// $Usuario = new Usuario(array("name" => "Edinei", "id" => 1, "email" => "edinei@gmail.com", "pass" => md5("123")));

// echo "Nome: ". $Usuario->getName();

?>