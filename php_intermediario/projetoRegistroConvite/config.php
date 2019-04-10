<?php
try {
	$pdo = new PDO("mysql:dbname=db_projetoregistrarconvite;host=localhost", "root", "");
} catch(PDOException $e) {
	echo "ERRO: ".$e->getMessage();
	exit;
}