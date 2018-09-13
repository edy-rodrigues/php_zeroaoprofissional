<?php
session_start();
require 'config.php';

if(!empty($_GET['codigo'])) {
	$codigo = addslashes($_GET['codigo']);

	$sql = "SELECT * FROM tb_usuario WHERE codigo = '$codigo'";
	$sql = $pdo->query($sql);

	if($sql->rowCount() == 0) {
		header("Location: login.php");
		exit;
	} else {
		$dado = $sql->fetch();
		if($dado['numIndicacao'] > 5) {
			header("Location: login.php");
			exit;
		}
	}
} else {
	header("Location: login.php");
	exit;
}

if(!empty($_POST['email'])) {
	$indicacao = $dado['numIndicacao'] + 1;
	$sql = "UPDATE tb_usuario SET numIndicacao = '$indicacao' WHERE id = '".$dado['id']."'";
	$pdo->query($sql);

	$email = addslashes($_POST['email']);
	$senha = md5($_POST['senha']);

	$sql = "SELECT * FROM tb_usuario WHERE email = '$email'";
	$sql = $pdo->query($sql);

	if($sql->rowCount() <= 0) {

		$codigo = md5(rand(0,99999).rand(0,99999));
		$sql = "INSERT INTO tb_usuario (email, senha, codigo, numIndicacao) VALUES ('$email', '$senha', '$codigo', 0)";
		$sql = $pdo->query($sql);

		unset($_SESSION['logado']);

		header("Location: index.php");
		exit;
	}
}
?>
<h3>Cadastrar</h3>

<form method="POST">
	E-mail:<br/>
	<input type="email" name="email" /><br/><br/>

	Senha:<br/>
	<input type="password" name="senha" /><br/><br/>

	<input type="submit" value="Cadastrar" />
</form>