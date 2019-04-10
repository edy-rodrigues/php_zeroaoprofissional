<?php
require_once "classes.php";

$Form = new Form();

$Form->addElement(new Label("Usuário:"));
$Form->addElement(new InputText("txt-usuario"));
$Form->addElement(new Label("Senha:"));
$Form->addElement(new InputText("txt-senha", "password"));
$Form->addElement(new SubmitButton("Enviar"));

echo $Form->render();

?>