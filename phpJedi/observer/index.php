<?php
include_once "classes.php";

$UsuarioObserver = new UsuarioObserver();

$Usuario = new Usuario("Edinei");
$Usuario->attach($UsuarioObserver);

echo "Meu nome é: ". $Usuario->getName()."<hr>";

$Usuario->setName("Edinei Rodrigues");
echo "Meu nome é: ". $Usuario->getName()."<hr>";

$Usuario->detach($UsuarioObserver);
$Usuario->setName("Edinei Rodrigues Filho");
echo "Meu nome é: ". $Usuario->getName()."<hr>";

?>